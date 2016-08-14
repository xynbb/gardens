<div class="rightinfo" id="_result">
<table class="tablelist">
		<tr>
			<th style="width: 50px;">ID</th>
			<th>名称</th>
			<th style="width: 87px;">超级管理员</th>
			<th>描述</th>
			<th style="width: 151px;">创建时间</th>
			<th style="width: 151px;">修改时间</th>
			<th style="width: 230px;">管理</th>
		</tr>
		<tr>
		<td>0</td>
		<td colspan="5">顶级角色</td>
		<td><?php if($_this->checkCA('role','add')):?><a href="javascript:;" onclick="iframe('/role/add','添加')">添加角色</a><?php endif;?></td>
		</tr>
		<?php foreach ($list as $v):?>
		<tr>
			<td><?php echo $v['id'];?></td>
			<td><?php echo str_repeat("　├ ", substr_count($v['path'], ',')-1).$v['name'];?></td>
			<td><?php echo !empty($v['is_super'])?"是":"否";?></td>
			<td><?php echo $v['description'];?></td>
			<td><?php echo $v['create_time'];?></td>
			<td><?php echo $v['update_time'];?></td>
			<td style="color: #999;">
			
			<?php if($_this->checkCA('role','set_priv')):?>
			<?php if(empty($v['is_super'])):?>
			<a href="javascript:;" onclick="iframe('/role/set_priv/?role_id=<?php echo $v['id'];?>&parent_id=<?php echo $v['parent_id'];?>','权限设置')">权限设置</a> |
			<?php else:?>
			--------- |
			<?php endif;?>
			
			<?php if($_this->checkCA('rbac_user','index')):?>
			<a href="javascript:;" onclick="iframe('/rbac_user/index?role_id=<?php echo $v['id'];?>&is_show=1','查看成员')">查看成员</a> | 
			<?php endif;?>
			
			<?php endif;?>

			<?php if($_this->checkCA('role','update')):?>
			<a href="javascript:;" onclick="iframe('/role/update/?id=<?php echo $v['id'];?>','修改')">修改</a> | 
			<?php endif;?>
			<?php if($_this->checkCA('role','add')):?>
			<a href="javascript:;" onclick="iframe('/role/add/?id=<?php echo $v['id'];?>','添加')">添加</a> |
			<?php endif;?>
			<?php if($_this->checkCA('role','del')):?>
			<a href="javascript:;" onclick="changeData('/role/del',{id:<?php echo $v['id'];?>},'确定删除此条数据么?');location.reload();">删除</a>
			<?php endif;?>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
	</div>