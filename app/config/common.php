<?php

/**
 *
 * common.php configuration file
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
return array(
    'basePath' => realPath(__DIR__ . '/..'),
    'preload' => array('log'),
    'aliases' => array(
	'vendor' => 'application.lib.vendor',
	'bootstrap' => 'vendor.clevertech.YiiBooster.src',
	'wiro' => 'vendor.wirus15.yii-wiro',
    ),
    'import' => array(
	'application.controllers.*',
	'application.helpers.*',
	'application.models.*',
	'bootstrap.helpers.*',
	'wiro.helpers.*',
    ),
    'components' => array(
	'bootstrap' => array(
	    'class' => 'bootstrap.components.Bootstrap',
	),
	'db' => array(
	    'tablePrefix' => 'tbl_',
	    'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/main.db',
	),
	'messages' => array(
	    'class' => 'wiro\components\PhpMessageSource',
	    'sourcePaths' => array(
		'wiro' => 'wiro.messages',
	    ),
	),
	'clientScript' => array(
	    'packages' => require(__DIR__ . '/../lib/vendor/wirus15/yii-wiro/assets/packages.php'),
	),  
	'format' => array(
	    'class' => 'wiro\components\Formatter',
	),
	'upload' => array(
	    'class' => 'wiro\components\UploadManager',
	),
	'thumb' => array(
	    'class' => 'wiro\components\image\ThumbnailCreator',
	),
	'less' => array(
	    'class' => 'wiro\components\less\LessCompiler',
	),
	'mail' => array(
	    'class' => 'wiro\components\mail\YiiMail',
	    'transportType' => 'php',
	    'dryRun' => false,
	    'transportOptions' => array(
		'host' => '',
		'username' => '',
		'password' => '',
		'port' => '465',
		'encryption' => 'ssl',
	    ),
	),
	'urlManager' => array(
	    'urlFormat' => 'path',
	    'showScriptName' => false,
	    'urlSuffix' => '.html',
	    'rules' => array(
		'<controller:\w+>/<id:\d+>' => '<controller>/view',
		'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
		'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
		'<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
	    ),
	),
	'user' => array(
	    'allowAutoLogin' => true,
	    'loginUrl' => array('/login/default/login'),
	),
	'errorHandler' => array(
	    'errorAction' => 'site/error',
	),
	'log' => array(
	    'class' => 'CLogRouter',
	    'routes' => array(
		array(
		    'class' => 'CFileLogRoute',
		    'levels' => 'error, warning',
		),
	    ),
	),
	'request' => array(
	    'class' => 'application.components.HttpRequest',
	),
	'config' => array(
	    'class' => 'wiro\components\config\DbConfig',
	),
    ),
    'modules' => array(
	'login' => array(
	    'class' => 'wiro\modules\login\SimpleLoginModule',
	),
	'pages' => array(
	    'class' => 'wiro\modules\pages\PagesModule',
	),
	'config' => array(
	    'class' => 'wiro\modules\config\ConfigModule',
	),
    ),
    'params' => array(
	'php.defaultCharset' => 'utf-8',
	'php.timezone' => 'UTC',
    )
);