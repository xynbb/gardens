<?PHP

class contract_typeModel extends Model
{
	public $_table  = 'contract_type';

    public $_fields = array('id','type_name','flag','status','add_time','update_time');
	
	public function __construct()
	{
		parent::__construct();
		$this->db('ht');
	}

	//获取select列表
	public function getContracttypeInfo($id)
	{
        $sql = "select `".implode('`,`', $this->_fields)."` from ".$this->_table." where `id` = {$id}";
		return $this->row($sql);
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
