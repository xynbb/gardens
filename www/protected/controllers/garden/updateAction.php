<?php
class updateAction extends Action {

    public function run($id=0){
        $id = empty($id) ? $_POST['r']['id'] : $id;
        $this->view['info'] = gardenModel::getInstance()->getRowById($id);
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
            'name' => $_POST['r']['name'],
            'sort' => intval($_POST['r']['sort']),
            'status' => $_POST['r']['status']
        );
        $res = gardenModel::getInstance()->updateData($_POST['r']['id'], $update);
        if($res)
            $this->success(array('js'=>"alert('保存成功!');"._PARENT_RELOAD_._LAYER_CLOSE_),true);
        else
            $this->error(array('js'=>"alert('保存失败!');"),true);
    }
}