<?php
class rbac_user_roleModel extends Model
{
	public $_table 	= "rbac_user_role";
	
	public $_fields = array('id','user_id','role_id','branch_id','priv','create_id','update_id','create_time','update_time','status');
	
	public function __construct()
	{
		parent::__construct();
		
		$this->db();
	}
	
	//是否存在角色
	public function isUserRole($user_id,$role_id)
	{
		$sql = "select count(1) as cnt from ".$this->getTable()." where user_id='{$user_id}' and role_id='{$role_id}'";
	
		$row = $this->row($sql);
	
		return $row['cnt'];
	}
	
	//编辑角色
	public function editUserRole($user_id,$role_id,$branch_id,$operation_id)
	{
		if(!empty($user_id)&&!empty($role_id))
		{
			$isUserRole = $this->isUserRole($user_id,$role_id);
				
			if(!empty($isUserRole))
				return $this->addUserRoleByRole($user_id,$role_id,$branch_id,$operation_id);
			else
				return $this->addUserRole($user_id,$role_id,$branch_id,$operation_id);
		}
	}
	

	//启用角色
	public function addUserRoleByRole($user_id,$role_id,$branch_id=0,$operation_id=0)
	{
		$time = date("Y-m-d H:i:s");
	
		$sql = "update ".$this->getTable()." set `status`='1',`branch_id`= $branch_id ,`update_time`='{$time}',`update_id`= $operation_id where  role_id='{$role_id}' and user_id='{$user_id}'";
	
		return $this->execute($sql);
	}
	

	//添加角色
	public function addUserRole($user_id,$role_id,$branch_id=0,$operation_id=0)
	{
		$time = date("Y-m-d H:i:s");
	
		$sql = "insert into ".$this->getTable()."(`user_id`,`role_id`,`branch_id`,`priv`,`create_id`,`update_id`,`create_time`,`update_time`,`status`) values ('{$user_id}','{$role_id}',{$branch_id},'',{$operation_id},0,'{$time}','{$time}',1)";
	
		return $this->execute($sql);
	}
	
	//删除角色
	public function delUserRole($user_id,$operation_id)
	{
		$time = date("Y-m-d H:i:s");
	
		$sql  = "update ".$this->getTable()." set `status`='0',`update_time`='{$time}',`update_id`='{$operation_id}',`branch_id`='0' where user_id='{$user_id}'";
	
		return $this->execute($sql);
	}

	//获取角色
	public function getUserRole($user_id)
	{
		$sql = "select id,role_id,branch_id from ".$this->getTable()." where `status`='1' and user_id='{$user_id}'";
	
		return $this->all($sql);
	}
	
	//根据用户 编号获取角色信息
	public function getRoleIdsByUserId($id)
	{
		if(isset($_SESSION['role']))
		{
			return $_SESSION['role'];
		}
		
		$sql  = "select a.`id`,a.`name`,a.`parent_id`,a.`is_super` from ".rbac_roleModel::getInstance()->getTable()." as a,".$this->getTable()." as b where b.user_id='{$id}' and a.id=b.role_id and a.`status`=1 and b.`status`=1 ";

		$all  = $this->all($sql);
		
		$_all = array();
	
		foreach ($all as $v)
		{
			$_all[$v['id']] = $v;
		}
		
		$_SESSION['role'] = $_all;
	
		return $_all;
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
