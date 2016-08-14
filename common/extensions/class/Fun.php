<?php
/**
 * 
 * 函数
 * @author wanghongfeng
 *
 */
class Fun
{
	/**
     * 检查邮箱格式
     *
     * @param  [type] $email [description]
     * @return [type]        [description]
     */
    public static function checkEmail($email){
        $reg = "/^[0-9a-zA-Z]+(?:[_.-][a-z0-9-]+)*@[a-zA-Z0-9]+(?:[-.][a-zA-Z0-9]+)*.[a-zA-Z]+$/i";
        if(preg_match($reg, $email)){
            return true;
        }
        return false;
    }

    /**
     * 检查手机号格式
     *
     * @param  [type] $mobile [description]
     * @return [type]         [description]
     */
    public static function checkMobile($mobile){
        $reg = "/^(13[0-9]|15[012356789]|17[0-9]|18[0-9]|14[57])\d{8}$/";
        if(preg_match($reg,$mobile)){
            return true;
        }
        return false;
    }
    
 	//验证公司名称不能包含特殊字符
    public static function checkCompany($company_name){
    	
    	$reg = "/[ '.:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/";
    	if(preg_match($reg,$company_name)){
    		return true;
    	}
    	return false;
    }

    /**
     * 添加日志
     * @author bjc
     * @param $depName 部门名称
     * @param $host 主机IP
     * @param $sysname 系统名称
     * @param $class 类名（路径）
     * @param $method 方法名
     * @param $level 日志级别 从高到低 1 FATAL| 2 ERROR| 3 WARN| 4 INFO| 5 DEBUG| 6 TRACE
     * @param $msg 日志内容
     */
    public static function addLog($level,$msg,$depName='前台研发部'){
        $_level = array(
            1 => 'FATAL',
            2 => 'ERROR',
            3 => 'WARN',
            4 => 'INFO',
            5 => 'DEBUG',
            6 => 'TRACE'
        );

        if(!isset($_level[$level])) throw new Exception("日志级别错误-{$level}");

        $log = array(
            date("Y-m-d H:i:s.000"),//时间
            $depName, //部门名称
            $_SERVER['SERVER_ADDR'], //host 本机IP
            $_SERVER['SERVER_NAME'], //系统名称
            $_SERVER['REQUEST_URI'], //请求地址
            $_SERVER['REQUEST_METHOD'], //请求方法 （GET POST）
            $_level[$level], //错误级别
            $msg //日志内容
        );

        Yii::app()->redis_w->rPush(LOG_KEY,implode(" ",$log));
    }

    /**
     * 增加ICP日志
     * @param $type 类型
     * @param $msg 日志内容
     */
    public static function addIcpLog($type,$msg){
        $_type = array(
            1 => 'user', //用户相关
            2 => 'code', //代码发布
            3 => 'trading',//交易数据
            4 => 'manage' //管理维护
        );

        if(!isset($_type[$type])) throw new Exception("ICP日志类型错误-{$type}");

        if(!is_array($msg)) throw new Exception("ICP日志内容必须为数组-{$msg}");

        $log = json_encode(array(
            "module" => $_type[$type],
            "message" => $msg
        ));

        Yii::app()->redis_w->rPush(ICP_LOG_KEY,$log);

    }
}