<?php
function send_php_error(){
	$error_info  =	error_get_last();
	if(!empty($error_info)){
		switch($error_info['type']){
			case 1:case 16:case 64:case 4096:
				$level = 1;
				break;
			case 4:case 32:case 128:
				$level = 2;
				break;
			case 2: case 2048:
				$level = 3;
				break;
			case 8:
				$level = 5;
				break;
			default:
				$level = 6;
				break;
		}
		Fun::addLog($level,json_encode($error_info));
	}
	/*
	
	$site = $_SERVER['HTTP_HOST'];
	$ar = explode("/", trim($_SERVER['REQUEST_URI'],"/"));
	$controller = isset($ar[0]) ? $ar[0] : '';
	$action = isset($ar[1]) ? (strstr($ar[1], "?" ,true) ? strstr($ar[1], "?" ,true) : $ar[1]) : '';
	$error_info  =	error_get_last();
    $data = array(
    	'site' => $site,
    	'controller' => $controller,
    	'action' => $action,
    	'url' => $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
    	'content' => json_encode($error_info),
    	'request_info' =>json_encode($_REQUEST),
    	'type' => 1
    );
	
    $time 	= time();
	$sign = md5(json_encode($data).API_KEY.$time);
	$defaults = array(
		CURLOPT_HEADER 			=> 0,
		CURLOPT_HTTPHEADER		=> array("content-type:application/json;charset=UTF-8"),
		CURLOPT_RETURNTRANSFER 	=> 1,
		CURLOPT_CONNECTTIMEOUT	=> 0,
		CURLOPT_NOSIGNAL =>1,
		CURLOPT_POST			=> 1,
		CURLOPT_POSTFIELDS		=> is_array($data)?http_build_query($data):$data,
		CURLOPT_TIMEOUT			=>	120,
		CURLOPT_URL				=> PHP_LOG_WRITE."?sign=".$sign."&time=".$time
	);
    $ch = curl_init();
    curl_setopt_array($ch, $defaults);
    $result = curl_exec($ch);
    curl_close($ch);
	*/
}