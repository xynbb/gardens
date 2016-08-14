<?php
class logoutAction extends Action {

    public function run(){
        //注销session cookie
        rbac_userModel::getInstance()->destroy_session();
        
        header("location:/");die();
    }
    
}