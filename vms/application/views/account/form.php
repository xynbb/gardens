<div class="panel panel-default">
  <div class="panel-body">
    <form class="form-horizontal">
      <input type="hidden" name="account_id" value="<?php echo is_object($account) ? $account->getAccountId() : ''; ?>" />
      <div class="form-group">
        <label class="col-md-2 control-label">姓名</label>
        <div class="col-md-6">
          <input class="form-control" type="text" name="given_name" value="<?php echo is_object($account) ? $account->getGivenName() : ''; ?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">用户名*<br/> (不能含字符'@')</label>
        <div class="col-md-6">
          <input class="form-control" type="text" name="name" value="<?php echo is_object($account) ? $account->getName() : ''; ?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">密码<?php echo is_object($account) && $account->getAccountId() ? '' : '*'; ?></label>
        <div class="col-md-6">
          <input class="form-control" type="password" name="password" value="" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">电子邮件*</label>
        <div class="col-md-6">
          <input class="form-control" type="text" name="email" value="<?php echo is_object($account) ? $account->getEmail() : ''; ?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">手机号码</label>
        <div class="col-md-6">
          <input class="form-control" type="text" name="mobile" value="<?php echo is_object($account) ? $account->getMobile() : ''; ?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">电话号码</label>
        <div class="col-md-6">
          <input class="form-control" type="text" name="phone" value="<?php echo is_object($account) ? $account->getPhone() : ''; ?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">部门（*按ctrl多选）</label>
        <div class="col-md-6">
          <select class="form-control" id="department_ids" name="department_ids[]" multiple="multiple" size="12"></select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">角色（*按ctrl多选）</label>
        <div class="col-md-6">
          <select class="form-control" id="role_ids" name="role_ids[]" multiple="multiple" size="12"></select>
        </div>
      </div>
      <div class="form-actions">
        <div class="col-md-offset-2 col-md-10">
          <input type="submit" value="保存 " class="btn btn-success" />
        </div>
      </div>
  </form>
  </div>
</div>
<script type="text/javascript">
var departments = [];
var departmentDefaults = [];
<?php

foreach($departments as $department) {

  echo "departments.push({'departmentId':'{$department["department_id"]}','name':'{$department["name"]}','parentId':'{$department["parent_id"]}','depth':'{$department["depth"]}','path':'{$department["path"]}'});\r\n";
}
if(is_object($accountDepartments)) {
  foreach($accountDepartments as $accountDepartment) {
    echo "departmentDefaults.push('{$accountDepartment->getDepartmentId()}');\r\n";
  }
}
?>

var roles = [];
var roleDefaults = [];
<?php
foreach($roles as $role) {
  echo "roles.push({'roleId':'{$role->getRoleId()}','name':'{$role->getName()}','departmentId':'{$role->getDepartmentId()}'});\r\n";
}
if(is_object($accountRoles)) {
  foreach($accountRoles as $accountRole) {
    echo "roleDefaults.push('{$accountRole->getRoleId()}');\r\n";
  }
}
?>

Account.fillDepartments('department_ids', departments);
Account.departmentDefault('department_ids', departmentDefaults);
Account.fillRoles('role_ids', departments, roles);
Account.roleDefault('role_ids', roleDefaults);

var url = "<?php echo is_object($account) && $account->getAccountId() ? URL::site('account/modify') : URL::site('account/save'); ?>";
$(function() {
	$('form').submit(function() {
		$.post(url, $(this).serialize(), function(data) {
			var text = data.message;
			if(data.code) {
				Common.success(text||'操作成功',function(){
					if(parent.$.find('.fancybox-overlay').length) {
						parent.location="/account/list";
					}else{
						location="/account/list";
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
