<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>密文生成tools</title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<script src="css/jquery.min.js"></script>
</head>
<body>
<div class="panel"> 
  <div class="wrap">
    <input type="text" placeholder="请输入要加密的信息" value="" id="keywords"/>
	<button class="btn1">加密操作</button>
     <button class="btn2">解密操作</button>
 
 </div>


</div>
     <div style="text-align:center;clear:both">
</div>
<script>
$(".btn1").click(function(){
	if($("#keywords").val()=='')
	{
		return false;
	}
	$.ajax({
             type: "POST",
             url: "/create.php",
             data: {name:$("#keywords").val(),type:'encode'},
             dataType: "json",
             success: function(data){
	//				 alert(data.msg);
					 $("#keywords").val(data.msg);
				  }
         });
});
$(".btn2").click(function(){
	if($("#keywords").val()=='')
	{
		return false;
	}
	$.ajax({
             type: "POST",
             url: "/create.php",
             data: {name:$("#keywords").val(),type:'decode'},
             dataType: "json",
             success: function(data){
	//				 alert(data.msg);
					 $("#keywords").val(data.msg);
				  }
         });
});
</script>
</body>
</html>
