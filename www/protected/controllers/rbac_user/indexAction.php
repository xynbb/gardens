<?php
class indexAction extends Action {
    
    public function run(){
		
        $options = array();
		
		$options['size'] = 10;
		
		$role_id = intval($_REQUEST['role_id']);
		
		if($this->_isAjax())
		{
			$type    = intval($_REQUEST['type']);
			$keyword = Yii::app()->request->getParam('keyword' , '');
			
			$alias = empty($role_id)?'':'a.';
			
			switch ($type)
			{
				case 1:
					$options['where'][$alias.'uname-like'] = $keyword;
				break;
				case 2:
					$options['where'][$alias.'real_name-like'] = $keyword;
				break;
				case 3:
					$options['where'][$alias.'id'] = $keyword;
				break;
			}
		}
		
		if(!empty($role_id))
		{
			$options['sql'] = "SELECT a.id,a.uname,a.sex,a.email,a.idcard,a.real_name,a.mobile,a.deptname,a.login_time,c.`name` as roles from rbac_user a,rbac_user_role b,rbac_role c where a.id=b.user_id and b.role_id=c.id and b.`status`=1 and b.role_id={$role_id} and c.`status`=1 and a.status=1";
		}
		else
		{
			$options['where']['status'] = 1;	
		}
		$list = rbac_userModel::getInstance()->search($options);

		if(!empty($list['list'])&&empty($role_id))
		{
			foreach ($list['list'] as $k=>$v)
			{
				$role = rbac_roleModel::getInstance()->getRolesByUserId($v['id']);
				
				$list['list'][$k]['roles'] = $this->setRoles($role);
				
			}
		}
		
		$this->view['list'] = $list;
		
		if(!$this->_isAjax())
			$this->view('/index');
		else
			$this->success($this->view('index_result',true));
    }
    
    private function setRoles($list)
    {
        $arr = array();
    
        foreach ($list as $v)
        {
            $arr[] = $v['name'];
        }
        return $arr;
    }
}