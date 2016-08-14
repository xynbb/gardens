<?PHP

class linkModel extends Model
{
	public $_table  = 'link';
	
	public $_fields = array('link_id','name','img_url','link_url','sort','status','info','add_time','update_time');
	
	public function __construct()
	{
		parent::__construct();
		$this->_pk = 'link_id';
		$this->db();
	}

	public function getLinkRow($id){
		if(empty($id)) return array();
		
		$params=array();
        $sql = "SELECT ".implode(',', $this->_fields)." FROM {$this->_table} WHERE link_id=:id";
        $params[':id'] = $id;
        return $this->row($sql, $params);
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
