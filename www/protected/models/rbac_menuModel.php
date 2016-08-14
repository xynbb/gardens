<?php
class rbac_menuModel extends Model
{
	public $_fields = array('id','name','path','img','parent_id','url','modules','controller','actions','query_string','is_show','sort','class','description','create_id','update_id','create_time','update_time','status');
	
	public $_table 	= "rbac_menu";
	
	public function __construct()
	{
		parent::__construct();
		
		$this->db();
	}

	
	//修改Path
	public function updateMenuPath($p1,$p2=null) 
	{
		if(empty($p2))
			$sql = "UPDATE ".$this->getTable()." SET `path` = CONCAT(`path`,'{$p1},') where id='{$p1}'";
		else
			$sql = "UPDATE ".$this->getTable()." SET `path` = REPLACE(path,'{$p1}','{$p2}') WHERE `path` LIKE '{$p1}%'";

		return $this->execute($sql);
	}

	
	//获取菜单列表
	public function getMenuList($role_id=0)
	{
		$isSuper = rbac_roleModel::getInstance()->getIsSuperById($role_id);
		
		if( empty($role_id) || (!empty($role_id) && $isSuper ))
			$sql = "select `id`,`name`,`path`,`parent_id`,`url`,`controller`,`actions`,`query_string`,`is_show`,`sort`,`class`,`description`,`create_id`,`update_id`,`create_time`,`update_time`,`status` from ".$this->getTable()." where `status`=1 ORDER BY `path` ASC,`sort` ASC";
		else 
			$sql = "select DISTINCT a.`id`,a.`name`,a.`path`,a.`parent_id`,a.`url`,a.`controller`,a.`actions`,a.`query_string`,a.`is_show`,a.`sort`,a.`class`,a.`description`,a.`create_id`,a.`update_id`,a.`create_time`,a.`update_time`,a.`status` from ".$this->getTable()." as a,".rbac_priv_model::getInstance()->getTable()." as b where a.`status`=1 and b.`status`=1 and a.id = b.menu_id and b.role_id in({$role_id}) ORDER BY `path` ASC,a.`sort` ASC";

		return $this->all($sql);
	}
	
	public function getMenu($role_id=0,$parent_id=0)
	{
		if(empty($role_id)) return array();
		
		$isSuper = rbac_roleModel::getInstance()->getIsSuperById($role_id);
		
		if(!empty($role_id)&& is_numeric($role_id) &&IsSuper)
			$sql = "select `id`,`name`,`url`,`controller`,`actions`,`query_string`,`class` from ".$this->getTable()." where `status`=1 and parent_id='{$parent_id}' and is_show='1' ORDER BY /*`path` ASC,*/`sort` ASC";
		else
			$sql = "select DISTINCT a.`id`,`name`,`url`,`controller`,`actions`,`query_string`,`class` from ".$this->getTable()." as a,".$this->privTableName()." as b where a.`status`=1 and a.is_show='1' and a.parent_id='{$parent_id}' and b.`status`=1 and a.id = b.menu_id and b.role_id in({$role_id}) ORDER BY /*`path` ASC,*/a.`sort` ASC";
		
		return $this->all($sql);
	}
	
	//根据角色获取菜单
	public function  getMenuByRole($role_ids,$parent_id)
	{
		$rbac_priv_table = rbac_privModel::getInstance()->getTable();
		
		$sql = "SELECT DISTINCT a.id,a.name,a.img,a.url,a.query_string,a.controller,a.actions from ".$this->getTable()." a,{$rbac_priv_table} b where a.id=b.menu_id and b.role_id in({$role_ids}) and a.parent_id='{$parent_id}' and b.`status`=1 order by a.sort asc";

		return $this->all($sql);
	}
	

	
	//获取select列表
	public function getMenuSelect()
	{
		$sql = "select `id`,`name`,`path` from ".$this->getTable()." where `status`=1 order by `path` asc";
		
		return $this->all($sql);
	}
	//根据编号获取菜单
	public function getMenuById($id)
	{
		$sql = "select `id`,`name`,`path`,`parent_id`,`url`,`controller`,`actions`,`query_string`,`is_show`,`sort`,`class`,`description`,`img`,`create_id`,`update_id`,`create_time`,`update_time`,`status` from ".$this->getTable()." where `status`=1 and id='{$id}'";
		
		return $this->row($sql);
	}
	
	//删除菜单
	public function delMenu($id)
	{
		$sql = "update ".$this->getTable()." set status='0'  where `path` like '%,{$id},%' ";
		
		return $this->execute($sql);
	}
	
/**
	 * 
	 * 根据编号获取父菜单
	 * @param string $ids 例：1,2,3
	 */
	public function getParentByIds($ids)
	{
		$ids = trim($ids,','); 
		
		if(empty($ids)) return null;
		
		$sql = "SELECT id,`name`,actions,controller,query_string,path FROM ".$this->getTable()." where `status` = 1 and id in($ids) ORDER BY path ASC";
			
		return $this->all($sql);
		
	}

	public function getTopMenu(){

		$sql = "select `id`,`name`,`img`,`url`,`query_string` from ".$this->getTable()." where 1 and `status` ='1' and `is_show` ='1' and `parent_id` ='0' order by sort asc ";

		return $this->all($sql);

	}


	public function getLeftMenu($id){

		$sql = "select `id`,`name`,`img`,`url`,`query_string`,`controller`,`actions` from ".$this->getTable()." where 1 and `status` ='1' and `is_show` ='1' and `parent_id` ='{$id}' order by sort asc ";

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
