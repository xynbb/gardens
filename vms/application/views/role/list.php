<div class="panel panel-default">
  <div class="panel-body">
    <div class="row-flow">
      <div class="w100p" id="RoleTree"></div>
    </div>
  </div>
</div>
<script type="text/javascript">
var data = [];
<?php
if(is_object($departments)) {
  foreach($departments as $department) {
    //--父节点
    if( $department->getParentId() == 0 ) {
      echo "data.push({'id' : '{$department->getDepartmentId()}', 'name' : '{$department->getName()}', 'value' : '{$department->getDepartmentId()}', 'parent' : '{$department->getParentId()}', 'operate' : ''});\r\n";
    } else {
      //--子节点
      echo "data.push({'id' : '{$department->getDepartmentId()}', 'name' : '{$department->getName()}', 'value' : '{$department->getDepartmentId()}', 'parent' : '{$department->getParentId()}', 'operate' : ''});\r\n";
    }
    $departmentRoles = $department->getRoles($roles);
    if($departmentRoles){
      foreach($departmentRoles as $role){
        echo "data.push({'id':'', 'name':'{$role->getName()}', 'value':'', 'parent':'{$department->getDepartmentId()}', 'operate':' [ <a name=\"edit\" data-link=\"".URL::site('role/edit?role_id='.$role->getRoleId())."\">修改</a>".
          " | <a onclick=\"Common.confirm(\\'确定删除这个角色吗？\\',\\'".URL::site('role/delete?role_id='.$role->getRoleId())."\\');\">删除</a>".
          " | <a name=\"privilege\" data-link=\"".URL::site('role/privilege?role_id='.$role->getRoleId())."\">权限</a>".
          " | <a name=\"members\" data-link=\"".URL::site('role/members?role_id='.$role->getRoleId())."\">成员</a> ]'});\r\n";
      }
    }
  }
}
?>
var departmentTree = new Tree('RoleTree', data);
departmentTree.display(1);

Role.bindFancybox();
</script>

