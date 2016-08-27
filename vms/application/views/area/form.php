<div class="panel panel-default">
  <div class="panel-body">
    <form class="form-horizontal" role="form" method="post" action="">
      <input type="hidden" name="id" value="<?php echo isset($row) && is_object($row) ? $row->getId() : ''; ?>" />
      <input type="hidden" name="type" value="<?php echo isset($type) ? $type : '1'; ?>" />
      <input type="hidden" name="garden_id" value="<?php echo isset($gardenId) ? $gardenId : '0'; ?>" />
      <div class="form-group">
        <label class="col-md-2 control-label">名称<span style="color: red;">*</span></label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="name" value="<?php echo isset($row) && is_object($row) ? $row->getName() : ''; ?>" placeholder="区名称"/>
        </div>
      </div>
        <div class="form-group">
            <label class="col-md-2 control-label">排序</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="sort" value="<?php echo isset($row) && is_object($row) ? $row->getSort() : ''; ?>"/>
            </div>
        </div>
        <!--<div class="form-group">
            <label class="col-md-2 control-label">类型</label>
            <div class="col-md-6">
                <label><input type="radio" class="input" name="type" value="1" checked/> 墓位</label>
                <label><input type="radio" class="input" name="type" value="2" <?php /*echo isset($row) && is_object($row) && $row->getStatus() == 2 ? 'checked' : ''; */?>/> 寄存位</label>
            </div>
        </div>-->
        <div class="form-group">
            <label class="col-md-2 control-label">状态</label>
            <div class="col-md-6">
                <label><input type="radio" class="input" name="status" value="1" checked/> 启用</label>
                <label><input type="radio" class="input" name="status" value="0" <?php echo isset($row) && is_object($row) && $row->getStatus() == 0 ? 'checked' : ''; ?>/> 禁用</label>

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
var url = "<?php echo URL::site('area/save'); ?>";
$(function() {
	$('form').submit(function() {
		$.post(url, $(this).serialize(), function(data) {
			var text = data.message;
			if(data.code) {
				Common.success(text||'操作成功',function(){
					if(parent.$.find('.fancybox-overlay').length) {
						parent.location="/garden/list";
					} else {
						location="/garden/list";
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