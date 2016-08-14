<?PHP

class categoryModel extends Model
{
	public $_table  = 'category_type';
	
	public $_fields = array('id','category_name','path','parent_id','create_id','is_show','is_recommend','status','add_time','update_time');
	
	public function __construct()
	{
		parent::__construct();
		$this->db();
	}
	
	public function getCategoryRow($id){
		if(empty($id)) return array();
		
		$params=array();
        $sql = "SELECT ".implode(',', $this->_fields)." FROM {$this->_table} WHERE id=:id";
        $params[':id'] = $id;
        return $this->row($sql, $params);
	}
	
	//获取select列表
	public function getCategorySelect()
	{
        $sql = "select `".implode('`,`', $this->_fields)."` from ".$this->_table." where status = 1 order by path asc ";
		$list = $this->all($sql);
		return !empty($list)?$list:array();
	}	
	
	//修改Path
	public function updateMenuPath($p1,$path,$p2=null) 
	{
		if(empty($p2))
			$res = $this->update(array('path'=>$path),'id=:id', array(':id'=>$p1));
		else{
			$sql = "UPDATE ".$this->getTable()." SET `path` = REPLACE(`path`,'{$p1}','{$p2}') WHERE `path` LIKE '{$p1}%'";
			$res  = $this->execute($sql);
		}
		return $res;
	}
	
	public static function getInstance()
	{
		static $class = null;
	
		if ($class == null)
		{
			$class = new self();
		}
		return $class;
	}

}
