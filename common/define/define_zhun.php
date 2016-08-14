<?php
define('DEBUG', true);//调试
define('REDIS_R_HOST'      				, 'redisr.lertour.com');
define('REDIS_R_PORT'      				, '6379');
define('REDIS_R_PWD'      				, 'vuD95FwE15DFgycRNRqG');
define('REDIS_W_HOST'      				, 'redisw.lertour.com');
define('REDIS_W_PORT'      				, '6379');
define('REDIS_W_PWD'      				, 'vuD95FwE15DFgycRNRqG');
define('REDIS_HOST'      				, 'redis.lertour.com');
define('REDIS_PWD'      				, 'vuD95FwE15DFgycRNRqG');
define('PAYMENT_SWITCH'					, false);//支付按钮开关
define('IS_READ_REDIS'					, false);//是否读取redis数据，false读库，true读redis
define('USER_UNIQUE'					, true);//是否控制用户单点登录，false否，true是

$_SERVER['WHITE_LIST'] = array(
    '127.0.0.1',
	'10.25.114.*',
	'101.201.148.*',
	'101.201.141.*'
);
