<?php
class updateAction extends Action {
    
    public function run($id=0){
        
       //获取menu信息
		$this->view['info'] = rbac_userModel::getInstance()->getFieldsById($id);

		if($this->_isAjax())
		{
			$this->save();
		}
		
		$this->view("/index");
    }
    //保存
    private function save() {
        
        $_POST['m']['update_id']	= $this->user['id'];
        $_POST['m']['update_time']	= date("Y-m-d H:i:s");
        
        //保存数据
        $rbac = rbac_userModel::getInstance()->update($_POST['m'],'id=:id', array(':id'=>$_POST['m']['id']));
        	
        if($rbac)
            $this->success(array('js'=>"alert('保存成功!');"._PARENT_SEARCH_._LAYER_CLOSE_),true);
        else
            $this->error(array('js'=>"alert('保存失败!');"),true);
    }
}