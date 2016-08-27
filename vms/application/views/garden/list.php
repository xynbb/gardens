<div class="panel panel-default">
  <div class="panel-body">
    <div class="row-flow">
      <div class="w100p" id="tree"></div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var data = [];
  data.push({'id' : '1', 'name' : '墓位', 'value' : '', 'parent' : '0', 'operate' :
      " [ <a name=\"pop\" data-link=\"<?php echo URL::site('garden/add?type=1');?>\">添加园</a> ] "
  });

  data.push({'id' : '2', 'name' : '寄存位', 'value' : '2', 'parent' : '0', 'operate' :
      " [ <a name=\"pop\" data-link=\"<?php echo URL::site('garden/add?type=2');?>\">添加园</a> ] "
  });
  <?php
  if(is_object($gardens)) {
    foreach($gardens as $garden) {
      $parent = 1;
      if($garden->getType() == 2) {
        $parent = 2;
      }
      echo "
        data.push({'id' : 'garden_{$garden->getId()}', 'name' : '{$garden->getName()}', 'value' : '{$garden->getId()}', 'parent' : '{$parent}', 'operate' : '".
        " [ <a name=\"pop\" data-link=\"".URL::site('area/add?garden_id='.$garden->getId().'&type='.$parent)."\"> 添加区 </a>".
          " [ <a name=\"pop\" data-link=\"".URL::site('garden/edit?id='.$garden->getId())."\"> 编辑 </a>".
          " | <a onclick=\"Common.confirm(\'确定删除吗？\',\'".URL::site('garden/delete?id='.$garden->getId())."\');\">删除</a> ] ".
      "'});\r\n";
    }
    foreach($areas as $area){
      echo "data.push({'id':'area_{$area->getId()}', 'name':'{$area->getName()}', 'value':'{$garden->getId()}', 'parent':'garden_{$area->getGardenId()}', 'operate': '".
          " [ <a name=\"pop\" data-link=\"".URL::site('rows/add?garden_id='.$area->getGardenId().'&area_id='.$area->getId().'&type='.$parent)."\"> 添加排 </a>".
          " | <a name=\"pop\" data-link=\"".URL::site('area/edit?garden_id='.$area->getGardenId().'&type='.$parent.'&id='.$area->getId())."\">修改</a>".
          " | <a onclick=\"Common.confirm(\'确定删除吗？\',\'".URL::site('area/delete?id='.$area->getId())."\');\">删除</a> ] ".
          "'});\r\n";
    }
    foreach($rows as $row){
      echo "data.push({'id':'row_{$row->getId()}', 'name':'{$row->getName()}', 'value':'{$row->getId()}', 'parent':'area_{$row->getAreaId()}', 'operate': '".
          " [ <a name=\"pop\" data-link=\"".URL::site('rows/edit?area_id='.$row->getAreaId().'&type='.$parent.'&id='.$row->getId())."\">修改</a>".
          " | <a onclick=\"Common.confirm(\'确定删除吗？\',\'".URL::site('rows/delete?id='.$row->getId())."\');\">删除</a> ] ".
          "'});\r\n";
    }
  }
  ?>
  var tree = new Tree('tree', data);
  tree.display(1);

  Garden.bindFancybox();
</script>

