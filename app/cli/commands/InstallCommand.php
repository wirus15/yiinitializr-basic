<?php

class InstallCommand extends CConsoleCommand
{
    private $config = array();
    
    public function run($args)
    {
        echo "Installing application:\n";
        $this -> createDirsAndSetPermissions();
        $this -> readConfiguration();
        $this -> updateConfigFiles();
    }
   
    private function createDirsAndSetPermissions()
    {
        $assets = Yii::getPathOfAlias('webroot.assets');
        if(!is_dir($assets)) {
            mkdir($assets);
        }
        $this ->setPermissionsRecursive($assets, 0777);
        
        $runtime = Yii::app()->runtimePath;
        if(!is_dir($runtime)) {
            mkdir($runtime);
        }
        $this ->setPermissionsRecursive($runtime, 0777);
        
        $data = Yii::getPathOfAlias('application.data');
        if(is_dir($data)) {
            $this ->setPermissionsRecursive($data, 0777);
        }
    }
   
    private function setPermissionsRecursive($path, $permisions)
    {
        foreach(scandir($path) as $file)
        {
            if($file === '.' || $file === '..') {
                continue;
            }
            
            $file = "$path/$file";
            if(chmod($file, $permisions)) {
                echo "Permissions on $file set to 777\n";
            } else {
                echo "Could not set permissions to $file\n";
            }
            
            if(is_dir($file)) {
                $this -> setPermissionsRecursive($file, $permisions);
            }
        }
    }
    
    private function readConfiguration()
    {
        $this->promptUser('APPLICATION_NAME', 'Application name:');
        $this->promptUser('ADMIN_EMAIL', 'Administrator\'s email:');
        $this->promptUser('DATABASE_DRIVER', "Database type:\n[1] sqlite\n[2] mysql\n", 1);
        if($this -> config['{DATABASE_DRIVER}'] == 2)
        {
            $this->promptUser('DATABASE_HOST', 'Database host:', 'localhost');
            $this->promptUser('DATABASE_PORT', 'Database port:', 3306);
            $this->promptUser('DATABASE_USER', 'Database username:');
            $this->promptUser('DATABASE_USER', 'Database password:', '');
            $this->promptUser('DATABASE_NAME', 'Database name:');
        }
    }
    
    private function promptUser($variable, $message, $default = null)
    {
        do {
            $value = $this -> prompt($message, $default);
            if(!$value && $default)
                $value = $default;
        } while ($value===null);
        
        $this -> config["{{$variable}}"] = $value; 
    }
    
    private function updateConfigFiles()
    {
        $configDir = Yii::getPathOfAlias('application.config');
        foreach(scandir($configDir) as $file) {
            $file = $configDir.'/'.$file;
            if(is_file($file)) {
                $content = file_get_contents($file);
                $content = strtr($content, $this -> config);
                file_put_contents($file, $content);
            }
        }
    }
}

