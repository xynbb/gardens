<?php
class updateAction extends Action {

    public function run($id=0){
        $id = empty($id) ? $_POST['r']['id'] : $id;
        $this->view['info'] = areaModel::getInstance()->getRowById($id);
        if($this->_isAjax()) {
            $this->save();
        }
        $this->page();
    }

    private function page() {
        $this->view("/index");
    }

    private function save() {
        $update = array(
            'garden_id' => $_POST['garden_id'],
            'name' => $_POST['name'],
            'sort' => intval($_POST['sort']),
            'status' => $_POST['status'],
            'update_time' => date("Y-m-d H:i:s")
        );
        $res = areaModel::getInstance()->updateData($update, $_POST['r']['id']);
        if($res)
            $this->success(array('js'=>"alert('保存成功!');"._PARENT_RELOAD_._LAYER_CLOSE_),true);
        else
            $this->error(array('js'=>"alert('保存失败!');"),true);
    }
}