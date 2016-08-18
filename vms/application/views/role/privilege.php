<div class="panel panel-default">
  <div class="panel-heading">
    <h4><?php echo "{$role->getName()}";?></h4>
  </div>
  <div class="panel-body">
    <ul class="nav nav-tabs">
      <?php
        foreach($systems as $system) {
          echo "<li data-system=\"{$system->getSystemId()}\"><a onclick=\"Role.togglePrivilegeList({$system->getSystemId()});\">{$system->getName()}</a></li>\r\n";
        }
      ?>
    </ul>
  </div>
  <div class="panel-body">
    <?php
      foreach($navigators as $navigator) {
        echo "<div data-value=\"{$navigator->getSystemId()}\">\r\n";
        echo "<h4><span class=\"label label-default\">{$navigator->getName()}</span> <span><input name=\"privilege_id[]\" type=\"checkbox\" data-type=\"navigator\" value=\"{$navigator->getPrivilegeId()}\" onclick=\"Role.privilege(this);\" /></span></h4>\r\n";

        foreach($menus as $menu) {
          if($menu->getParentId() != $navigator->getPrivilegeId()) {
            continue;
          }
    ?>
        <ul class="list-group inline-group w240">
          <li class="list-group-item"><strong><?php echo $menu->getName(); ?></strong> <span class="pull-right"><input name="privilege_id[]" type="checkbox" data-type="menu" value="<?php echo $menu->getPrivilegeId(); ?>" onclick="Role.privilege(this);" /></span></li>
          <?php
            foreach($controllers as $controller) {
              if($controller->getParentId() != $menu->getPrivilegeId()) {
                continue;
              }
          ?>
          <li class="list-group-item"><?php echo $controller->getName(); ?> <span class="pull-right"><input name="privilege_id[]" type="checkbox" data-type="controller" value="<?php echo $controller->getPrivilegeId(); ?>" onclick="Role.privilege(this);" /></span></li>
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
var ajaxGrantURL = '<?php echo URL::site("role/grant?role_id={$role->getRoleId()}"); ?>';
var ajaxRevokeURL = '<?php echo URL::site("role/revoke?role_id={$role->getRoleId()}"); ?>';

var navigators = [];
<?php
foreach($navigators as $navigator) {
  echo "navigators.push({'name':'{$navigator->getName()}','privilegeId':'{$navigator->getPrivilegeId()}', 'parentId':'{$navigator->getParentId()}'});\r\n";
}
?>
var menus = [];
<?php
foreach($menus as $menu) {
  echo "menus.push({'name':'{$menu->getName()}', 'privilegeId':'{$menu->getPrivilegeId()}', 'parentId':'{$menu->getParentId()}'});\r\n";
}
?>
var controllers = [];
<?php
foreach($controllers as $controller) {
  echo "menus.push({'name':'{$controller->getName()}', 'privilegeId':'{$controller->getPrivilegeId()}', 'parentId':'{$controller->getParentId()}'});\r\n";
}
?>

var defaults = [];
<?php
if(is_object($privileges)) {
  foreach($privileges as $privilege) {
    echo "defaults.push({$privilege->getPrivilegeId()});\r\n";
  }
}
?>

Role.defaults(defaults);
Role.togglePrivilegeList(<?php echo $systemId; ?>);
</script>

