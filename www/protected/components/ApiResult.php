<?php

/*
 * Api 输出，目前主要支持Json格式
 * 
 */
class ApiResult {
	
	/**
	 * 输出模板，默认成功
	 * 部分接口可能会有额外参数
	 * 
	 * @var array
	 */
	public  $result = array(
			'code'=>0,
			'msg'=>'成功',
            'sys_time'=>'',
			'data'=>array(),
	);

	
	/**
	 * 支持js var, json, jsonp
	 * 
	 * @var type 
	 */
	private $resultFormat = 'json';
	
	/**
	 *
	 * @var type 
	 */
	private $resultCallBack = '';
	
	/**
	 *
	 * @var type 输出变量名
	 */
	private $reaultVarName = '';
	
	/**
	 * 初始化，根据参数返回输出类型
	 */
	public function __construct() {
		//检查设置
		$callback = Yii::app()->request->getQuery('callback');
		$varName = Yii::app()->request->getQuery('varname');
		
		switch (true) {
			case !is_null($callback):
				if (preg_match("/^[a-zA-Z][a-zA-Z0-9_\.]+$/", $callback)) {
					$this->setReturnTypeJsonp($callback);
					break;
				}else{
					//输出错误
				}
			case !is_null($varName):
				if (preg_match("/^[a-zA-Z][a-zA-Z0-9_\.]+$/", $callback)) {
					$this->setReturnTypeJsVar($varName);
					break;
				}else{
					//输出错误
				}
			default:
				$this->setReturnTypeJson();
				break;
		}
		$this->outputHeader();
	}

	/**
	 * 
	 */
	public function setReturnTypeJsVar($varName){
		$this->resultFormat = 'jsvar';
		$this->reaultVarName = $varName;
	}
	
	/**
	 * 
	 */
	public function setReturnTypeJson(){
		$this->resultFormat = 'json';
	}
	
	/**
	 * 
	 */
	public function setReturnTypeJsonp($callback){
		$this->resultFormat = 'jsonp';
		$this->resultCallBack = $callback;
	}
	
	/**
	 * 
	 */
	private function toJson (){
		return CJSON::encode($this->result);
	}
	
	/**
	 * 返回jsonp形式
	 * var a = {};
	 */
	private function toJsonp (){
		
		return htmlentities($this->resultCallBack).'('.CJSON::encode($this->result).');';
	}
	
	/**
	 * 返回js变量形式
	 * var a = {};
	 */
	private function toJsVar (){
		return 'var '.htmlentities($this->resultCallBack).'='
			. CJSON::encode($this->result).';';
	}
	
	
	public function setCode($code){
		$this->result['code'] = $code;
	}
	
	public function getCode(){
		return $this->result['code'];
	}
	
	public function getMsg(){
		return $this->result['msg'];
	}
	
	public function setMsg($msg){
		$this->result['msg'] = $msg;
	}
	
	public function setData($data){
		$this->result['data'] = $data;
	}
	
	public function getData(){
		return $this->result['data'];
	}
	
	
	/**
	 * 默认错误
	 */
	public function setError($code=-1000,$msg='失败'){
		$this->setCode($code);
		$this->setMsg($msg);
		return $this;
	}
	
	/**
	 * 默认成功
	 * @param string $data
	 * @param number $code
	 */
	public function setSuccess($data=null, $code=20200){
		$this->setCode($code);
		$this->setData($data);
		return $this;
	}
	


	/**
	 * 设置返回值
	 * @param type $name
	 * @param type $value
	 */
	public function __set($name, $value) {
		switch ($name) {
			case 'code':case 'msg':case 'data':
				$this->result[$name] = $value;
				break;
		};
	}
	/**
	 * 
	 */
	public function __toString(){
        $this->result['sys_time'] = date('Y-m-d H:i:s');
		$result = '';
		switch ($this->resultFormat) {
			case 'json':
				$result = $this->toJson();
				break;
			case 'jsonp':
				$result = $this->toJsonp();
				break;
			case 'jsvar':
				$result = $this->toJsVar();
				break;
			default:
				break;
		}
		
		return $result;
	}
	
	/**
	 * 
	 * @todo 编码支持
	 */
	public function outputHeader(){
		
		switch ($this->resultFormat) {
			case 'jsons':
				header('Content-Type: application/json; charset=utf-8');
				break;
			case 'jsonp':
				header('Content-Type: application/javascript; charset=utf-8');
				break;
			case 'jsvar':
				header('Content-Type: application/javascript; charset=utf-8');
				break;

			default:
				header('Content-Type: text/html; charset=utf-8');
				break;
		}
	}	
}
