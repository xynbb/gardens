<?php
//设置权限
class set_privAction extends Action {
    
    public function run(){
        
        if(!isset($_REQUEST['role_id'])) $this->error("缺少role_id!");
        
        $this->view['role_id'] = $_REQUEST['role_id'];
        
        if($this->_isAjax())
        {
            $this->save();
        }
        
        $this->page();
    }
    //页面
    private function page()
    {
        //获取菜单列表
        $this->view['list'] = rbac_menuModel::getInstance()->getMenuList();
        
        //获取选中的权限项
        $priv 			= rbac_privModel::getInstance()->getPriv($this->view['role_id']);
        $_priv 			= array();
        if(!empty($priv))
        {
            foreach ($priv as $v)
            {
                if(empty($v['controller'])&&!isset($_priv[$v['menu_id']]))
                    $_priv[$v['menu_id']] = $v['action'];
                else
                    $_priv[$v['menu_id']][$v['controller']][] = $v['action'];
            }
        }
        
        $this->view['priv'] = $_priv;
        
        $this->view("/index");
    }
    
    //保存
    private function save()
    {
        //删除某个角色的权限
        rbac_privModel::getInstance()->delPrivByRole($_POST['role_id'],$this->user['id']);
         
        //编辑权限菜单
        if(isset($_POST['mid'])&&!empty($_POST['mid']))
        {
            foreach ($_POST['mid'] as $v)
            {
                rbac_privModel::getInstance()->editPriv($_POST['role_id'],$v,'','',$this->user['id']);
            }
        }
         
        //编辑权限项
        if(isset($_POST['m'])&&!empty($_POST['m']))
        {
            foreach ($_POST['m'] as $menu_id=>$ca)
            {
                foreach ($ca as $controller=>$actions)
                {
                    foreach ($actions as $action)
                    {
                        rbac_privModel::getInstance()->editPriv($_POST['role_id'],$menu_id,$controller,$action,$this->user['id']);
                    }
                }
            }
        }
         
         
        $role_ids = rbac_roleModel::getInstance()->getIdsByPath($this->view['role_id']);
         
        if(!empty($role_ids)) rbac_privModel::getInstance()->delPrivByPids($this->view['role_id'], $role_ids, $this->user['id']);
        
        $this->success("保存成功!");
    }
}