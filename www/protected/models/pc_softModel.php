<?PHP

class pc_softModel extends Model
{
	public $_table  = 'pc_software';
	
	public $_fields = array('id','name','file_path','version','type','config','create_time','update_time');
	
	public function __construct()
	{
		parent::__construct();
		$this->db();
	}
	
	public function getPcsoftRow($version='',$type=1){
		$params=array();
        $sql = "SELECT ".implode(',', $this->_fields)." FROM {$this->_table} WHERE version=:version and type=:type";
        $params[':version'] = $version;
		$params[':type'] = $type;
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
