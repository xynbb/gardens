<div class="panel panel-default">
  <div class="panel-body">
    <form class="form-horizontal" role="form">
      <input type="hidden" name="module_id" value="<?php echo is_object($module) ? $module->getModuleId() : ''; ?>" />
      <div class="form-group">
        <label class="col-md-2 control-label">名称*</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="name" value="<?php echo is_object($module) ? $module->getName() : ''; ?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">模块</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="module" value="<?php echo is_object($module) ? $module->getModule() : ''; ?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">系统*</label>
        <div class="col-md-6">
          <select class="form-control" name="system_id">
            <option value="">请选择</option>
            <?php
              foreach ($systems as $system) {
                if(is_object($module) && $system->getSystemId() == $module->getSystemId()) {
                  echo "<option value=\"{$system->getSystemId()}\" selected=\"selected\">{$system->getName()}</option>\r\n";
                } else {
                  echo "<option value=\"{$system->getSystemId()}\">{$system->getName()}</option>\r\n";
                }
              }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">入口文件*</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="portal" value="<?php echo is_object($module) ? $module->getPortal() : ''; ?>" />
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
var url = "<?php echo is_object($module) && $module->getModuleId() ? URL::site('module/modify') : URL::site('module/save'); ?>";
$(function() {
	$('form').submit(function() {
		$.post(url, $(this).serialize(), function(data) {
			var text = data.message;
			if(data.code) {
				Common.success(text||'操作成功',function(){
					if(parent.$.find('.fancybox-overlay').length) {
						parent.location="/module/list";
					}else{
						location="/module/list";
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
