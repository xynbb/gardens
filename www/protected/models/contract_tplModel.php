<?PHP

class contract_tplModel extends Model
{
	public $_table  = 'contract_tpl';

    public $_fields = array('id','name','property','type','sell_mode','version','content','page_number','map_y','buyer_map_x','seller_map_x','pic_content','status','add_time','update_time');
	
	public function __construct()
	{
		parent::__construct();
		$this->db('ht');
	}

	//获取select列表
	public function getContracttplInfo($id)
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
