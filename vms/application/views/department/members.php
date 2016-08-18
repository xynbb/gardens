<div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th class="w5p">ID</th>
        <th class="w20p">姓名(帐号)</th>
        <th class="w25p">邮箱</th>
        <th class="w20p">电话</th>
        <th class="w10p">操作</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if (is_object($accounts)) {
          foreach($accounts as $account) {
      ?>
      <tr class="gradeX">
        <td class="center"><?php echo $account->getAccountId(); ?></td>
        <td><?php echo $account->getGivenName().'('.$account->getName().')'; ?></td>
        <td><?php echo $account->getEmail(); ?></td>
        <td class="center"><?php echo $account->getPhone(); ?></td>
        <td class="center">
          <?php
            if($account->getAccountId() != '1') {
              echo '<a onclick="Common.confirm(\'确定从部门删除这个帐号吗？\', \''. URL::site('department/deleteAccount?account_id='. $account->getAccountId()) . '&department_id=' . $departmentId .'\');"><i class="glyphicon glyphicon-remove"> </i> 删除</a>';
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
