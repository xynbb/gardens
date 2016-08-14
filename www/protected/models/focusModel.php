<?PHP

class focusModel extends Model
{
	public $_table  = 'focus';
	
	public $_fields = array('focus_id','title','description','image_url','position','url','type','status','add_time','update_time');
	
	public function __construct()
	{
		parent::__construct();
		$this->_pk = 'focus_id';
		$this->db();
	}
	
	public function getFocusRow($id){
		if(empty($id)) return array();
		
		$params=array();
        $sql = "SELECT ".implode(',', $this->_fields)." FROM {$this->_table} WHERE focus_id=:focus_id";
        $params[':focus_id'] = $id;
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
