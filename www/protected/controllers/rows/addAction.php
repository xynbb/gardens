<?php
class addAction extends Action {

    public function run() {
        if($this->_isAjax())  {
            $this->save();
        }
        $this->page();
    }

    private function page() {
        $this->view("/index");
    }

    private function save()  {
        $insert = array(
            'garden_id' => $_POST['garden_id'],
            'name' => $_POST['name'],
            'sort' => intval($_POST['sort']),
            'status' => $_POST['status'],
            'create_time' => date("Y-m-d H:i:s"),
            'update_time' => date("Y-m-d H:i:s")
        );

        $res = areaModel::getInstance()->insert($insert);
        //保存数据
        if($res) {
            $id = rbac_roleModel::getInstance()->insert_id();
            //修改path
            rbac_roleModel::getInstance()->updateRolePath($id);
            $this->success(array('js'=>"alert('保存成功!');"._PARENT_RELOAD_._LAYER_CLOSE_),true);
        } else {
            $this->error(array('js'=>"alert('保存失败!');"),true);
        }
    }
}