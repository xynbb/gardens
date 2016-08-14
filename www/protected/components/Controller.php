<?php

class Controller extends CController {

	public $user = array();

	public $company = array();

	public $isLogin = false;

	public $needLogin = true;

	public $action = '';
	
	public $loginUnique = array();
	
	public $layout = false;
	
	public function __construct($id,$module){
		parent::__construct($id,$module);
	}

	public function beforeAction($action){
		return true;
    }

    public function actions(){
        $controller_id = $this->getId();
        $action_id = $this->getActionId();

        return array(
            "{$action_id}" => "application.controllers.{$controller_id}.{$action_id}Action",
        );
    }
	
    /**
     * 获取静态文件（css、js）
     * @author bjc
     */
    public function getStaticFiles(){
        $str = "";

        $route = $this->getRoute();

        try{
            $route = explode("/",$route);

            $file_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/static/'.$route[0].'.php';

            if(file_exists($file_path)){
                $statics = require($file_path);
                $files = isset($statics[$route[1]]) ? $statics[$route[1]] : array();

                if(isset($files['js']) && is_array($files['js']) && !empty($files['js'])){
                    foreach($files['js'] as $js){
                        $str .= '<script type="text/javascript" src="'.$js.'"></script>'."\n";
                    }
                }

                if(isset($files['css']) && is_array($files['css']) && !empty($files['css'])){
                    foreach($files['css'] as $css){
                        $str .= '<link rel="stylesheet" type="text/css" href="'.$css.'">'."\n";
                    }
                }

            }
        }catch (Exception $e){

        }

        return $str;
    }

	/**
	 * @author whf
	 * @time 20151010
	 * 转义
	 * @param string $str 字符串
	 * @param boole $escape 是否转义
	 * @return string
	 */
	public function escape($str,$escape=true) {
	    return $escape?htmlspecialchars(addslashes($str)):$str;
	}
	
	/**
	 * @author subenjaing
	 * @time 20160125
	 * 数组val值转义
	 * @param array $data
	 */
	public function array_escape($data) {
		if( is_array($data) && !empty($data)) { //数组时转义 
			foreach($data as $k=>$v) {
				$data[$k] = is_array($v)?$this->array_escape($v):$this->escape($v);
			}
		}
		if(is_string($data) &&!empty($data)) { //字符串时转义
			$data = $this->escape($data);
		}
		return $data;
	}
}
