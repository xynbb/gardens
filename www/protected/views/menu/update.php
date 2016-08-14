<form class="form-horizontal" id="_form" action="/<?php echo __CONTROLLER__;?>/<?php echo __ACTION__;?>">
<input type="hidden"  value="<?php echo $menu['id'];?>" id="m[id]" name="m[id]" />
<div class="formbody">
	    <div class="formtitle"><span>基本信息</span></div>
	    <ul class="forminfo">
		    <li>
			    <label>上级菜单</label>
			    <div class="vocation">
				    <select class="select1" name="m[path]" id="m[path]" style="width: 500px;">
					  <option value="0,">顶级菜单</option>
					  <?php foreach ($select as $v):?>
					  <option value="<?php echo $v['path'];?>" <?php if($menu['parent_id']==$v['id']):?>selected="selected"<?php endif;?>><?php echo str_repeat("　　┣ ", substr_count($v['path'], ',')-1).$v['name'];?></option>
					  <?php endforeach;?>
					</select>
		    	</div>
		    </li>
		    <li>
		    	<label>菜单名称</label>
      			<input type="text" class="dfinput" id="m[name]" name="m[name]" value="<?php echo $menu['name'];?>" placeholder="添加菜单名称" required style="width: 500px;">
		    </li>
		    <li>
			    <label>菜单描述</label>
			    <cite>
				<textarea class="textinput" rows="3" name="m[description]" id="m[description]" value="<?php echo $menu['description'];?>" placeholder="添加菜单描述" style="width: 482px;"></textarea>
    		</cite>
			</li>
		    <li>
		    	<label>菜单链接</label>
      			<input type="text" class="dfinput" id="m[url]" name="m[url]" value="<?php echo $menu['url'];?>" placeholder="例:http://www.baidu.com"  style="width: 500px;">
		    </li>
		    <li>
		    	<label>查询参数</label>
     		 <input type="text" class="dfinput" id="m[query_string]"  value="<?php echo $menu['query_string'];?>" name="m[query_string]" placeholder="例:id=1&name=zhangsan"  style="width: 500px;">
		    </li>
		    <li>
		    	<label>主控制器</label>
      <input type="text" class="dfinput" id="m[controller]"  value="<?php echo $menu['controller'];?>" name="m[controller]" placeholder="添加主控制器，子级菜单控制器可不添加"  style="width: 500px;">
 		    </li>
		    <li>
		    	<label>子级菜单</label>
		    	<table class="table" style="width:850px;padding:0px;margin: 0px;">
			     <tr>
				     <th>中文名</th>
				     <th>控制器</th>
				     <th>操作</th>
				     <th>查询字符串</th>
				     <th>链接</th>
				     <th style="width: 44px;">显示</th>
				     <th style="width: 44px;">管理</th>
				     <th style="width: 44px;">排序</th>
			     </tr>
			     <?php 
		     if(!empty($menu['actions'])):
		     	foreach (json_decode($menu['actions'],true) as $v):
	     ?>
	     <tr>
		     <td><input type="text" class="dfinput" name="m[actions][zh_name][]" value="<?php echo $v['zh_name'];?>" placeholder="中文名" style="width:130px;"></td>
		     <td><input type="text" class="dfinput" name="m[actions][controller][]"  value="<?php echo $v['controller'];?>" placeholder="控制器"  style="width:130px;"></td>
		     <td><input type="text" class="dfinput" name="m[actions][action][]" value="<?php echo $v['action'];?>" placeholder="操作"  style="width:130px;"></td>
		     <td><input type="text" class="dfinput" name="m[actions][query_string][]" value="<?php echo $v['query_string'];?>" placeholder="例:id=1&age=20"  style="width:auto;"></td>
		     <td><input type="text" class="dfinput" name="m[actions][url][]" value="<?php echo $v['url'];?>" placeholder="例:http://www.qq.com"  style="width:auto;"></td>
		     <td>
		     <input type="checkbox"  name="checkbox" value="" <?php if(!empty($v['is_show'])):?>checked="checked"<?php endif;?> />
		     <input type="hidden" name="m[actions][is_show][]" value="<?php echo $v['is_show'];?>" />
		     </td>
		     <td>
		     <a href="javascript:;" class="jia" style="font-size: 20px;">+</a>
		     <a href="javascript:;" class="jian" style="font-size: 20px;">-</a>
		     </td>
		      <td>
		     <a href="javascript:;" class="shang" style="font-size: 20px;">↑</a>
		     <a href="javascript:;" class="xia" style="font-size: 20px;">↓</a>
		     </td>
	     </tr>
	     <?php 
	     		endforeach;
	     	endif;
	     ?>
			    <tr>
				     <td><input type="text" class="dfinput" name="m[actions][zh_name][]" value="" placeholder="中文名" style="width:130px;"></td>
				     <td><input type="text" class="dfinput" name="m[actions][controller][]" value="" placeholder="控制器"  style="width:130px;"></td>
				     <td><input type="text" class="dfinput" name="m[actions][action][]" value="" placeholder="操作"  style="width:130px;"></td>
				     <td><input type="text" class="dfinput" name="m[actions][query_string][]" value="" placeholder="例:id=1&age=20"  style="width:auto;"></td>
				     <td><input type="text" class="dfinput" name="m[actions][url][]" value="" placeholder="例:http://www.qq.com"  style="width:auto;"></td>
				     <td>
				     <input type="checkbox"  name="checkbox" value="" checked="checked" />
				     <input type="hidden" name="m[actions][is_show][]" value="1" />
				     </td>
				     <td>
				     <a href="javascript:;" class="jia" style="font-size: 20px;">+</a>
				     <a href="javascript:;" class="jian" style="font-size: 20px;">-</a>
				     </td>
				      <td>
				     <a href="javascript:;" class="shang" style="font-size: 20px;">↑</a>
				     <a href="javascript:;" class="xia" style="font-size: 20px;">↓</a>
				     </td>
			     </tr>
			    </table>
		    
		    </li>
		    <li>
		    	<label>排序</label>
      			<input type="text" class="dfinput"  value="<?php echo $menu['sort'];?>" id="m[sort]" name="m[sort]" placeholder="排序"  style="width: 150px;">
		    </li>
		    <li>
		    	<label>菜单样式</label>
      			<input type="text" class="dfinput" id="m[class]"  value="<?php echo $menu['class'];?>" name="m[class]" placeholder="添加 class 样式"  style="width: 150px;">
		    </li>
		    <li>
		    	<label>菜单图片</label>
		    	<input type="text" class="dfinput" value="<?php echo $menu['img'];?>" id="m[img]" name="m[img]" placeholder="添加 菜单图片"  style="width: 150px;">
		    </li>
		    <li>
		    	<label>是否显示</label>
		  		<input type="radio" name="m[is_show]" id="m[is_show]" value="1" <?php if(!empty($menu['is_show'])):?>checked="checked"<?php endif;?>> 是
		    	 <input type="radio" name="m[is_show]" id="m[is_show]" value="0" <?php if(empty($menu['is_show'])):?>checked="checked"<?php endif;?>> 否
		    	 
		    </li>
		    <li><label>&nbsp;</label><input name="submit" type="submit" class="btn" value="确认保存"/></li>
	    </ul>
    </div>
</form>
<script type="text/javascript">
$(document).ready(function(e) {
	$(".select1").uedSelect({
	width : 500
	});
});
</script>