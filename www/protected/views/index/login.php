<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>网站设置</title>
    <link href="/static/theme/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/static/theme/js/jquery.js"></script>
    <script src="/static/theme/js/cloud.js" type="text/javascript"></script>

    <script language="javascript">
        $(function(){
            $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
            $(window).resize(function(){
                $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
            })
        });
        function login()
        {
			var username = $('#username').val();
			var passwd 	 = $('#passwd').val();
			
			
			if(username=='')
			{
				alert('账户不能为空');
				return false
			}
			
			if(passwd=='')
			{
				alert('密码不能为空');
				return false
			}
		
			return true;
	
        }
    </script>

</head>

<body style="background-color:#1c77ac; background-image:url(/static/theme/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">

<div id="mainBody">
    <div id="cloud1" class="cloud"></div>
    <div id="cloud2" class="cloud"></div>
</div>


<div class="logintop">
    <span>欢迎登录CRM管理界面平后台</span>
    <ul>
        <li><a href="#">回首页</a></li>
        <li><a href="#">帮助</a></li>
        <li><a href="#">关于</a></li>
    </ul>
</div>

<div class="loginbody">
	<form action="/index/main/" method="post" onsubmit="return login();">
    <span class="systemlogo"></span>
    <div class="loginbox loginbox1">
        <ul>
            <li><input name="username" type="text" class="loginpwd" placeholder="账户" value=""/></li>
            <li><input name="passwd" type="password" class="loginpwd" placeholder="密码" value=""/></li>
            <li>
            	<input name="" type="submit" class="loginbtn" value="登录"/>
            </li>
        </ul>
    </div>
    </form>
</div>
</body>
</html>
