<?php
class webtriviaModel extends Model {

	public $_table 	= "webtrivia";
	
	public $_fields = array('id','name','desc','type','content','status','delstatus','create_time','update_time');
	
	public function __construct() {
		parent::__construct();
		
		$this->db();
	}
	/**
	 * 获取所以碎片数据
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
	public function getWebtriviaList() {
		
		$sql = "select `".implode('`,`', $this->_fields)."` from {$this->_table}";
		
		return $this->all($sql);
	}
	/**
	 * 保存碎片数据
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
	public function save($webtrivia) {
		return $this->add($webtrivia,$this->_table);
	}
	
	/**
	 * 根据编号获取碎片数据
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
	public function getWebtriviaById($id=null) {
		
		if(empty($id)) return ;
		
		$sql = "select `".implode('`,`', $this->_fields)."` from {$this->_table} where id={$id}";
		
		return $this->row($sql);
	}
	/**
	 * 根据编号修改碎片数据
	 * @author subenjiang<email:benjiang.su@fmscm.com,phone:18511866287>
	 * @date 20160218
	 * @version 2.0
	 * @return array
	 */
	public function updateWebtrivia($webtrivia,$id){
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