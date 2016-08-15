<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>陵园管理系统</title>
<link href="/static/theme/css/style.css" rel="stylesheet" type="text/css" />
<link href="/static/theme/css/select.css"  rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/static/RedMaple/jquery.min.js"></script>
<script language="JavaScript" src="/static/RedMaple/RedMaple.min.js"></script>
<?php echo $this->getStaticFiles();?>
<script type="text/javascript" src="/static/theme/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/static/theme/js/select-ui.min.js"></script>
<script language="JavaScript" src="/static/plugs/common.js"></script>
</head>
<body>
<?php $_this->view('/'.__CONTROLLER__.'/'.__ACTION__);?>
<div  id="_loading" style="display:none; text-align: center;"><img src="/static/RedMaple/images/common/loading.gif" width="60" /></div>
</body>
</html>