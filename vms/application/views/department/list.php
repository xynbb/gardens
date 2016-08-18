<div class="panel panel-default">
  <div class="panel-body">
    <div class="row-flow">
      <div class="w100p" id="DepartmentTree"></div>
    </div>
  </div>
</div>

<script type="text/javascript">
var data = [];
<?php
if(is_object($departments)) {
    foreach($departments as $department) {
        if($department->getParentId() == 0) {
            echo "data.push({'id' : '{$department->getDepartmentId()}', 'name' : '{$department->getName()}', 'value' : '{$department->getDepartmentId()}', 'parent' : '{$department->getParentId()}', 'operate' : ''});\r\n";
        } else {
            echo "data.push({'id' : '{$department->getDepartmentId()}', 'name' : '{$department->getName()}', 'value' : '{$department->getDepartmentId()}', 'parent' : '{$department->getParentId()}',       
            'operate' : '[ <a name=\"edit\" data-link=\"".URL::site('department/edit?department_id='.$department->getDepartmentId())."\">修改</a> | ".
            "<a onclick=\"Common.confirm(\\'确定删除这个部门吗\\', \\'".URL::site('department/delete?department_id='. $department->getDepartmentId())."\\');\">删除</a> | ".
            "<a name=\"members\" data-link=\"".URL::site('department/members?department_id='.$department->getDepartmentId())."\">成员</a>]'});\r\n";
        }
    }
}
?>

var departmentTree = new Tree('DepartmentTree', data);
departmentTree.display(1);
Department.bindFancybox();
</script>
