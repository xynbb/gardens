<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/static/theme/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/static/theme/js/jquery.js"></script>

    <script type="text/javascript">
        $(function(){
            //导航切换
        	$(".menuson li").click(function(){
        		$(".menuson li.active").removeClass("active")
        		$(this).addClass("active");
        	});
        	
        	$('.title').click(function(){
        		var $ul = $(this).next('ul');
        		$('dd').find('ul').slideUp();
        		if($ul.is(':visible')){
        			$(this).next('ul').slideUp();
        		}else{
        			$(this).next('ul').slideDown();
        		}
        	});

        })
    </script>


</head>

<body style="background:#f0f9fd;">
<div class="lefttop"><span></span><?php echo empty($p_name)?"菜单":$p_name;?></div>

<dl class="leftmenu">
    <?php if(!empty($list)):?>
    <?php foreach ($list as $v):?>
    <dd>
        <div class="title">
            <span><img src="/static/theme/<?php echo $v['img'];?>" /></span><?php echo $v['name'];?>
        </div>
    	<ul class="menuson">
    	<?php if(!empty($v['urls'])):?>
    	<?php foreach ($v['urls'] as $k1=>$v1):?>
        <li><cite></cite><a href="<?php echo $v1['url'];?>" target="rightFrame"><?php echo $v1['name'];?></a><i></i></li>
        <?php endforeach;?>
        <?php endif;?>
        </ul> 
    </dd>
    <?php endforeach;?>
     <?php endif;?>
</dl>

</body>
</html>
