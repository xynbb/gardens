<?php
class Model_Module extends Model_BaseModel {
	
	public function getCreateTime($format = '') {
		return $format ? date($format, $this->create_time) : $this->create_time;
	}
	
	public function getUpdateTime($format = '') {
		return $format ? date($format, $this->update_time) : $this->update_time;
	}
	
	public function findSystem($systems) {
		static $store = NULL;
		if($store === NULL) {
			foreach($systems as $system) {
				$store[$this->system_id] = $system;
			}
		}
		return isset($store[$this->system_id]) ? $store[$this->system_id] : NULL;
	}
}