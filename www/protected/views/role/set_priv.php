<form action="/role/set_priv" method="post" id="_form">
<div class="rightinfo">
	<input name="role_id" value="<?php echo $role_id;?>" id="role_id" type="hidden" />
	<table class="tablelist">
		<tr>
			<th style="width: 30px;"><input type="checkbox" autocomplete="off"  id="qx" name="qx" value="" /></th>
			<th style="width: 300px;">名称</th>
			<th>权限项</th>
		</tr>
		<?php foreach ($list as $v):?>
		<tr>
			<td><input type="checkbox" autocomplete="off" path="<?php echo $v['path'];?>" name="mid[]" value="<?php echo $v['id'];?>" <?php if(isset($priv[$v['id']])):?>checked="checked"<?php endif;?> /></td>
			<td><?php echo str_repeat("　├ ", substr_count($v['path'], ',')-1).$v['name'];?></td>
			<td>
			<?php 
				if(!empty($v['actions'])&& $_actions = json_decode($v['actions'],true)):
					foreach ($_actions as $k=>$v1): 
						$controller = !empty($v1['controller'])?$v1['controller']:$v['controller'];
						if(empty($p_priv) || (!empty($p_priv)&&isset($p_priv[$v['id']][$controller]))&&in_array($v1['action'], $p_priv[$v['id']][$controller])):	
			?>
			<input type="checkbox" autocomplete="off" path="<?php echo $v['path'];?>" name="m[<?php echo $v['id'];?>][<?php echo $controller;?>][]" value="<?php echo $v1['action'];?>" <?php if(isset($priv[$v['id']]) && isset($priv[$v['id']][$controller]) && in_array($v1['action'], $priv[$v['id']][$controller])):?>checked="checked"<?php endif;?> /> <?php echo trim($v1['zh_name']);?>　
			<?php	
						endif;
					endforeach;
				endif;
			?>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
</div>
<input style="margin-left:8px;" onclick="alert('保存成功！');parent.layer.closeAll();" name="submit" type="button" class="btn" value="确认保存"/>
</form>