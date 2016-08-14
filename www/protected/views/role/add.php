<?php echo $_this->getNav();?>
<form class="form-horizontal" id="_form" action="/<?php echo __CONTROLLER__;?>/<?php echo __ACTION__;?>">
<div class="formbody">
	    <div class="formtitle"><span>基本信息</span></div>
	    <ul class="forminfo">
		    <li>
			    <label>上级角色</label>
			    <div class="vocation">
				   <select class="form-control" name="r[path]" id="r[path]" style="width: 500px;">
					  <option value="0,">顶级角色</option>
					  <?php foreach ($select as $v):?>
					  <option value="<?php echo $v['path'];?>" <?php if($id==$v['id']):?>selected="selected"<?php endif;?>><?php echo str_repeat("　　┣ ", substr_count($v['path'], ',')-1).$v['name'];?></option>
					  <?php endforeach;?>
					</select>
		    	</div>
		    </li>
		    <li>
		    	<label>角色名称</label>
		    	<input type="text" class="dfinput" id="r[name]" name="r[name]" placeholder="添加角色名称" required style="width: 500px;">
		    </li>
		    <li>
			    <label>超级管理员</label>
			    <input type="radio" name="r[is_super]" id="r[is_super]" value="1"> 是　
		  		<input type="radio" name="r[is_super]" id="r[is_super]" value="0" checked="checked"> 否
			</li>
		    <li>
		    	<label>角色描述</label>
		    	 <textarea class="textinput" rows="3" name="r[description]" id="r[description]" placeholder="添加角色描述" style="width: 500px;"></textarea>
		    </li>
		    <li><label>&nbsp;</label><input name="submit" type="submit" class="btn" value="确认保存"/></li>
	    </ul>
    </div>
</form>
