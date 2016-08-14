<?php
//设置角色
class set_roleAction extends Action {
    
    public function run(){
        
        if(empty($_REQUEST['user_id'])) $this->error("缺少参数！",'/role/index');
        
        $this->view['user_id'] = $_REQUEST['user_id'];
        
        if(!empty($_POST))
        {
           $this->save();
        }
        
        $this->page();
    }
    
    //页面
    private function page()
    {
        $this->view['list']	= rbac_roleModel::getInstance()->getRoleList();
        $role 				= rbac_user_roleModel::getInstance()->getUserRole($this->view['user_id']);
        $_role 				= array();
        
        foreach ($role as $v)
        {
            $_role[$v['role_id']] = $v['branch_id'];
        }
        
        $this->view['roles'] = $_role;
        
        $this->view("/index");
    }
    
    //保存
    private function save()
    {
        rbac_user_roleModel::getInstance()->delUserRole($this->view['user_id'], $this->user['id']);
         
        if(isset($_POST['role_id'])&&!empty($_POST['role_id']))
        {
            foreach ($_POST['role_id'] as $role_id)
            {
                rbac_user_roleModel::getInstance()->editUserRole( $this->view['user_id'],$role_id,0,$this->user['id']);
            }
        
            $roleNames = rbac_roleModel::getInstance()->getNamesByIds(implode(",", $_POST['role_id']));
        }
         
        $this->success(''); 
    }
}