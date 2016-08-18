<div class="panel panel-default">
  <div class="panel-body">
    <form class="form-horizontal">
      <input type="hidden" name="account_id" value="<?php echo $account->getAccountId(); ?>" />
      <?php if($account->getPassword() == '') { ?>
      <div class="form-group">
        <div class="alert alert-danger" role="alert"><strong>当前密码为空，请尽快初始化密码</strong></div>
      </div>
      <?php } else { ?>
      <div class="form-group">
        <label class="col-md-2 control-label">当前密码</label>
        <div class="col-md-6">
          <input class="form-control" type="password" name="oldpassword" value="" />
        </div>
      </div>
      <?php } ?>
      <div class="form-group">
        <label class="col-md-2 control-label">新密码</label>
        <div class="col-md-6">
          <input class="form-control" type="password" name="password" value="" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">确认密码</label>
        <div class="col-md-6">
          <input class="form-control" type="password" name="repassword" value="" />
        </div>
      </div>
      <div class="form-actions">
        <div class="col-md-offset-2 col-md-10">
          <input type="submit" value=" 保存 " class="btn btn-success" />
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
var url = "<?php echo URL::site('profile/savepassword'); ?>";
var url = "<?php echo URL::site('profile/modify');?>";
$(function() {
	$('form').submit(function() {
		$.post(url, $(this).serialize(), function(data) {
			var text = data.message;
			if(data.code) {
				Common.success(text||'操作成功',function(){
					if(parent.$.find('.fancybox-overlay').length) {
						parent.location="/profile/index";
					}else{
						location="/profile/index";
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
