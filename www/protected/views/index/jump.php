<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link href="/static/theme/css/style.css" rel="stylesheet" type="text/css" />
<script src="/static/theme/js/jquery.js"  type="text/javascript" ></script>

<script language="javascript">
$(function(){

	var time 	= <?php echo empty($time)?0:$time;?>;
	var url	 	= '<?php echo $info['url'];?>';
	var target 	= '<?php echo $info['target']?>';
		

	var bar = setInterval(function(){
		
					time--;
	
					$("#time").text(time);

					if(time==0)
					{
						if(url=='-1')
						{
							history.back(-1);
						}
						else
						{
							if(target=='_parent')
								parent.location.href = url;
							else
								location.href = url;
						}
						
						return clearInterval(bar);
					}

				},1000);
});  
</script> 


</head>

<body style="background:#edf6fa;">
   <div class="jump">
  		<div class="top_50p">
  		</div>
  		<div class="bottom_50p">
	  		<div class="ts <?php if($status):?>success<?php else:?>error<?php endif;?>">
			    <h2 class="h2"><?php echo $info['msg'];?></h2>
			    <p><a href="<?php echo $info['url'];?>">浏览器会在 <span id="time" style="color: red;font-size: 16px;font-weight: bold;display: inline;"><?php echo $time;?></span> 秒钟后自动跳转。如果浏览器没有跳转，请点击此处。</a></p>
		    </div>
		    <div class="reindex"><a href="<?php echo $info['url']=='-1'?'javascript:history.back(-1);':$info['url'];?>" target="<?php echo $info['target'];?>">返回首页</a></div>
  		</div>
    </div>
</body>

</html>

