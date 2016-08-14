<?php
class login_logModel extends Model {

	public $_table 	= "login_log";
	
	public $_fields = array('login_id','user_id','account','login_time','login_ip','login_code','agent','logout_time','status','source_type','remarks');
	
	public function __construct() {
		parent::__construct();
		
		$this->_pk = 'login_id';
		
		$this->db('dazong');
	}
	
	public static function getInstance() {
		
		static $class = null;
	
		if ($class == null) {
			$class = new self();
		}
		return $class;
	}
	
}