<?php
class topAction extends Action {
    public function run(){
        
        $menu_model = rbac_menuModel::getInstance();
        
        if($this->isSuper)
        {
            $this->view['list'] = $menu_model->getTopMenu();
        }
        else
        {
            $this->view['list'] = $menu_model->getMenuByRole(implode(',', array_keys($this->role)),0);
        }

		$this->view('top');
    }
}