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
    'basePath' => realpath(__DIR__ . '/..'),
    'aliases' => array(
	'vendor' => 'application.lib.vendor',
	'wiro' => 'vendor.wirus15.yii-wiro',
        'HASH' => 'wiro.components.hash',
        'bootstrap' => 'vendor.clevertech.yiibooster.src',
    ),
    'import' => array(
	'application.controllers.*',
	'application.helpers.*',
	'application.models.*',
	'wiro.helpers.*',
    ),
    'preload' => array('log'),
    'components' => array(
	'db' => array(
	    'tablePrefix' => 'tbl_',
	    'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/main.db',
            /*'connectionString' => 'mysql:host=localhost;port=3306;dbname=',
            'username' => '',
            'password' => '',
            'enableProfiling' => true,
            'enableParamLogging' => true,
            'charset' => 'utf8',
            */
	),
	'messages' => array(
	    'class' => 'wiro\components\PhpMessageSource',
	    'sourcePaths' => array(
		'wiro' => 'wiro.messages',
	    ),
	),  
	'format' => array(
	    'class' => 'wiro\components\Formatter',
	),
	'mail' => array(
	    'class' => 'wiro\components\mail\YiiMail',
	    'transportType' => 'php',
	    'dryRun' => false,
	    /*'transportOptions' => array(
		'host' => '',
		'username' => '',
		'password' => '',
		'port' => '465',
		'encryption' => 'ssl',
	    ),*/
	),
	'user' => array(
            'class' => 'wiro\modules\users\components\WebUser',
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
	'config' => array(
	    'class' => 'wiro\components\config\DbConfig',
	),
        'authManager' => array(
	    'class' => 'CDbAuthManager',
	    'itemTable' => '{{authitem}}',
	    'assignmentTable' => '{{authassignment}}',
	    'itemChildTable' => '{{authitemchild}}',
	    'defaultRoles' => array('user', 'guest'),
	    'behaviors' => array(
		'auth' => array(
		    'class' => 'wiro.modules.auth.components.AuthBehavior',
		),
	    ),
	),
        'hash' => array(
            'class' => 'HASH\adapters\Yii_Hash',
            'strategies' => array(
                'pass' => array(
                    'strategy' => 17,
                    'cost' => 12,
                ),
            ),
        ),
    ),
    'params' => array(
        'adminEmail' => 'admin@localhost',
	'php.defaultCharset' => 'utf-8',
	'php.timezone' => 'UTC',
    )
);