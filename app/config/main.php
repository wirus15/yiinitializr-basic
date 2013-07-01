<?php

/**
 *
 * main.php configuration file
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
defined('APP_CONFIG_NAME') or define('APP_CONFIG_NAME', 'main');

return array(
    'name' => '{APPLICATION NAME}',
    'behaviors' => array(),
    'controllerMap' => array(),
    'modules' => array(
	'login' => array(
	    'username' => 'admin',
	    'password' => 'admin',
	),
    ),
    'components' => array(
	'urlManager' => array(
	    'rules' => array(
		'login' => '/login/default/login',
		'logout' => '/login/default/logout',
		'page/<id:\w+>' => '/site/page',
	    ),
	),
    ),
    'params' => array(),
);