<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="shortcut icon" href="/favicon.ico" >

<link href="<?php echo JJ_STATIC_BASE_URL;?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo JJ_STATIC_BASE_URL;?>css/select.css"  rel="stylesheet" type="text/css" />
<?php $renderList = $this->getActionConfig()?>

<?php if(!empty($renderList['_css_'])): ?>
<?php foreach ($renderList['_css_'] as $v):?>
<link rel="stylesheet" href="<?php echo $v;?>" />
<?php endforeach;?>
<?php endif;?>

<script language="JavaScript" src="<?php echo JJ_STATIC_BASE_URL;?>RedMaple/jquery.min.js"></script>
<script language="JavaScript" src="<?php echo JJ_STATIC_BASE_URL;?>RedMaple/RedMaple.min.js"></script>
<script type="text/javascript" src="<?php echo JJ_STATIC_BASE_URL;?>js/common.js"></script>

<?php if(!empty($renderList['_js_'])): ?>
<?php foreach ($renderList['_js_'] as $v):?>
<script type="text/javascript" src="<?php echo $v;?>"></script>
<?php endforeach;?>
<?php endif;?>

<script type="text/javascript" src="<?php echo JJ_STATIC_BASE_URL;?>js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="<?php echo JJ_STATIC_BASE_URL;?>js/select-ui.min.js"></script>
</head>
<body>
<?php echo $content;?>
</body>
</html>