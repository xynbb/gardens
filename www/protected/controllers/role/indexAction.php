<?php
class indexAction extends Action {
    
    public function run(){
		
        $this->view['list'] = rbac_roleModel::getInstance()->getRoleList(); 
	
		if(!$this->_isAjax())
			$this->view('/index');
		else
			$this->success($this->view('index_result',true));
    }
}