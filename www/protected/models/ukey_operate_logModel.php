<?PHP

class ukey_operate_logModel extends Model
{
	public $_table  = 'ukey_operate_log';

    public $_fields = array('id','user_id','user_name','operate','operate_type','operate_time','operate_ip','operate_mac','others');

	public function __construct()
	{
		parent::__construct();
		$this->db('dazong');
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
