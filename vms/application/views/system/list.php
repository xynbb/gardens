<div class="panel panel-default">
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th class="w5p">ID</th>
          <th>名称</th>
          <th>域名</th>
          <th class="w15p">创建时间</th>
          <th class="w10p">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php
         if(is_object($systems)) {
           foreach($systems as $system) {
        ?>
        <tr class="gradeX">
          <td class="center"><?php echo $system->getSystemId(); ?></td>
          <td><?php echo $system->getName(); ?></td>
          <td><?php echo $system->getDomain(); ?></td>
          <td class="center"><?php echo $system->getCreateTime('Y-m-d H:i'); ?></td>
          <td class="center">
            <a name="edit" data-link="<?php echo URL::site('system/edit?system_id='.$system->getSystemId()); ?>" ><i class="glyphicon glyphicon-pencil"> </i>修改</a>
            <a onclick="Common.confirm('确定删除这个系统吗？', '<?php echo URL::site('system/delete?system_id='. $system->getSystemId()); ?>')"><i class="glyphicon glyphicon-remove"></i> 删除</a>
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
      minHeight : 400,
      width : '85%',
      height : '60%',
      autoSize : false,
      type : 'iframe',
      href : $(this).attr('data-link')
    });
  });
</script>