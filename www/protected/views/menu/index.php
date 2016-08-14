<form class="form-horizontal" id="_form" action="/<?php echo __CONTROLLER__;?>/<?php echo __ACTION__;?>">
<?php echo $_this->getNav();?>
    <div class="rightinfo">
    
    <?php if($_this->checkCA('menu','add')):?>
    <div class="tools">
    
    	<ul class="toolbar">
        <li class="click" onclick="iframe('/menu/add','添加')"><span><img src="/static/theme/images/t01.png" /></span>添加</li>
        </ul>
    </div>
    <?php endif;?>
<table  class="tablelist">
		<thead>
			<tr>
				<th width="50">编号</th>
				<th>名称</th>
				<th>控制器</th>
				<th width="70">操作</th>
				<th>链接</th>
				<th>参数</th>
				<th width="50">显示</th>
				<th width="50">排序</th>
				<th width="115">管理</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td colspan="7">顶级菜单</td>
				<td>
				<?php if($_this->checkCA('menu','add')):?>
				<a href="javascript:;" onclick="iframe('/menu/add','添加')">添加菜单</a>
				<?php endif;?>
				</td>
			</tr>
			<?php foreach ($list as $v):?>
			<tr>
				<td><?php echo $v['id'];?></td>
				<td><?php echo str_repeat("　├ ", substr_count($v['path'], ',')-1).$v['name'];?></td>
				<td><?php echo $v['controller'];?></td>
				<td><?php if(!empty($v['actions'])):?><a href="javascript:;" onclick="menu_toggle(this,'.attr_<?php echo $v['id'];?>')">查看操作</a><?php endif;?></td>
				<td><?php echo $v['url'];?></td>
				<td><?php echo $v['query_string'];?></td>
				<td><?php echo empty( $v['is_show'])?"否":"是";?></td>
				<td><?php echo $v['sort'];?></td>
				<td style="color: #999;">
				<?php if($_this->checkCA('menu','update')):?>
				<a href="javascript:;" onclick="iframe('/menu/update?id=<?php echo $v['id'];?>','修改');">修改</a> | 
				<?php endif;?>
				<?php if($_this->checkCA('menu','add')):?>
				<a href="javascript:;" onclick="iframe('/menu/add?id=<?php echo $v['id'];?>','添加')">添加</a> |
				<?php endif;?>
				<?php if($_this->checkCA('menu','del')):?>
				<a href="javascript:;" onclick="changeData('/menu/del',{id:<?php echo $v['id'];?>},'确定删除此条数据么?');location.reload();">删除</a>
				<?php endif;?>
				</td>
			</tr>
			<?php 
			if(!empty($v['actions'])):
				$actions = json_decode($v['actions'],true);
				foreach ($actions as $v1):
			?>
			<tr class="attr attr_<?php echo $v['id'];?>" style="display: none;color: #999;">
				<td></td>
				<td><?php echo str_repeat("　├ ", substr_count($v['path'], ',')-1)."　├ ".$v1['zh_name'];?></td>
				<td><?php echo empty($v1['controller'])?$v['controller']:$v1['controller'];?></td>
				<td><?php echo $v1['action'];?></td>
				<td><?php echo $v1['url'];?></td>
				<td><?php echo $v1['query_string'];?></td>
				<td><?php echo empty( $v1['is_show'])?"否":"是";?></td>
				<td colspan="4"></td>
			</tr>
			<?php 
				endforeach;
			endif;
			?>
			<?php endforeach;?>
		</tbody>
	</table>
	
    </div>
	</form>