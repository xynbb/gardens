<?php
session_start();
// APP dir
defined('APP_PATH') or define("APP_PATH",dirname(__FILE__).'/');
// SYS dir
defined('SYS_PATH') or define("SYS_PATH",APP_PATH.'../framework/');
// COMMON dir
defined('COMMON_PATH') or define("COMMON_PATH",APP_PATH.'../common/');
// 设置栈的显示层级
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

defined('IS_CHK_UK') or define("IS_CHK_UK",true);//是否验证UK，是true，否false

require_once(COMMON_PATH.'define.php');
require_once('define_api_url.php');
// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',DEBUG);
require_once(SYS_PATH.'yii.php');

Yii::createWebApplication(APP_PATH.'protected/config/main.php')->run();
