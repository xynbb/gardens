<div class="panel panel-default">
  <div class="panel-body">
    <form class="form-horizontal" role="form">
      <input type="hidden" name="department_id" value="<?php echo is_object($department) ? $department->getDepartmentId() : ''; ?>" />
      <div class="form-group">
        <label class="col-md-2 control-label">部门名称*</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="name" value="<?php echo is_object($department) ? $department->getName() : ''; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">上级部门*</label>
        <div class="col-md-6">
          <select class="form-control" name="parent_id" id='parent_id'>
            <option value="">请选择</option>
            <?php foreach ($departments as $currentDepartment) {
                $space = '';
                for ($i=0; $i < $currentDepartment["depth"] * 4; $i++) { 
                  $space .= '&nbsp;';
                }
                if(is_object($department) && ($currentDepartment["department_id"] == $department->getParentId())) {
                  echo "<option value=\"{$currentDepartment["department_id"]}\" selected=\"selected\">{$space}{$currentDepartment["name"]}</option>\r\n";
                } else {
                  echo "<option value=\"{$currentDepartment["department_id"]}\">{$space}{$currentDepartment["name"]}</option>\r\n";
                }
            }?>
          </select>
        </div>
      </div>
      <div class="form-group" style='display:none'>
        <label class="col-md-2 control-label">排序</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="sequence" value="<?php echo is_object($department) ? $department->getSequence() : ''; ?>">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
          <input type="submit" value=" 保存 " class="btn btn-success" />
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
var url = "<?php echo is_object($department) && $department->getDepartmentId() ? URL::site('department/modify') : URL::site('department/save'); ?>";
$(function() {
	$('form').submit(function() {
    var parent_id = $('#parent_id').val();
    if (parent_id == '') {
      Common.error('部门必须选择');
      return false;
    }
    
		$.post(url, $(this).serialize(), function(data) {
			var text = data.message;
			if(data.code) {
				Common.success(text||'操作成功',function(){
					if(parent.$.find('.fancybox-overlay').length) {
						parent.location="/department/list";
					}else{
						location="/department/list";
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
