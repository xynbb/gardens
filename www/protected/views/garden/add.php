<?php echo $_this->getNav();?>
<form class="form-horizontal" id="_form" action="/<?php echo __CONTROLLER__;?>/<?php echo __ACTION__;?>" method="post">
<div class="formbody">
	    <div class="formtitle"><span>基本信息</span></div>
	    <ul class="forminfo">
		    <li>
		    	<label>名称</label>
		    	<input type="text" class="dfinput" id="r[name]" name="r[name]" placeholder="添加园名称" required>
		    </li>
			<li>
				<label>排序</label>
				<input type="text" class="dfinput" id="r[sort]" name="r[sort]" required style="width: 100px;">
			</li>
		    <li>
			    <label>状态</label>
			    <input type="radio" name="r[status]" value="0"> 禁用　
		  		<input type="radio" name="r[status]" value="1" checked="checked"> 启用
			</li>
		    <li><label>&nbsp;</label>
				<input name="submit" type="submit" class="btn" value="确认保存"/>
			</li>
	    </ul>
    </div>
</form>
