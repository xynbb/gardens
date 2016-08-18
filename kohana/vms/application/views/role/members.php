<div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th class="w5p">ID</th>
        <th class="w25p">姓名(帐号)</th>
        <th class="w20p">邮箱</th>
        <th class="w20p">电话</th>
        <th class="w20p">手机</th>
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
        <td class="center"><?php echo $account->getMobile(); ?></td>
      </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>
</div>
