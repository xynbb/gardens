<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$config = array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'飞马大宗',
    'defaultController'=>'index',
    // preloading 'log' component
    'preload'=>array('log'),
    'import'=>array(
        'application.models.*',
        'application.components.*',
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>require(dirname(__FILE__).'/params.php'),
);
//database
require(dirname(__FILE__).'/database/database_'.$_SERVER['DZ_ENVIRONMENT'].'.php');
$config['components'] = isset($db)&&!empty($db)?$db:array();

//url rewrite
$config['components']['urlManager'] = array(
											'urlFormat'=>'path',
											'showScriptName'=>false,
											'rules'=>array(),
											);
$config['components']['aes'] = array(
											'class'=>'ext.Aes'
											);										
//redis Yii::app()->redis_r
$config['components']["redis_r"] = array(
    "class" => "ext.CRedis",
    "options" => array("hostname" =>REDIS_R_HOST,"port" =>REDIS_R_PORT,'password'=>REDIS_R_PWD)
);
$config['components']["redis_w"] = array(
    "class" => "ext.CRedis",
    'options' =>array("hostname" =>REDIS_W_HOST,"port" =>REDIS_W_PORT,'password'=>REDIS_W_PWD)
);
$config['components']['Card'] = array(
    'class'=>'ext.libraries.Card'
);
//error
/*
$config['components']['errorHandler'] = array(
    // use 'site/error' action to display errors
    'errorAction'=>'error',
);
*/


//print_r($config['components']);
return $config;
