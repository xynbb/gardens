<?php
class upload_rulesModel extends Model {

	public $_table 	= 'upload_rules';
	
	public $_fields = array('id','name','path','ext','original','create_name','create_time','update_time','status');
	
	public function __construct() {
		parent::__construct();
		$this->db();
	}
	
	public function getAll(){
        $sql = "SELECT ".implode(',', $this->_fields)." FROM {$this->_table} WHERE status=:status";
        $params[':status'] = 1;
        return $this->all($sql, $params);
	}
	
	public static function getInstance() {
		static $class = null;
	
		if ($class == null) {
			$class = new self();
		}
		return $class;
	}
	
}