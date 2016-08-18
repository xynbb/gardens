<?php
/**
 * 业务逻辑类 —— 模块管理
 * @author dongjie
 */
class Business_Module extends Business {
	
	/**
	 * 创建模块
	 * @param array $values
	 * @return array
	 */
	public function create(array $values) {
		$fields = array (
			'name' => '',
			'system_id' => 0,
			'module' => '',
			'portal' => '',
			'create_time' => time(),
			'update_time' => time(),
		);
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;
		
		$errors = array();
		if(!$values['name']) {
			$errors[] = '模块名不能为空';
		}
		if(!$values['system_id']) {
			$errors[] = '系统id不能为空';
		}
		if(!$values['portal']) {
			$errors[] = '入口文件不能为空';
		}
		
		if($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}
		
		return Dao::factory('Module')->insert($values);
	}
	
	/**
	 * 更新模块
	 * @param array $values
	 * @param integer
	 * @return integer
	 */
	public function update(array $values) {
		$fields = array (
			'module_id' => 0,
			'name' => '',
			'module' => '',
			'system_id' => 0,
			'portal' => '',
			'update_time' => time(),
		);
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		$moduleId = $values['module_id'];
		
		$errors = array();
		if(!$values['name']) {
			$errors[] = '模块名不能为空';
		}
		if(!$values['system_id']) {
			$errors[] = '系统id不能为空';
		}
		if(!$values['portal']) {
			$errors[] = '入口文件不能为空';
		}
		if($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}
		
		try {
			$moduleValues = array (
				'module' => $values['module'],
				'portal' => $values['portal'],
				'update_time' => $values['update_time'],
			);
			Dao::factory('Privilege')->updateModuleByModuleId($moduleId, $moduleValues);
		} catch(Exception $e) {
			throw new Business_Exception('更新权限数据失败：'. $e->getMessage());
		}
		
		return Dao::factory('Module')->update($moduleId, $values);
	}
	
	/**
	 * 删除一个模块
	 * @param number $moduleId
	 * @return integer
	 */
	public function delete($moduleId = 0) {
		$privileges = Dao::factory('Privilege')->getPrivilegesByModuleId($moduleId);
		if(count($privileges) > 0) {
			throw new Business_Exception('不能删除，模块下仍有权限！');
		}
		return Dao::factory('Module')->delete($moduleId);
	}
	
	/**
	 * 获取一个模块
	 * @param number $moduleId
	 * @return array
	 */
	public function getModuleByModuleId($moduleId = 0) {
		return Dao::factory('Module')->getModuleByModuleId($moduleId);
	}
	
	/**
	 * 获取模块列表
	 * @param number $number
	 * @param number $offset
	 * @return array
	 */
	public function getModules($number = 0, $offset = 0) {
		return Dao::factory('Module')->getModules($number, $offset);
	}

}