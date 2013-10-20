<?php

/**
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
return array(
    'components' => array(
        /*'db' => array(
            'connectionString' => 'mysql:host=localhost;port=3306;dbname=',
            'username' => '',
            'password' => '',
            'enableProfiling' => YII_DEBUG,
            'enableParamLogging' => YII_DEBUG,
            'charset' => 'utf8',
        ),*/
    ),
    'params' => array(
	'yii.debug' => false,
	'yii.traceLevel' => 0,
	'yii.handleErrors' => APP_CONFIG_NAME !== 'test',
    )
);