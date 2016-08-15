<div class="rightinfo" id="_result">
	<table class="tablelist">
		<tr>
			<th style="width: 5%;">ID</th>
			<th style="text-align: center;width: 15%;">名称</th>
			<th style="text-align: center;width: 10%;">区个数</th>
			<th style="text-align: center;width: 10%;">排序</th>
			<th style="text-align: center;width: 10%">状态</th>
			<th style="text-align: center;width: 15%;">创建时间</th>
			<th style="text-align: center;width: 15%;">修改时间</th>
			<th style="text-align: center;width: 20%;">管理</th>
		</tr>
		<?php
			if(!empty($list['list'])):
				foreach ($list['list'] as $v):?>
				<tr>
					<td><?php echo $v['id'];?></td>
					<td><?php echo $v['name'];?></td>
					<td><?php echo 0;?></td>
					<td><?php echo $v['sort'];?></td>
					<td style="text-align: center;"><?php echo $v['status'] == 1 ? '启用' : ($v['status'] == 0? '停用': '');?></td>
					<td style="text-align: center;"><?php echo $v['create_time'];?></td>
					<td style="text-align: center;"><?php echo $v['update_time'];?></td>
					<td style="color: #999;text-align: center;">

					<?php if($_this->checkCA('garden','update')):?>
						<a href="javascript:;" onclick="iframe('/garden/update/?id=<?php echo $v['id'];?>','修改','80%','90%')">修改</a> |
					<?php endif;?>

					<?php if($_this->checkCA('garden','del')):?>
					<a href="javascript:;" onclick="changeData('/garden/del',{id:<?php echo $v['id'];?>},'确定删除此条数据么?');location.reload();">删除</a>
					<?php endif;?>
					</td>
				</tr>
				<?php endforeach;?>
		<?php else:?>
			<tr>
				<td colspan="8" style="text-align: center;">暂无数据</td>
			</tr>
		<?php endif;?>
	</table>

	<div class="pagin">
		<?php echo $list['paging'];?>
	</div>

</div>