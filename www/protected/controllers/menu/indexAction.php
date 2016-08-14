<?php
class indexAction extends Action {
    
    public function run(){
		
        $this->view['list'] = rbac_menuModel::getInstance()->getMenuList();

        $this->view('/index');
    }
}