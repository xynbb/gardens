<form id="_form" action="/<?php echo __CONTROLLER__;?>/<?php echo __ACTION__;?>">
<input type="hidden" value="<?php echo $info['id'];?>" name="m[id]">
<div class="formbody">
	    <div class="formtitle"><span>基本信息</span></div>
	    <ul class="forminfo">
		    <li>
			    <label>账户</label>
			     <input type="text" class="dfinput" id="m[uname]" name="m[uname]" placeholder="账户" value="<?php echo $info['uname'];?>" readonly="readonly" required style="width: 500px;">
		    </li>
		    <li>
		    	<label>性别</label>

		    	<input type="radio" name="m[sex]" id="m[sex]" value="0" <?php if($info['sex'] == 0) echo 'checked="checked"';?> > 保密 
		    	<input type="radio" name="m[sex]" id="m[sex]" value="1" <?php if($info['sex'] == 1) echo 'checked="checked"';?>> 女
		    	<input type="radio" name="m[sex]" id="m[sex]" value="2" <?php if($info['sex'] == 2) echo 'checked="checked"';?>> 男
			</li>
		    <li>
		    	<label>姓名</label>
		    	 <input type="text" class="dfinput" id="m[real_name]" name="m[real_name]" placeholder="姓名" value="<?php echo $info['real_name'];?>"  required style="width: 500px;">
		    </li>
		    <li>
			    <label>手机</label>
			   <input type="text" class="dfinput" id="m[mobile]" name="m[mobile]" placeholder="手机" maxlength="11" minlength="11" required value="<?php echo $info['mobile'];?>"  style="width: 500px;">
			</li>
			<li>
		    	<label>邮箱</label>
		    	 <input type="text" class="dfinput" id="email" name="m[email]" placeholder="邮箱" value="<?php echo $info['email'];?>" required style="width: 500px;">
		    </li>
		    <li>
		    	<label>身份证号</label>
		    	 <input type="text" class="dfinput" id="idcard" name="m[idcard]" placeholder="身份证号" maxlength="18" minlength="18" value="<?php echo $info['idcard'];?>" required style="width: 500px;">
		    </li>
		    <li>
		    	<label>部门</label>
		    	<input type="text" class="dfinput" id="m[deptname]" name="m[deptname]" placeholder="部门" required value="<?php echo $info['deptname'];?>"  readonly="readonly" style="width: 500px;">
		    </li>
		    <li>
		    	<label>是否显示</label>
		    	<input type="radio" name="m[status]" id="m[status]" value="0" <?php if(empty($info['status'])):?> checked="checked"<?php endif;?>> 删除 
		    	<input type="radio" name="m[status]" id="m[status]" value="1" <?php if($info['status']==1):?> checked="checked"<?php endif;?>> 启用 
		    	<input type="radio" name="m[status]" id="m[status]" value="2" <?php if($info['status']==2):?> checked="checked"<?php endif;?>> 禁用 
		    </li>
		    <li><label>&nbsp;</label><input name="submit" type="submit" class="btn" value="确认保存"/></li>
	    </ul>
    </div>
</form>