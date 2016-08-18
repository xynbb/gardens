<div class="panel panel-default">
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th class="w5p">ID</th>
          <th>名称</th>
          <th class="w15p">系统</th>
          <th class="w15p">模块</th>
          <th class="w15p">入口文件</th>
          <th class="w15p">创建时间</th>
          <th class="w10p">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(is_object($modules)) {
          foreach($modules as $module) {
            //$system = $module->findSystem($systems);
        ?>
        <tr class="gradeX">
          <td><?php echo $module->getModuleId(); ?></td>
          <td><?php echo $module->getName(); ?></td>
          
          <td>
           <?php
           		foreach($systems as $system) {
           			if($system->system_id == $module->system_id) {
           				echo is_object($system) ? $system->getName() : '';
           			}
           		}
           ?>
          </td>
          <td><?php echo $module->getModule(); ?></td>
          <td><?php echo $module->getPortal(); ?></td>
          <td class="center"><?php echo $module->getCreateTime('Y-m-d H:i'); ?></td>
          <td class="center">
            <a name="edit" data-link="<?php echo URL::site('module/edit?module_id='.$module->getModuleId()); ?>" ><i class="glyphicon glyphicon-pencil"> </i> 修改</a>
            <a onclick="Common.confirm('确定删除这个模块吗？', '<?php echo URL::site('module/delete?module_id='. $module->getModuleId()); ?>')"><i class="glyphicon glyphicon-remove"></i> 删除</a>
          </td>
        </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<script type="text/javascript">

  $('[name="edit"]').each(function() {
    $(this).fancybox({
      minWidth : 1000,
      minHeight : 600,
      width : '85%',
      height : '60%',
      autoSize : false,
      type : 'iframe',
      href : $(this).attr('data-link')
    });
  });
</script>