<?php
class oper_recordModel extends Model {

	public $_table 	= 'oper_record_';
	
	public $_fields = array('id','deal_type','oper_type','sell_id','trading_id','seller_company_id','seller_company_name','buyer_company_id','buyer_company_name','buyer_id','buyer_name','seller_id','seller_name','content','finish_time','create_time','create_date','create_month');
	
	public function __construct() {
		
		$this->getApiTable();
		
		parent::__construct();
		
		$this->db('deal');
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