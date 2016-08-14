<?php
class configureModel extends Model {

	public $_table 	= 'configure';
	
	public $_fields = array('id','category_id','category_name','code','create_time','update_time','create_id','create_name','create_ip','status');
	
	public function __construct() {
		
		parent::__construct();
		
		$this->db('deal');
	}
	
	/**
	 * 分类配置添加
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
	public function saveConfigure($data) {
		return $this->add($data,$this->_table);
	}
	
	/**
	 * 根据条件获取数据
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
	public function getConfigureById($id=null) {
		
		if(empty($id)) return ;
		
		$sql = "select `".implode('`,`', $this->_fields)."` from {$this->_table} where id={$id}";
		
		return $this->row($sql);
	}
	/**
	 * 根据编号修改数据
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
	public function updateConfigure($data,$id){
		return $this->update($data,"id=:id",array(':id'=>$id));
	}
	
	public static function getInstance() {
		static $class = null;
	
		if ($class == null) {
			$class = new self();
		}
		return $class;
	}
	
}