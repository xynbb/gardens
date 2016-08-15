<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>出错啦！！</title>
    <link href="<?php echo JJ_STATIC_BASE_URL;?>css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo JJ_STATIC_BASE_URL;?>js/jquery.js"></script>

    <script language="javascript">
        $(function(){
            $('.error_404').css({'position':'absolute','left':($(window).width()-490)/2});
            $(window).resize(function(){
                $('.error').css({'position':'absolute','left':($(window).width()-490)/2});
            })
        });
    </script>


</head>


<body style="background:;">

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="/site/index/">首页</a></li>
        <li>404错误提示</li>
    </ul>
</div>

<div class="error_404">

    <h2>非常遗憾，您访问的页面不存在！</h2>
    <p>看到这个提示，就自认倒霉吧!</p>
    <div class="reindex"><a href="/site/index/" target="_parent">返回首页</a></div>

</div>

<div  style="margin-top: 410px">
    <div class="xline"></div>
    <br>
</div>
</body>

</html>
