<?php
class templateModel extends Model {

	public $_table 	= "template";
	
	public $_fields = array('id','name','type','content','create_time','update_time','code','status');
	
	public function __construct() {
		parent::__construct();
		
		$this->db('notice');
	}
	/**
	 * 获取所以模版数据
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
	public function getTemplateList() {
		
		$sql = "select `".implode('`,`', $this->_fields)."` from {$this->_table}";
		
		return $this->all($sql);
	}
	/**
	 * 保存模版数据
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
	public function save($webtrivia) {
		return $this->add($webtrivia,$this->_table);
	}
	
	/**
	 * 根据编号获取模版数据
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
	public function getTemplateById($id=null) {
		
		if(empty($id)) return ;
		
		$sql = "select `".implode('`,`', $this->_fields)."` from {$this->_table} where id={$id}";
		
		return $this->row($sql);
	}
	/**
	 * 根据编号修改模版数据
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
	public function updateTemplate($webtrivia,$id){
		return $this->update($webtrivia,"id=:id",array(':id'=>$id));
	}
	
	public static function getInstance() {
		static $class = null;
	
		if ($class == null) {
			$class = new self();
		}
		return $class;
	}
	
}