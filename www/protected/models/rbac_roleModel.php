<?php
class rbac_roleModel extends Model
{
	public $_table 	= "rbac_role";
	
	public $_fields = array('id','name','parent_id','path','description','create_time','update_time','create_id','update_id','status','is_super');
	
	public function __construct()
	{
		parent::__construct();
		
		$this->db();
	}
	
	//修改Path
	public function updateRolePath($p1,$p2=null)
	{
		if(empty($p2))
			$sql = "UPDATE ".$this->getTable()." SET `path` = CONCAT(`path`,'{$p1},') where id='{$p1}'";
		else
			$sql = "UPDATE ".$this->getTable()." SET `path` = REPLACE(path,'{$p1}','{$p2}') WHERE `path` LIKE '{$p1}%'";
		
		return $this->execute($sql);
	}

	
	//获取角色列表
	public function getRoleList()
	{
		$sql = "select `id`,`name`,`path`,`parent_id`,`description`,`create_time`,`update_time`,`create_id`,`update_id`,`status`,`is_super` from ".$this->getTable()." where `status`=1 ORDER BY `path` ASC";
		
		return $this->all($sql);
	}
	
	//获取select列表
	public function getRoleSelect()
	{
		$sql = "select `id`,`name`,`path` from ".$this->getTable()." where `status`=1 order by `path` asc";
		
		return $this->all($sql);
	}
	
	//根据编号获取角色
	public function getRoleById($id)
	{
		$sql = "select `id`,`name`,`path`,`parent_id`,`description`,`create_time`,`update_time`,`create_id`,`update_id`,`status`,`is_super` from ".$this->getTable()." where `status`=1 and id='{$id}'";
		
		return $this->row($sql);
	}
	
	//根据用户 编号获取角色信息
	public function getRoleByUserId($id)
	{
		
		$sql  = "select `id`,`name`,`parent_id`,`is_super` from ".$this->getTable()." where `status`=1 and id='{$id}'";
		$all  = $this->all($sql);
		$_all = array();
		
		foreach ($all as $v)
		{
			$_all[$v['id']] = $v;
		}
		
		return $_all;
		
	}
	
	public function getNamesByIds($ids)
	{
		$sql = "select `name` from ".$this->getTable()." where `status`=1 and id in({$ids}) order by `path` asc";
		$all = $this->all($sql);
		
		$n	 = array();
		
		foreach ($all as $v)
		{
			$n[] = $v['name'];
		}
		
		return implode(",", $n);
	}
	
	public function getIdsByPath($role_id)
	{
	    if(empty($path)) return '';
	    
		$path = $this->getPathById($role_id);
		
	    $sql  = "select id from ".$this->getTable()." where path like '{$path}%'";
			
    	$ids  = $this->all($sql);
    	
    	if(!empty($ids))
    	{
    		$_ids = array();
    		
    		foreach ($ids as $v)
    		{
    			if($role_id!=$v['id']) $_ids[] = $v['id'];
    		}
    		return implode(',', $_ids);
    	}
		
    	return '';
	}
	
	//根据编号获取path
	public function getPathById($role_id)
	{
		$sql = "select path from ".$this->getTable()." where id='{$role_id}'";
		$path = $this->row($sql);
		
		return isset($path['path'])?$path['path']:'';
	}
	
	//删除角色
	public function delRole($id)
	{
		$sql = "update ".$this->getTable()." set status='0'  where `path` like '%,{$id},%' ";
		
		return $this->execute($sql);
	}
	
	//获取
	public function getIsSuperById($id)
	{
		$sql = "select `is_super` from ".$this->getTable()." where `id`='{$id}'";
		
		$row = $this->row($sql);
		
		return isset($row['is_super'])?$row['is_super']:'';
	}
	
	public function getRolesByUserId($userId)
	{
		$role_user_table = rbac_user_roleModel::getInstance()->getTable();
		
		$sql = "select a.`name` from ".$this->getTable()." a,".$role_user_table." b where a.id=b.role_id and b.user_id='{$userId}' and b.`status`=1 and a.`status`=1";
		
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
