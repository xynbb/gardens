<form class="form-horizontal" id="_form" action="/<?php echo __CONTROLLER__;?>/<?php echo __ACTION__;?>">
  <input type="hidden"  value="<?php echo $info['id'];?>" id="r[id]" name="r[id]" />
<div class="formbody">
	    <div class="formtitle"><span>基本信息</span></div>
	    <ul class="forminfo">
		    <li>
		    	<label>名称</label>
		    	 <input type="text" class="dfinput" id="r[name]" value="<?php echo $info['name'];?>" name="r[name]" placeholder="添加园名称" required>
    		</li>
			<li>
				<label>排序</label>
				<input type="text" class="dfinput" id="r[sort]" name="r[sort]" required style="width: 100px;" value="<?php echo $info['sort'];?>">
			</li>
			<li>
				<label>状态</label>
				<input type="radio" name="r[status]" value="0" <?php if(!empty($info['status'])):?>checked="checked"<?php endif;?>> 禁用　
				<input type="radio" name="r[status]" value="1" <?php if(!empty($info['status'])):?>checked="checked"<?php endif;?>> 启用
			</li>
		    <li><label>&nbsp;</label><input name="submit" type="submit" class="btn" value="确认保存"/></li>
	    </ul>
    </div>


</form>

