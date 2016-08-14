<?php
class rbac_privModel extends Model
{
	public $_table 	= "rbac_priv";
	
	public $_fields = array('id','role_id','menu_id','controller','action','create_id','update_id','create_time','update_time','status');
	
	public function __construct()
	{
		parent::__construct();
		
		$this->db();
	}
	//添加权限
	public function addPriv($role_id,$menu_id,$controller,$action,$user_id)
	{
		$time = date("Y-m-d H:i:s");
		
		$sql = "insert into ".$this->getTable()."(`role_id`,`menu_id`,`controller`,`action`,`create_id`,`create_time`,`update_id`,`update_time`,`status`) values ('{$role_id}','{$menu_id}','{$controller}','{$action}','{$user_id}','{$time}','{$user_id}','{$time}',1)";
		
		return $this->execute($sql);
	}
	
	//编辑权限
	public function editPriv($role_id,$menu_id,$controller,$action,$user_id)
	{		
		if(empty($menu_id)) return null;
		
		$isPriv = $this->isPriv($role_id,$menu_id,$controller,$action);
			
		if(!empty($isPriv))
		    return $this->addPrivByRole($role_id, $menu_id, $controller, $action,$user_id);
		else
		    return $this->addPriv($role_id, $menu_id, $controller, $action, $user_id);
	}
	
	//根据角色删除权限
	public function delPrivByRole($role_id,$user_id)
	{
		$time = date("Y-m-d H:i:s");
		
		$sql  = "update ".$this->getTable()." set `status`='0',`update_time`='{$time}',`update_id`='{$user_id}' where role_id='{$role_id}'";
		
		return $this->execute($sql);
		
	}
	
	public function delPrivByPids($role_id,$role_ids,$user_id)
	{
		$time = date("Y-m-d H:i:s");
		
		$sql = "UPDATE ".$this->getTable()." AS a,".$this->getTable()." AS b SET b.`status`=0,b.`update_time`='{$time}',b.`update_id`='{$user_id}' WHERE a.menu_id = b.menu_id AND a.role_id = '{$role_id}' AND b.role_id IN ({$role_ids}) AND a.controller = b.controller AND a.action = b.action AND b.`status` != a.`status`";

		return $this->execute($sql);
	}
	
	//启用权限
	public function addPrivByRole($role_id,$menu_id,$controller,$action,$user_id)
	{
		$time = date("Y-m-d H:i:s");
	
		$sql = "update ".$this->getTable()." set `status`='1',`update_time`='{$time}',`update_id`='{$user_id}' where  role_id='{$role_id}' and menu_id='{$menu_id}'  and controller='{$controller}'  and action='{$action}'";

		return $this->execute($sql);
	}
	
	//获取权限
	public function getPriv($role_id)
	{
		$sql = "select menu_id,controller,action from ".$this->getTable()." where `status`='1' and role_id='{$role_id}'";
		
		return $this->all($sql);	
	}
	
	
	//是否存在权限
	public function isPriv($role_id,$menu_id,$controller,$action)
	{
		$sql = "select count(1) as cnt from ".$this->getTable()." where role_id='{$role_id}' and menu_id='{$menu_id}'  and controller='{$controller}'  and action='{$action}' ";
		
		$row = $this->row($sql);
		
		return $row['cnt'];	
	}


	//根据用户编号获取权限
	public function getPrivByRoleIds($role_ids)
	{
		if(empty($role_ids)) return array();
		
		if(isset($_SESSION['priv']))
		{
			return $_SESSION['priv'];
		}
		
		$sql  = "select controller,action from ".$this->getTable()." where `status`='1' and `role_id` in(".implode(',', $role_ids).")";
		
		$all  = $this->all($sql);
		
		$_all = array();
		
		foreach ($all as $v)
		{
			if(!empty($v['controller'])) $_all[$v['controller']][] = $v['action'];
		}
		
		$_SESSION['priv'] = $_all;
		
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
