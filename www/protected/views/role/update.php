<form class="form-horizontal" id="_form" action="/<?php echo __CONTROLLER__;?>/<?php echo __ACTION__;?>">
  <input type="hidden"  value="<?php echo $info['id'];?>" id="r[id]" name="r[id]" />
<div class="formbody">
	    <div class="formtitle"><span>基本信息</span></div>
	    <ul class="forminfo">
		    <li>
			    <label>上级角色</label>
			    <div class="vocation">
			    <select class="select1" name="r[path]" id="r_path" style="width: 500px;">
				  <option value="0,">顶级角色</option>
				  <?php foreach ($select as $v):?>
				  <option value="<?php echo $v['path'];?>" <?php if($info['parent_id']==$v['id']):?>selected="selected"<?php endif;?>><?php echo str_repeat("　　┣ ", substr_count($v['path'], ',')-1).$v['name'];?></option>
				  <?php endforeach;?>
				</select>
		    	</div>
		    </li>
		    <li>
		    	<label>角色名称</label>
		    	 <input type="text" class="dfinput" id="r[name]" value="<?php echo $info['name'];?>" name="r[name]" placeholder="添加角色名称" required style="width: 500px;">
    		</li>
		    <li id="is_super" <?php if(!empty($info['parent_id'])):?>style="display: none;"<?php endif;?>>
			    <label>超级管理员</label>
			     <input type="radio" name="r[is_super]" id="r_is_super1" value="1" <?php if(!empty($info['is_super'])):?>checked="checked"<?php endif;?>> 是　
		  		<input type="radio" name="r[is_super]" id="r_is_super2" value="0" <?php if(empty($info['is_super'])):?>checked="checked"<?php endif;?>> 否
			</li>
		    <li>
		    	<label>角色描述</label>
		    	 <textarea class="textinput" rows="3" name="r[description]" id="r[description]" placeholder="添加角色描述" style="width: 480px;"><?php echo $info['description'];?></textarea>
		    </li>
		    <li><label>&nbsp;</label><input name="submit" type="submit" class="btn" value="确认保存"/></li>
	    </ul>
    </div>


</form>

