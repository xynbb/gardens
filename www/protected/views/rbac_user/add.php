<?php echo $_this->getNav();?>
<form id="_form" action="/rbac_user/add">
<div class="formbody">
	    <div class="formtitle"><span>基本信息</span></div>
	    <ul class="forminfo">
		    <li>
			    <label>账户</label>
			     <input type="text" class="dfinput" id="uname" name="m[uname]" placeholder="账户" required style="width: 500px;"><i>初始密码：88888888</i>
		    </li>
		    <li>
		    	<label>性别</label>

		    	<input type="radio" name="m[sex]" id="m[sex]" value="0" checked="checked"> 保密 
		    	<input type="radio" name="m[sex]" id="m[sex]" value="1" > 女
		    	<input type="radio" name="m[sex]" id="m[sex]" value="2"> 男
			</li>
		    <li>
		    	<label>姓名</label>
		    	 <input type="text" class="dfinput" id="real_name" name="m[real_name]" placeholder="姓名" required style="width: 500px;">
		    </li>
		    <li>
			    <label>手机</label>
			   <input type="text" class="dfinput" id="mobile" name="m[mobile]" placeholder="手机"  maxlength="11" minlength="11" required style="width: 500px;">
			</li>
			<li>
		    	<label>邮箱</label>
		    	 <input type="text" class="dfinput" id="email" name="m[email]" placeholder="邮箱" required style="width: 500px;">
		    </li>
		    <li>
		    	<label>身份证号</label>
		    	 <input type="text" class="dfinput" id="idcard" name="m[idcard]" placeholder="身份证号" maxlength="18" minlength="18" required style="width: 500px;">
		    </li>
		    <li>
		    	<label>部门</label>
		    	<input type="text" class="dfinput" id="deptname" name="m[deptname]" placeholder="部门" required style="width: 500px;">
		    </li>
		    <li>
		    	<label>是否显示</label>
		    	<input type="radio" name="m[status]" id="m[status]" value="0"> 删除 
		    	<input type="radio" name="m[status]" id="m[status]" value="1" checked="checked"> 启用 
		    	<input type="radio" name="m[status]" id="m[status]" value="2"> 禁用 
		    </li>
		    <li><label>&nbsp;</label><input name="submit" type="submit" class="btn" value="确认保存"/></li>
	    </ul>
    </div>
</form>