<div class="panel panel-default">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3">
				<form action="<?php echo URL::site('account/list'); ?>" method="get">
					<div class="input-group">
						<input class="form-control" name="keyword" type="text" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>" placeholder="帐号ID/用户名/姓名"/>
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th class="w5p">ID</th>
					<th class="w20p">姓名(帐号)</th>
					<th class="w20p">部门</th>
					<th class="w15p">角色</th>
					<th class="w15p">邮箱</th>
					<th class="w5p">状态</th>
					<th class="w10p">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if (is_object($accounts)) {
					foreach ($accounts as $account) {
						$departmentNames = $account->getDepartments('name');
						$roleNames = $account->getRoles('name');
						?>
						<tr class="gradeX">
							<td style="white-space: normal;"><div class="center"><?php echo $account->getAccountId(); ?></div></td>
							<td><?php echo $account->getGivenName() . '(' . $account->getName() . ')'; ?></td>
							<td><?php echo is_array($departmentNames) ? implode(' / ', $departmentNames) : ''; ?></td>
							<td style="white-space: normal;"><?php echo is_array($roleNames) ? implode(' / ', $roleNames) : ''; ?></td>
							<td style="white-space: normal;"><?php echo $account->getEmail(); ?></td>
							<td class="center" style="white-space: normal;"><?php echo $account->getStatus(true); ?></td>
							<td class="center" style="white-space: normal;">
								<a name="edit" data-link="<?php echo URL::site('account/edit?account_id=' . $account->getAccountId()); ?>" ><i class="glyphicon glyphicon-pencil"> </i>修改</a>
								<?php
								if ($account->getAccountId() != '1') {
									if ($account->getStatus() == '0') {
										echo '<a onclick="Common.confirm(\'确定屏蔽这个账号吗？\', \'' . URL::site('account/delete?account_id=' . $account->getAccountId()) . '\');"><i class="glyphicon glyphicon-remove"> </i> 屏蔽</a>';
									}
									if ($account->getStatus() == '-1') {
										echo '<a onclick="Common.confirm(\'确定恢复这个账号吗？\', \'' . URL::site('account/renormal?account_id=' . $account->getAccountId()) . '\');"><i class="glyphicon glyphicon-ok"> </i> 恢复</a>';
									}
								}
								?>
							</td>
						</tr>
						<?php
					}
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="panel-footer" style="text-align: right;">
		<div class="row">
			<div class="col-md-12 left">
				<?php echo $pagination; ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	$('[name="edit"]').each(function () {
		$(this).fancybox({
			minWidth: 1000,
			minHeight: 880,
			width: '85%',
			height: '100%',
			autoSize: false,
			type: 'iframe',
			href: $(this).attr('data-link')
		});
	});
</script>