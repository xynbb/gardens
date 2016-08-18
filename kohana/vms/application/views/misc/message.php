<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>Gome+ Video System</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/resource/css/bootstrap.css" />
<link rel="stylesheet" href="/resource/css/bootstrap-theme.css" />
<link rel="stylesheet" href="/resource/css/content-style.css" />

<script type="text/javascript" src="/resource/scripts/jquery/jquery.js"></script>  
</head>
<body>

<br/><br/><br/><br/><br/>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-body center">
          <h3><?php echo $message; ?></h3>
          <p></p>
          <a class="btn btn-warning btn-big"  href="<?php echo URL::site($redirect); ?>"> 返回… </a>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">setTimeout('(function(uri) {location.href = uri;})("<?php echo URL::site($redirect); ?>")', <?php echo $delay * 1000; ?>);</script>
</body>
</html>