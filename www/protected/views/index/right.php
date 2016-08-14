<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/static/theme/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/static/theme/js/jquery.js"></script>

    <script language="javascript">
        $(function(){
            $('.error').css({'position':'absolute','left':($(window).width()-490)/2});
            $(window).resize(function(){
                $('.error').css({'position':'absolute','left':($(window).width()-490)/2});
            })
        });
    </script>


</head>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    </ul>
    </div>
    
    <div class="mainindex">
    
    <div class="welinfo">

    <b><?php echo $user['uname']; ?> <?php 
    
    $hour = intval(date('H'));
    
    if($hour>0&&$hour<6) echo "凌晨";
    
    if($hour>=6&&$hour<12) echo "上午";
    
    if($hour==12) echo "中午";
    
    if($hour>=13&&$hour<20) echo "下午";
    
    if($hour>=20) echo "晚上";
    
    ?>好(<?php echo date('Y-m-d H:i:s');?>)，欢迎使用网站设置管理系统</b>
    </div>
    <div class="welinfo">
    <span><img alt="时间" src="/static/theme/images/time.png"></span>
    <i>您上次登录的时间：<?php echo $user['login_time'];?></i>
    </div>
    
    <div class="xline"></div>
    
    </div>
    
