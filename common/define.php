<?php
$_SERVER['DZ_ENVIRONMENT'] = isset($_SERVER['DZ_ENVIRONMENT'])?$_SERVER['DZ_ENVIRONMENT']:'publish';//设置环境变量
$domain_prefix			   = strpos($_SERVER['DZ_ENVIRONMENT'],'local.')===0?substr($_SERVER['DZ_ENVIRONMENT'],0,6).'.':'';//设置域名前缀
define('API_KEY'						, 'php:lertour:apikey:user_id:');//公用api key redis name
define('AES_KEY'                        , 'fmdz.2015');    //数据加密解密公用key
define('UP_KEY'                         , 'lertour.2015');    //图片上传签名公用key
define('DOMAIN'							, 'lertour.com');
define('CONTRACT_PATH'  				, '/pdf/');
define('FUTURES_SOCKET_PORT'			, '8888');//期货socket服务                          
define('SELL_GOODS_SOCKET_PORT'			, '8889');//商品刷新自动撤单              
define('FUTURES_SOCKET_SERVER'			, '0.0.0.0:8888');//期货socket服务                          
define('SELL_GOODS_SOCKET_SERVER'		, '0.0.0.0:8889');//商品刷新自动撤单
define('ACCOUNT_LOCKUP_TIME'			, 1200);//账户锁定时间
define('DAZONG_PASWSORD' 				, '!@#@!AOV%$^XS');//密码md5 key
define('ORDER_TOKEN' 					, 'lertour');
define('MCHNO'							, '0260000002');//商户编码
define('UNIQUE_ID'     					, md5(uniqid(rand(100000000,999999999),true)));//唯一编号
define('WEBTRIVIA'						, 'crm_com:webtrivia:id:');//碎片
define('LOG_KEY'                        , 'lertour:log');
define('ICP_LOG_KEY'                    , 'lertour:icp:log');

include_once 'define/define_'.$_SERVER['DZ_ENVIRONMENT'].'.php';//引入常量文件

//设置publish，test，dev domain
define('SCHEME'							, $_SERVER['DZ_ENVIRONMENT']=='publish'?'http://':'http://');
define('WWW_DOMAIN'						, $domain_prefix.'www.abc.com');

//设置站点链接
define('WWW_SITE'						, 'http://'.WWW_DOMAIN);

if(!DEBUG) {
	ini_set("display_errors"	,"Off");
	error_reporting(0);
} else {
	ini_set('display_errors'  	, 'On');
	ini_set('output_buffering'	, 'Off');
	ini_set('opcache.enable'  	, '0');
	error_reporting(E_ALL^E_NOTICE);
}

require_once('extensions/trait/TraitAction.php');//引入公共Action
require_once('extensions/trait/TraitController.php');//引入公共Action
require_once('extensions/class/Fun.php');//引入公共方法类
require_once('extensions/class/Curl.php');//引入公共方法类
require_once('extensions/fn/common.php');//引入公共函数
