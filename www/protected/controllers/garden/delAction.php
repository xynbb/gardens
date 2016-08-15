<?php
class delAction extends Action {
    
    public function run(){
        
        if(!$this->_isAjax()) return ;
        
		if(!isset($_POST['id']) || empty($_POST['id'])) $this->error("删除失败！");
		
		if(gardenModel::getInstance()->updateData($_POST['id'], array('status' => -1)))
			$this->success("删除成功！");
		else
			$this->error("删除失败！");
				
    }
}