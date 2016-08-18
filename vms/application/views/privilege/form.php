<div class="panel panel-default">
	<div class="panel-body">
		<form class="form-horizontal" role="form">
			<input type="hidden" name="privilege_id" value="<?php echo is_object($privilege) ? $privilege->getPrivilegeId() : ''; ?>" />
			<div class="form-group">
				<label class="col-md-2 control-label">权限名称*</label>
				<div class="col-md-6">					
					<input type="text" class="form-control" name="name" value="<?php echo is_object($privilege) ? $privilege->getName() : ''; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">系统*</label>
				<div class="col-md-6">
					<select class="form-control" name="system_id">
						<option value="">请选择</option>
						<?php
						foreach ($systems as $system) {
							if (is_object($privilege) && $system->getSystemId() == $privilege->getSystemId()) {
								echo "<option value=\"{$system->getSystemId()}\" selected=\"selected\">{$system->getName()}</option>\r\n";
							} else {
								echo "<option value=\"{$system->getSystemId()}\">{$system->getName()}</option>\r\n";
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">模块*</label>
				<div class="col-md-6">
					<select class="form-control" name="module_id">
						<option value="">请选择</option>
						<?php
						foreach ($modules as $module) {
							if (is_object($privilege) && $module->getModuleId() == $privilege->getModuleId()) {
								echo "<option value=\"{$module->getModuleId()}\" selected=\"selected\">{$module->getName()}({$module->getModule()})</option>\r\n";
							} else {
								echo "<option value=\"{$module->getModuleId()}\">{$module->getName()}({$module->getModule()})</option>\r\n";
							}
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">上级*</label>
				<div class="col-md-6">
					<select class="form-control" name="parent_id">
						<option value="">请选择</option>
						<?php
						foreach ($navigators as $navigator) {
							if (is_object($privilege) && ($privilege->getParentId() == $navigator->getPrivilegeId())) {
								echo "<option value=\"{$navigator->getPrivilegeId()}\" selected=\"selected\">{$navigator->getName()}</option>\r\n";
							} else {
								echo "<option value=\"{$navigator->getPrivilegeId()}\">{$navigator->getName()}</option>\r\n";
							}
							foreach ($menus as $menu) {
								if ($menu->getParentId() != $navigator->getPrivilegeId()) {
									continue;
								}
								if (is_object($privilege) && ($privilege->getParentId() == $menu->getPrivilegeId())) {
									echo "<option value=\"{$menu->getPrivilegeId()}\" selected=\"selected\">&nbsp;&nbsp;&nbsp;&nbsp;{$menu->getName()}</option>\r\n";
								} else {
									echo "<option value=\"{$menu->getPrivilegeId()}\">&nbsp;&nbsp;&nbsp;&nbsp;{$menu->getName()}</option>\r\n";
								}
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">类型*</label>
				<div class="col-md-6">
					<select class="form-control" name="type">
						<option value="">请选择</option>
						<option value="navigator" <?php echo is_object($privilege) && $privilege->getType() == 'navigator' ? 'selected="selected"' : ''; ?>>导航</option>
						<option value="menu" <?php echo is_object($privilege) && $privilege->getType() == 'menu' ? 'selected="selected"' : ''; ?>>菜单</option>
						<option value="controller" <?php echo is_object($privilege) && $privilege->getType() == 'controller' ? 'selected="selected"' : ''; ?>>控制器</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">控制器</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="controller" value="<?php echo is_object($privilege) ? $privilege->getController() : ''; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">动作</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="action" value="<?php echo is_object($privilege) ? $privilege->getAction() : ''; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">目标地址(*仅外部系统填充)</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="target" value="<?php echo is_object($privilege) ? $privilege->getTarget() : ''; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">图标</label>
				<div class="col-md-6">
					<input type="text" class="icon-picker" name="icon" value="<?php echo is_object($privilege) ? $privilege->getIcon() : ''; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">是否显示*</label>
				<div class="col-md-6">
					<div class="radio-inline">
						<label>
							<input type="radio" name="is_display" value="0" <?php echo is_object($privilege) && $privilege->getIsDisplay() == 0 ? 'checked="checked" ' : ''; ?>/>不显示
						</label>
					</div>
					<div class="radio-inline">
						<label>
							<input type="radio" name="is_display" value="1" <?php echo!is_object($privilege) || (is_object($privilege) && $privilege->getIsDisplay() == 1) ? 'checked="checked" ' : ''; ?>/>显示
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">排序(*数字小靠前)</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="sequence" value="<?php echo is_object($privilege) ? $privilege->getSequence() : '0'; ?>" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
					<input type="submit" value=" 保存 " class="btn btn-success" />
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">

	$(".icon-picker").iconPicker();
	var url = "<?php echo is_object($privilege) && $privilege->getPrivilegeId() ? URL::site('privilege/modify') : URL::site('privilege/save'); ?>";
	$(function () {
		//表单提交
		$('form').submit(function () {
			$.post(url, $(this).serialize(), function (data) {
				var text = data.message;
				if (data.code) {
					Common.success(text || '操作成功', function () {
						if (parent.$.find('.fancybox-overlay').length) {
							parent.location = "/privilege/list";
						} else {
							location = "/privilege/list";
						}
					});
				} else {
					Common.error(text);
				}
			}, "json");
			return false;
		});
	});
</script>
