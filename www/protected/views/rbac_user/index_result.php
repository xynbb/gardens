<div class="rightinfo" id="_result">
<table  class="tablelist">
		<thead>
			<tr>
				<th width="50">编号</th>
				<th>账户</th>
				<th>性别</th>
				<th>名字</th>
				<th>邮箱</th>
				<th>角色</th>
				<th>部门</th>
				<th>登录时间</th>
				<?php if(!isset($_GET['is_show'])):?>
				<th width="200">管理</th>
				<?php endif;?>
			</tr>
		</thead>
		<tbody>
			<?php 
				if(!empty($list['list'])):
				foreach ($list['list'] as $v):
			?>
			<tr>
				<td><?php echo $v['id'];?></td>
				<td><?php echo $v['uname'];?></td>
				<td>
				<?php
					switch ($v['sex']) {
						case 0:
							echo '保密';
							break;
						
						case 1:
							echo '女';
							break;
						case 2:
							echo '男';
							break;
						default:
							echo '保密';
							break;
					}
				?>
				</td>
				<td><?php echo $v['real_name'];?></td>
				<td><?php echo $v['email'];?></td>
				<td><?php echo is_string($v['roles'])?$v['roles']:implode(' | ', $v['roles']);?></td>
				<td><?php echo $v['deptname'];?></td>
				<td><?php echo $v['login_time'];?></td>
				
			<?php if(!isset($_GET['is_show'])):?>
				<td style="color: #999;">
				<?php if($_this->checkCA('role','set_role')):?>
				<a href="javascript:;" onclick="iframe('/role/set_role?user_id=<?php echo $v['id'];?>','设置角色')">设置角色</a> |
				<?php endif;?>
				 
				<?php if($_this->checkCA('rbac_user','newpassword') && ($v['id'] != $_user['id']) && $_isSuper):?>
				<a href="javascript:;" onclick="iframe('/rbac_user/newpassword/?id=<?php echo $v['id'];?>','修改密码')">修改密码</a> | 
				<?php endif;?>
			
				<?php if($_this->checkCA('rbac_user','update')):?>
				<a href="javascript:;" onclick="iframe('/rbac_user/update?id=<?php echo $v['id'];?>','修改')">修改</a> | 
				<?php endif;?>
				
				 <?php if($_this->checkCA('rbac_user','del')):?>
				<a href="javascript:;" onclick="changeData('/rbac_user/del',{id:<?php echo $v['id'];?>},'确定删除此条数据么?');location.reload();">删除</a>
				<?php endif;?>
				</td>
			<?php endif; ?>	
			</tr>
			<?php 
			endforeach;
			endif;
			?>
		</tbody>
	</table>
	<div class="pagin">
    <?php echo $list['paging'];?>
    </div>
</div>
