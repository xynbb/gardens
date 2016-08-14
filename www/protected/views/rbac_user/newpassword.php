
<?php echo $_this->getNav();?>
<?php if($_isSuper || $pwd_status == 1): ?>
<form id="_form"  action="/rbac_user/newpassword"  method="POST">
<input type="hidden" name="m[id]" value="<?php echo isset($info['id'])?$info['id']:'' ?>">
<div class="formbody">
	    <div class="formtitle"><span>个人密码修改</span></div>
	    <ul class="forminfo">
	    	<li>
		    	<label>名称</label>
		    	<span style=" font-size:20px;"><?php echo isset($info['uname'])?$info['uname']:'';?></span>
		    </li>
	    	<li>
		    	<label>新密码</label>
		    	<input type="password" class="dfinput password" id="passwd" name="m[passwd]" minlength="6" maxlength="26" placeholder="请填写新密码" required  style="width: 500px;">
				<font>(密码需6到26位任意字符)</font>
			</li>
		    <li>
		    	<label>确认密码</label>
		    	<input type="password" class="dfinput" equalTo="#passwd" name="repwd" placeholder="请填写确认密码" required  style="width: 500px;">	   
		    </li>
		    <li><label>&nbsp;</label><input name="submit" type="submit" class="btn" value="确认保存"/></li>
	    </ul>
    </div>
</form>
<?php else: ?>
	<div class="formbody">
	    <div class="formtitle"><span>个人密码重置</span></div>
		<span style="font-size:20px; color:red">超级管理员密码不允许修改</span>
    </div>
<?php endif;?>

