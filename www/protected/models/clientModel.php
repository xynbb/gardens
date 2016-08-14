<?php
class clientModel extends Model {

	public $_table 	= "client";
	
	public $_fields = array('id','type','client_id','template_id','template_data','status','log_content','create_time','update_time');
	
	public function __construct() {
		parent::__construct();
		
		$this->db('notice');
	}
	
	public static function getInstance() {
		static $class = null;
	
		if ($class == null) {
			$class = new self();
		}
		return $class;
	}
	
}