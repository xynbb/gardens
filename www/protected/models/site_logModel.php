<?php
class site_logModel extends Model {

	public $_table 	= 'site_log';
	
	public $_fields = array('id','url','controller','action','data','post_data','get_data','create_time','create_ip','create_id','create_name');
	
	public function __construct() {
		
		parent::__construct();
		
		$this->db();
	}
	
	/**
	 * 操作日志列表
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
	public function getSiteLog(){
		
		$sql = "select ".implode(',', $this->_fields)." from {$this->_table}";
		
		return $this->all($sql);
	}
	
	/**
	 * 操作日志添加
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
	public function saveSiteLog($data) {
		$this->add($data,$this->_table);
	}
	
	
	
	
	
	
	public static function getInstance() {
		static $class = null;
	
		if ($class == null) {
			$class = new self();
		}
		return $class;
	}
	
}