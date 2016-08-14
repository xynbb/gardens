<?php
include_once dirname(__FILE__).'/aes.php';
class login
{
	//配置文件
	public $config = null;
	//aes
	private $aes    = null;
	//cookie内容
	private $cookie = null;
	
	public function init(){}
	
	public function __construct() {
		
		//获取配置文件信息
		$this->config = Yii::app()->params['login'];//定义配置文件属性
		
		$this->aes 	  = new aes();//实例化aes
		$this->aes->set_key($this->config['key']);//设置key
		$this->aes->require_pkcs5();//设置require方式
		
		//获取cookie内容
//		$this->cookie = isset($_COOKIE[$this->config['name']])?$_COOKIE[$this->config['name']]:null;
	}
	
	//获取cookie
	public function get($cookie_name='') {
		
		$this->cookie = isset($_COOKIE[$cookie_name])?$_COOKIE[$cookie_name]:null;
		
		if(empty($this->cookie)) return null;
		
		$data = $this->aes->decrypt($this->cookie);
		
		if(empty($data)) return null;
		
		$data = json_decode($data,true);
		
		if(is_array($data))
			return $data;
		else 
			return null;
	}
	
	public function getCookieName($uuid=''){
		return md5($uuid.$this->config['user_agent'].date('Ymd'));
	}
	//设置cookie
	public function set($cookie_name,$data,$expire=null) {
	   
		if(empty($data)||empty($cookie_name)) return false;

		$data = json_encode($data);
		
		$data = $this->aes->encrypt($data);
		
		$expire = empty($expire)?$this->config['expire']:$expire;
		
		setcookie($cookie_name,$data,null,$this->config['path'],$this->config['domain']);
	}
	
	public function setUuid($uuid,$expire=null) {
		
		if(empty($uuid)) return false;

		$uuid = json_encode($uuid);
		
		$uuid = $this->aes->encrypt($uuid);
		
		$expire = empty($expire)?$this->config['expire']:$expire;
		
		setcookie($this->config['uuid_name'],$uuid,$expire,$this->config['path'],$this->config['domain']);
	
	}
	
	public function rm($cookie_name) {
		setcookie($cookie_name,null,0,$this->config['path'],$this->config['domain']);
	}
	
}