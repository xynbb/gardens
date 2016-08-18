<?php

/**
 * 业务逻辑类 —— 系统管理
 */
class Business_System extends Business {

	/**
	 * 插入一个记录
	 * @param array $values
	 * @return array
	 */
	public function create(array $values = array()) {
		$fields = array(
		    'name' => '',
		    'domain' => '',
		    'create_time' => time(),
		    'update_time' => time(),
		);

		$name = Arr::get($values, 'name', '');
		$domain = Arr::get($values, 'domain', '');
		$domain = str_replace('http://', '', $domain);

		$errors = array();
		if (!$name) {
			$errors[] = '系统名称不能为空！';
		}
		if (!$domain) {
			$errors[] = '系统域名不能为空！';
		}
		if ($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}

		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		$values['domain'] = $domain;

		return Dao::factory('System')->insert($values);
	}

	/**
	 * 更新一条记录
	 * @param array $values
	 * @return integer
	 */
	public function update(array $values = array()) {
		$fields = array(
		    'name' => '',
		    'domain' => '',
		    'update_time' => time(),
		);

		$systemId = Arr::get($values, 'system_id', '');
		$name = Arr::get($values, 'name', '');
		$domain = Arr::get($values, 'domain', '');
		$domain = str_replace('http://', '', $domain);

		$errors = array();
		if (!$name) {
			$errors[] = '系统名称不能为空！';
		}
		if (!$domain) {
			$errors[] = '系统域名不能为空！';
		}
		if ($errors) {
			throw new Business_Exception(implode(' ', $errors));
		}

		unset($values['system_id']);
		$values = array_intersect_key($values, $fields);
		$values = $values + $fields;

		$values['domain'] = $domain;

		return Dao::factory('System')->updateBySystemId($systemId, $values);
	}

	/**
	 * 获取系统列表
	 * @param integer $offset
	 * @param integer $number
	 * @return array
	 */
	public function getSystems($number = 0, $offset = 0) {
		return Dao::factory('System')->getSystems($number, $offset);
	}

	/**
	 * 获取一个系统
	 * @param number $systemId
	 * @return array
	 */
	public function getSystemBySystemId($systemId = 0) {
		return Dao::factory('System')->getSystemBySystemId($systemId);
	}

	/**
	 * 删除系统
	 * @param number $systemId
	 * @throws Business_Exception
	 * @return array
	 */
	public function delete($systemId = 0) {
		$privileges = Dao::factory('Privilege')->getPrivilegesBySystemId($systemId);
		if (count($privileges) > 0) {
			throw new Business_Exception('不能删除，系统下仍有权限！');
		}
		return Dao::factory('System')->delete($systemId);
	}
	

}
