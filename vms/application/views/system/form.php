<div class="panel panel-default">
  <div class="panel-body">
    <form class="form-horizontal" role="form" method="post" action="">
      <input type="hidden" name="system_id" value="<?php echo is_object($system) ? $system->getSystemId() : ''; ?>" />
      <div class="form-group">
        <label class="col-md-2 control-label">系统名称</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="name" value="<?php echo is_object($system) ? $system->getName() : ''; ?>" placeholder="系统名称"/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">域名</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="domain" value="http://<?php echo is_object($system) ? $system->getDomain() : ''; ?>" placeholder="域名"/>
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
var url = "<?php echo is_object($system) && $system->getSystemId() ? URL::site('system/modify') : URL::site('system/save'); ?>";
$(function() {
	$('form').submit(function() {
		$.post(url, $(this).serialize(), function(data) {
			var text = data.message;
			if(data.code) {
				Common.success(text||'操作成功',function(){
					if(parent.$.find('.fancybox-overlay').length) {
						parent.location="/system/list";
					} else {
						location="/system/list";
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