<?php
class Model_Privilege extends Model_BaseModel {
	
	public function getCreateTime($format = NULL) {
		return $format ? date($format, $this->create_time) : $this->create_time;
	}
	
	public function getTypeString() {
		switch($this->type) {
			case 'controller':
				return '控制器';
				break;
			case 'menu':
				return '菜单';
				break;
			case 'navigator':
				return '导航';
				break;
			default:
				return '';
		}
	}

	public function getName() {
		return $this->name;
	}
	
	public function getURI() {
		return $this->target ? $this->target : URL::site("{$this->module}/{$this->controller}/{$this->action}");
	}
}
