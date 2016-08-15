<?php
class gardenModel extends Model
{
	public $_table 	= "garden";
	
	public $_fields = array('id','name','sort','status','create_time','update_time');
	
	public function __construct() {
		parent::__construct();
		
		$this->db();
	}
	
	//获取列表
	public function getList() {
		$sql = "SELECT ".implode(',', $this->_fields)." FROM `{$this->_table}` WHERE `status`!=-1 ORDER BY `sort` ASC";
		
		return $this->all($sql);
	}

	//根据编号获取info
	public function getRowById($id) {
		$sql = "SELECT ".implode(',', $this->_fields)." FROM `{$this->_table}` WHERE id='{$id}'";
		
		return $this->row($sql);
	}

	/**
	 * 插入交易单
	 * @@param array $data
	 * @return int
	 * @author xyn
	 * @time 20160814
	 */
	public function insert($data) {
		$this->add($data);
		return $this->insert_id();
	}

	/**
	 * 修改数据
	 * @time 20160814
	 * @author xyn
	 */
	public function updateData($id, $update) {
		return $this->update($update, "id=:id", array(':id' => $id));
	}

	public static function getInstance() {
		static $class = null;
		if ($class == null) {
			$class = new self();
		}
		return $class;
	}
		
}
