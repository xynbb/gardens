<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部菜单</title>
    <link href="/static/theme/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/static/theme/css/select.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/static/RedMaple/jquery.min.js"></script>
	<script language="JavaScript" src="/static/RedMaple/RedMaple.min.js"></script>
	<script type="text/javascript" src="/static/theme/js/common.js"></script>

    <script type="text/javascript">
        $(function(){
        	//顶部导航切换
        	$(".nav li a").click(function(){
        		$(".nav li a.selected").removeClass("selected");
        		$(this).addClass("selected");
        	});
        	
        	var href = $('.nav li').eq(0).find('a').addClass("selected").attr('href');

        	if(href)
        	{
        		self.parent.frames['leftFrame'].location=href;
        	}
        });
        

    </script>


</head>

<body style="background:url(/static/theme/images/topbg.gif) repeat-x;">
<div class="topleft">
    <!--<img src="/static/theme/images/logo.png" title="系统首页" />-->
</div>

<ul class="nav">
   	<?php if(!empty($list)):  foreach ($list as $v):?> 
    <li><a href="<?php if(!empty($v['url'])): echo $v['url'].(empty($v['query_string'])?'':'?'.$v['query_string']); else: ?>/index/left?id=<?php echo $v['id']; endif;?>" <?php if(!empty($v['url'])):?>target="_blank"<?php else:?>target="leftFrame"<?php endif;?>><img src="/static/theme/<?php echo $v['img'];?>" title="工作台" /><h2><?php echo $v['name'];?></h2></a></li>
    <?php endforeach; endif;?>
</ul>

<div class="topright">
    <ul>
        <li><span><img src="/static/theme/images/help.png" title="帮助"  class="helpimg"/></span><a href="javascript:alert('建设中')">帮助</a></li>
		<li><a href="/rbac_user/newpassword" target="rightFrame">重置密码</a></li>
        <li><a href="javascript:alert('建设中')">关于</a></li>
        <li><a href="/index/logout" target="_parent">退出</a></li>
    </ul>

    <div class="user">
        <span><?php echo $user['real_name']; ?></span>
        <!--
        <i>消息</i>
        <b>5</b>
        -->
    </div>

</div>

</body>
</html>
