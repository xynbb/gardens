<?php
class newpasswordAction extends Action {
    
    public function run($id=0){
        $pwd_status = 0;
        if($id == 0){
            $pwd_status = 1;
        }

        $this->view['pwd_status'] = $pwd_status;
		$this->view['info'] = rbac_userModel::getInstance()->getFieldsById(!empty($id)?$id:$this->user['id']);
		if($this->_isAjax())
		{
			$this->save();
		}


		$this->view("/index");
    }
    //保存
    private function save() {
        $id = $_POST['m']['id'];
		if(empty($id)) $this->error(array('js'=>"alert('编号不能为空!');"),true);

		$_POST['m']['update_id']	= $id;
		$_POST['m']['passwd']		= isset($_POST['m']['passwd'])?md5($_POST['m']['passwd']):'';
		$_POST['m']['update_time']	= date("Y-m-d H:i:s",time());
        //保存数据
        $rbac = rbac_userModel::getInstance()->update($_POST['m'],'id=:id', array(':id'=> $id));
        	
        if($rbac){
			//TODO icp日志
			CommonUtils::icpLog('修改','重置个人密码',true);

			$location = "top.location.href='/'";
			if($id == $this->user['id']){
				//注销session cookie
				rbac_userModel::getInstance()->destroy_session();
			}
			
            $this->success(array('js'=>"alert('重置个人密码成功!');".$location),true);
			
        }else{
			//TODO icp日志
			CommonUtils::icpLog('修改','重置个人密码');
            $this->error(array('js'=>"alert('重置个人密码失败!');"),true);
		}
    }
}