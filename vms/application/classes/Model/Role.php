<?php
/*
 * GVS角色模型层
 */
class Model_Role extends Model_BaseModel {
	public function getCreateTime($format = '') {
		return $format ? date($format, $this->create_time) : $this->create_time;
	}

	public function getUpdateTime($format = NULL) {
		return $format ? date($format, $this->update_time) : $this->update_time;
	}

	public function getName() {
		return HTML::chars($this->name);
	}

	/**
	 * 获得角色对应的部门
	 * @param Business_Client_Result $departments
	 * @return Model_Department
	 */
	public function getDepartment($departments) {
		static $storage = array();
		if(!isset($storage[$this->role_id])) {
			foreach($departments as $department) {
				if($this->department_id == $department->getDepartmentId()){
					$storage[$this->role_id] = $department;
				}
			}
		}
		return isset($storage[$this->role_id])? $storage[$this->role_id] : '';
	}
}
