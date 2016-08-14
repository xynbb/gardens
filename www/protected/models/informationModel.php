<?PHP

class informationModel extends Model
{
	public $_table  = 'information';
	
	public $_fields = array('information_id','category_id','title','short_desc','img_url','content','is_recommend','status','sort','add_time','update_time');
	
	public function __construct()
	{
		parent::__construct();
		$this->_pk = 'information_id';
		$this->db();
	}

	public function getInformationRow($id){
		if(empty($id)) return array();
		
		$params=array();
        $sql = "SELECT ".implode(',', $this->_fields)." FROM {$this->_table} WHERE information_id=:id";
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
