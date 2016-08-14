<form action="/role/set_role" method="post" id="_form">
<div class="rightinfo">
	<input type="hidden" value="<?php echo $user_id;?>" name="user_id" >
	<table class="tablelist">
		<tr>
			<th style="width: 30px;"></th>
			<th>名称</th>
		</tr>
		<?php foreach ($list as $v):?>
		<tr>
			<td><input type="checkbox" is_super='<?php echo $v['is_super'];?>' name="role_id[]" value="<?php echo $v['id'];?>"  autocomplete="off" <?php if(isset($roles[$v['id']])):?>checked="checked"<?php endif;?> /></td>
			<td><?php echo str_repeat("　├ ", substr_count($v['path'], ',')-1).$v['name'];?></td>
		</tr>
		<?php endforeach;?>
	</table>
</div>
<input style="margin-left:8px;" onclick="alert('保存成功！');parent.main_iframe.rightFrame.search();parent.layer.closeAll();" name="submit" type="button" class="btn" value="确认保存"/>
</form>