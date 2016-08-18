<div class="panel panel-default">
  <div class="panel-body">
    <form class="form-horizontal" role="form" method="post" action="">
      <input type="hidden" name="role_id" value="<?php echo is_object($role) ? $role->getRoleId() : ''; ?>">
      <div class="form-group">
        <label class="col-md-2 control-label">角色名称*</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="name" value="<?php echo is_object($role)? $role->getName():''; ?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">部门*</label>
        <div class="col-md-6">
          <select class="form-control" name="department_id">
            <option value="">请选择</option>
            <?php
              foreach($departments as $currentDepartment) {
                $space = '';
                for ($i=0; $i < $currentDepartment["depth"] * 4; $i++) { 
                  $space .= '&nbsp;';
                }
                
                if(is_object($role) && ($currentDepartment["department_id"] == $role->getDepartmentId())) {
                  echo "<option value=\"{$currentDepartment["department_id"]}\" selected=\"selected\">{$space}{$currentDepartment["name"]}</option>\r\n";
                } else {
                  echo "<option value=\"{$currentDepartment["department_id"]}\">{$space}{$currentDepartment["name"]}</option>\r\n";
                }
              }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
          <input type="button" value=" 保存 " class="btn btn-success" onclick="$('form').submit()"/>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
var url = "<?php echo is_object($role) && $role->getRoleId() ? URL::site('role/modify') : URL::site('role/save'); ?>";
$(function() {
	$('form').submit(function() {
		$.post(url, $(this).serialize(), function(data) {
			var text = data.message;
			if(data.code) {
				Common.success(text||'操作成功',function(){
					if(parent.$.find('.fancybox-overlay').length) {
						parent.location="/role/list";
					}else{
						location="/role/list";
					}
				});
			} else {
				Common.error(text);
			}
		}, "json");
		return false;
	});
});
</script>