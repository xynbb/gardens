<?php
class Curl
{
	private static  $start_time;
	public static  $action_start_time;
	public static  $action_api_info;

    /**
     * @author whf
     * @time 20151010
     * CURL
     * @param string $url
     * @param array/string $data
     * @param string $method
     * @return string
     */
    public static function jPost($url,$data,$send_log = true)
    {
    	self::$start_time = microtime();
		$result = Curl::post( $url."?env={$_SERVER['DZ_ENVIRONMENT']}", $data, 'json');
        $arr  	= json_decode($result,true);       
        $is_array = is_array($arr) ? $arr : false;
        $request = array(
            'env' => $_SERVER['DZ_ENVIRONMENT'],
            'time' => time(),
            'data' => is_array($data)?json_encode($data):$data,
        	'result_info' => is_array($arr)?json_encode($arr):$arr
        );
        if( DEBUG && !$is_array ){
	   		echo $result;
    	}
    	   
        if(!$send_log){
        	return $is_array;
        }

        if(!$is_array){
            Fun::addLog(2,json_encode($request));
        }else{
            Fun::addLog(5,json_encode($request));
        }
		return $is_array;	
    }

	/**
     *
     * @author whf
     * @time 20151010
     * CURL
     * @param string $url
     * @param array/string $data
     * @param string $method
     * @return string
     */
    public static function jJavaGet($url,$data,$send_log = true)
    {
    	self::$start_time = microtime();
        $json = Curl::get($url,$data,'json');
        $arr  = json_decode($json,true);
        $is_array = is_array($arr) ? $arr : false;
        $request = array(
            'env' => $_SERVER['DZ_ENVIRONMENT'],
            'time' => time(),
            'data' => is_array($data)?json_encode($data):$data,
        	'result_info' => is_array($arr)?json_encode($arr):$arr
        );
    	if(!$send_log){
        	return $is_array;
        }
        if(!$is_array){
            Fun::addLog(2,json_encode($request));
        }else{
            Fun::addLog(5,json_encode($request));
        }
		if( DEBUG && !$is_array ){
    		echo $json;
    	}   	
        return $is_array;
    }

    /**
     *
     * @author whf
     * @time 20151010
     * CURL
     * @param string $url
     * @param array/string $data
     * @param string $method
     * @return string
     */
    public static function jJavaPost($url,$data,$HTTPHEADER='json',$send_log = true)
    {
    	self::$start_time = microtime();
        $json = Curl::post($url,$data,$HTTPHEADER);
        $arr  = json_decode($json,true);
        $is_array = is_array($arr) ? $arr : false;
        $request = array(
            'env' => $_SERVER['DZ_ENVIRONMENT'],
            'time' => time(),
            'data' => is_array($data)?json_encode($data):$data,
        	'result_info' => is_array($arr)?json_encode($arr):$arr
        );
    	if(!$send_log){
        	return $is_array;
        }
        if(!$is_array){
            Fun::addLog(2,json_encode($request));
        }else{
            Fun::addLog(5,json_encode($request));
        }
		if( DEBUG && !$is_array ){
    		echo $json;
    	}
        return $is_array;
    }
    
	/**
     * curl错误日志
     * @author liangyue
     */
    private static function send_log($level, $lang_type, $content, $request, $response,$url=""){
    	$data = self::log_data_format($level, $lang_type, $content, $request, $response,$url);
    	Yii::app()->redis_w->rPush("curl:api:log:write:queue",$data);
    }
    /**
     * @author liangyue
     * 日志数据
     * @param int $leve 错误等级
     * @param int $lang_type 错误语言来源
     * @param string $content 错误描述
     * @param string $request 请求数据json
     * @param string $response 响应数据json
     */
    private static function log_data_format($level, $lang_type, $content, $request, $response,$url){
    	$path = $url;
        $site = isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:'';
        $ar = explode("/", trim($_SERVER['REQUEST_URI'],"/"));
        $controller = isset($ar[0]) ? $ar[0] : '';
    	$action = isset($ar[1]) ? strstr($ar[1]."?", "?" ,true) : '';
        $request_data = array();
		if(is_array($request) && !empty($request)){
			foreach ($request as $k => $v) {
				$request_data[] = $k . '=' . $v;
			}
			$request_string = implode("&", $request_data);
		}else{
			$request_string = $request;
		}

        $data = array(
        	'path' => $path,
        	'url' => $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
        	'level' => $level,
        	'lang_type' => $lang_type,
        	'content' => $content,
        	'site' => $site,
        	'controller' => $controller,
        	'action' => $action,
        	'request_info' => $request_string,
        	'response_info'	=> $response,
        	'code' => ''
        );
        list($ends,$endms) = explode(" ", microtime());
    	list($starts ,$startms) = explode(" ", self::$start_time);
    	$data['response_time'] = ($ends - $starts)*1000 + ($endms-$startms)*1000;
    	if(empty(self::$action_start_time)){
    		self::$action_start_time = 0;
    		self::$action_api_info = '';
    	} 
    	self::$action_api_info .= "调用接口：".$path.",耗时：".$data['response_time']."ms/n/t/r";
        return json_encode($data);
    }
    
    /**
     *
     * @author whf
     * @time 20151010
     * CURL
     * @param string $url
     * @param array/string $data
     * @param string $method
     * @param string $HTTPHEADER
     * @return string
     */
    public static function get($url,$data,$HTTPHEADER='x-www-form-urlencoded')
    {
    	$headers['content-type'] = "application/{$HTTPHEADER};charset=UTF-8";
    	//$headers['DZ-CLIENT-IP'] = $_SERVER['SERVER_ADDR'];
	    $headers['CLIENT-IP'] = '';//Curl::get_ip();

		$headers['X-FORWARDED-FOR'] = $headers['CLIENT-IP'];
		$headers['DAZONG-FROM'] = 'web';
		$headerArr = array(); 
		foreach( $headers as $n => $v ) {
			$headerArr[] = $n .':' . $v;
		}
        $defaults = array(
            CURLOPT_HEADER 			=> 0,
            CURLOPT_HTTPHEADER		=> $headerArr,
            CURLOPT_RETURNTRANSFER 	=> 1,
            CURLOPT_TIMEOUT 		=> 300,
            CURLOPT_CONNECTTIMEOUT	=> 30,
            CURLOPT_URL				=>$url.(parse_url($url, PHP_URL_QUERY)?'':'?').(is_array($data)?http_build_query($data):$data)
        );

        $ch 	= curl_init();

		curl_setopt_array($ch, $defaults);

		$result = curl_exec($ch);

		if( $result === false)
		{
			trigger_error(curl_error($ch));
		}
		curl_close($ch);
		return $result;

    }

    /**
     *
     * @author whf
     * @time 20151010
     * CURL
     * @param string $url
     * @param array/string $data
     * @param string $method
     * @param string $HTTPHEADER
     * @return string
     */
    public static function post($url,$data,$HTTPHEADER='json',$is_wait=true)
    {
    	$headers['content-type'] = "application/{$HTTPHEADER};charset=UTF-8";
    	//$headers['DZ-CLIENT-IP'] = $_SERVER['SERVER_ADDR'];
	     $headers['CLIENT-IP'] = '';//Curl::get_ip();
		$headers['X-FORWARDED-FOR'] = $headers['CLIENT-IP'];
		$headers['DAZONG-FROM'] = 'web';
		$headerArr = array(); 
		foreach( $headers as $n => $v ) {
			$headerArr[] = $n .':' . $v;
		}
        $defaults = array(
            CURLOPT_HEADER 			=> 0,
            CURLOPT_HTTPHEADER		=> $headerArr,
            CURLOPT_RETURNTRANSFER 	=> 1,
            CURLOPT_CONNECTTIMEOUT	=> 0,
            CURLOPT_NOSIGNAL =>1,
            CURLOPT_POST			=> 1,
            CURLOPT_POSTFIELDS		=> is_array($data)?http_build_query($data):$data,
            CURLOPT_URL				=> $url
        );

      	$ch 	= curl_init();
    	if(!$is_wait){
    		//不做结果等待
    		$defaults[CURLOPT_TIMEOUT_MS] = 200;
		}else{
			$defaults[CURLOPT_TIMEOUT] = 120;
		}
		curl_setopt_array($ch, $defaults);

		$result = curl_exec($ch);

		if( $result === false)
		{
			return curl_error($ch);
		}
		curl_close($ch);
		
		return $result;
    }

	 /**
     * @author subenjiang
     * @time 20151010
     * REQUEST 获取IP
     * Enter description here ...
     */
    public static function get_ip()
    {
        static $ip = false;
    
        if (false != $ip) {
            return $ip;
        }
    
        $keys = array(
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        );
    
        foreach ($keys as $item) {
            if (!isset($_SERVER[$item])) {
                continue;
            }
    
            $curIp = $_SERVER[$item];
            $curIp = explode('.', $curIp);
            if (count($curIp) != 4) {
                break;
            }
    
            foreach ($curIp as & $sub) {
                if (($sub = intval($sub)) < 0 || $sub > 255) {
                    break 2;
                }
            }
    
            $curIpBin = $curIp[0] << 24 | $curIp[1] << 16 | $curIp[2] << 8 | $curIp[3];
            $masks = array(// hexadecimal ip  ip mask
                array(0x7F000001, 0xFFFF0000), // 127.0.*.*
                array(0x0A000000, 0xFFFF0000), // 10.0.*.*
                array(0xC0A80000, 0xFFFF0000) // 192.168.*.*
            );
            foreach ($masks as $ipMask) {
                if (($curIpBin & $ipMask[1]) === ($ipMask[0] & $ipMask[1])) {
                    break 2;
                }
            }
    
            return $ip = implode('.', $curIp);
        }
    
        return $ip = $_SERVER['REMOTE_ADDR'];
    }
}
