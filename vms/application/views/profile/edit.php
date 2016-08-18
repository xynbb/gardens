<div class="panel panel-default">
  <div class="panel-body">
    <form class="form-horizontal">
      <input type="hidden" name="account_id" value="<?php echo $account->getAccountId(); ?>" />
      <div class="form-group">
        <label class="col-md-2 control-label">用户名</label>
        <div class="col-md-6">
          <input class="form-control" type="text" name="name" value="<?php echo $account->getName(); ?>" disabled/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">姓名</label>
        <div class="col-md-6">
          <input class="form-control" type="text" name="given_name" value="<?php echo $account->getGivenName(); ?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">电子邮件</label>
        <div class="col-md-6">
          <input class="form-control" type="text" name="email" value="<?php echo $account->getEmail(); ?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">手机号码</label>
        <div class="col-md-6">
          <input class="form-control" type="text" name="mobile" value="<?php echo $account->getMobile(); ?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">电话号码</label>
        <div class="col-md-6">
          <input class="form-control" type="text" name="phone" value="<?php echo $account->getPhone(); ?>" />
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
<script>
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