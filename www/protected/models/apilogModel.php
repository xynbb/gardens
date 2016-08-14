<?php
class apilogModel extends Model {

	public $_table 	= 'api_log_';
	
	public $_fields = array('id','lang_type','site','controller','action','url','path','content','request_info','response_info','from_type','from_group','response_time','create_time','create_date');
	
	public function __construct() {
		
		$this->getApiTable();
		
		parent::__construct();
		
		$this->db('deal_log');
	}
	
	public function getApiTable(){
		$this->_table.=date("Ym");
	}
	
	public static function getInstance() {
		static $class = null;
	
		if ($class == null) {
			$class = new self();
		}
		return $class;
	}
	
}