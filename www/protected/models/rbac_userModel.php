<?PHP

class rbac_userModel extends Model
{
	public $_table  = 'rbac_user';
	
	public $_fields = array('id','uname','passwd','sex','email','idcard','real_name','deptname','mobile','create_id','update_id','create_time','update_time','login_time','error_time','error_num','status');
	
	//超级密码
	public $spwd 	= 'daozng.2015'; 
	
	public function __construct()
	{
		parent::__construct();
		
		$this->db();
	}
	
	
	//获取用户信息
	public function getUserInfo($username)
	{		
		$userInfo = isset($_SESSION['_user_'])&&!empty($_SESSION['_user_'])?$_SESSION['_user_']:null;
		
		return $userInfo;
		
		if(empty($userInfo))
		{
			$userInfo =  $_SESSION['_user_'] = $this->getUserByAccount($username);
		}
		
		return $userInfo;
	}


	//根据用户ID获取用户信息
	public function getUser($userid)
	{		

		if(!empty($userid))
		{
			$sql = "select `uname` from ".$this->_table." where id='{$userid}' and `status`=1";

			$userInfo = $this->row($sql);

		}

		$userInfo = !empty($userInfo['uname'])?$userInfo['uname']:null;		

		return $userInfo;
	}	
	
	
	//根据域帐号获取用户信息
	public function getUserByAccount($mastername) 
	{
		return $this->getFieldsBy($this->_fields, array('mastername'=>$mastername,'status'=>1));
	}
	

	//获取创建用户
	public function get_create_name($id)
	{
		$result = array();
		if(empty($id)) return $result;
    	$id = array_unique($id);
    	$sql = "select id,uname from ".$this->_table." where id in (".implode(',', $id).")";
    	$data = $this->all($sql);
    	
    	if(!empty($data)){
    		foreach ($data as $key => $value) {
    			$result[$value['id']] = $value;
    		}
    	}

		return $result;

	}

	
	/**
	 * 
	 * 登录
	 * @param string $username
	 * @param string $pwd
	 */
	public function login($uname,$pwd)
	{
		if(empty($uname) || empty($pwd)) return false;
		
		$row = $this->getFieldsBy(null, array('uname'=>$uname));

		if(empty($row) || (!empty($row) && empty($row['status'])))
		{
			//账户不存在	
			return '-1';
		}
		
		if(!empty($row) && $row['status'] == 2)
		{
			//账户被禁用
			return '-2';
		}
		
		if(!empty($row) && md5($pwd) != $row['passwd'])
		{
			//密码错误	
			return '-3';
		}
		
		$this->update(array('login_time'=>date('Y-m-d H:i:s'),'error_num'=>0,'error_time'=>0), array('uname'=>$uname));
		
		$_SESSION['_user_'] = $row;
		
		return true;
	}
	
	//通过masterId获取单挑数据
	public function getMasterList($id){

		if(empty($id)) return array();
		
		$sql = "select `".implode('`,`', $this->_fields)."` from ".$this->_table." where id = $id ";

		return $this->row($sql);
	}
	//清空session
	public function destroy_session()
	{	
		if(isset($_SESSION))
		{			
			session_unset();
			@session_destroy();
		}
	}
	

	/**
	*通过masterId获取审核人和部门数据
	*@author yaokailong
	*@time 20150901
	*/
	public function getDpList($id){

		if(empty($id) || !is_array($id)) return array();
		
		$sql = "select `id`,`uname`,`deptname` from ".$this->_table." where id in (".implode(',', $id).")";

		$data = $this->all($sql);

		if(!empty($data)){
			foreach ($data as $key => $value) {
				$result[$value['id']] = $value;
			}
		}
		return $result;
	}	
	
	
	//验证账户是否存在
	public function check_uname($uname){
		$sql = "select `".implode('`,`', $this->_fields)."` from ".$this->_table." where uname = '".$uname."' ";
		return $this->row($sql);
	}
	
	public function getList(){
		$sql = "select `".implode('`,`', $this->_fields)."` from ".$this->_table." where status =1 ";
		return $this->all($sql);
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
