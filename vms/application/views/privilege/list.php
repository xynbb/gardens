<div class="panel panel-default">
  <div class="panel-body">
    <ul class="nav nav-tabs">
    <?php
      foreach($systems as $system) {
        echo "<li data-system=\"{$system->getSystemId()}\"><a onclick=\"Privilege.toggle({$system->getSystemId()});\">{$system->getName()}</a></li>\r\n";
      }
    ?>
    </ul>
  </div>
  <div class="panel-body">
  <?php
    foreach($navigators as $navigator) {
      echo "<div data-value=\"{$navigator->getSystemId()}\">\r\n";
      echo "<h4><span class=\"label label-default\">{$navigator->getName()}</span> <span class=\"small\"><a href=\"".URL::site("privilege/edit?privilege_id={$navigator->getPrivilegeId()}")."\">改</a> | <a onclick=\"Common.confirm('确定删除这条记录吗？', '".URL::site("privilege/delete?privilege_id={$navigator->getPrivilegeId()}") ."');\">删</a></span></h4>\r\n";
      foreach($menus as $menu) {
        if($menu->getParentId() != $navigator->getPrivilegeId()) {
          continue;
        }
      ?>
      <ul class="list-group inline-group w240">
        <li class="list-group-item"><strong><?php echo $menu->getName(); ?></strong> <span class="pull-right"><a href="<?php echo URL::site("privilege/edit?privilege_id={$menu->getPrivilegeId()}"); ?>">改</a> | <a onclick="Common.confirm('确定删除这条记录吗？', '<?php echo URL::site("privilege/delete?privilege_id={$menu->getPrivilegeId()}"); ?>');">删</a></span></li>
        <?php
          foreach($controllers as $controller) {
            if($controller->getParentId() != $menu->getPrivilegeId()) {
              continue;
            }
          ?>
          <li class="list-group-item"><?php echo $controller->getName(); ?> <span class="pull-right"><a href="<?php echo URL::site("privilege/edit?privilege_id={$controller->getPrivilegeId()}"); ?>">改</a> | <a onclick="Common.confirm('确定删除这条记录吗？', '<?php echo URL::site("privilege/delete?privilege_id={$controller->getPrivilegeId()}"); ?>');">删</a></span></li>
        <?php
          }
        ?>
      </ul>
      <?php
        }
        echo "</div>\r\n";
      }
      ?>
    </div>
  </div>
</div>
<script type="text/javascript">
Privilege.toggle(<?php echo $systemId; ?>);
</script>
