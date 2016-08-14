<?php echo $_this->getNav();?>
<div class="rightinfo">
<form id="_form"  action="/<?php echo __CONTROLLER__;?>/<?php echo __ACTION__;?>" method="post" onsubmit="search();return false;" loading="#_loading" result="#_result" page="page">
 <input name="role_id" type="hidden" value="<?php echo isset($_GET['role_id'])?$_GET['role_id']:'';?>" />
    <ul class="seachform">
	    <li><label>指派</label>  
		    <div class="vocation">
			    <select class="select3" style="width: 100px;" name="type">
				    <option value="">全部</option>
				    <option value="1">账户</option>
				    <option value="2">姓名</option>
				    <option value="3">编号</option>
			    </select>
		    </div>
	    </li>
	    
	    <li><label>关键词</label><input name="keyword" type="text" class="scinput" /></li>
	    <li><label>&nbsp;</label><input name="submit" type="submit" class="scbtn" value="查询"/></li>
	    <li>
	    
	    <?php if($_this->checkCA('rbac_user','add')&&(!isset($_GET['role_id'])||empty($_GET['role_id']))):?>
	    <div class="tools">
    	<ul class="toolbar">
			<li class="click" onclick="iframe('/rbac_user/add?role_id=<?php echo isset($_GET['role_id'])?$_GET['role_id']:'';?>','添加',document.body.offsetWidth-40,document.body.offsetHeight-40)"><span><img src="/static/theme/images/t01.png" /></span>添加</li>
	    </ul>
    	</div>
    	<?php endif;?>
	    </li>
    </ul>
</form>
</div>
<?php $_this->view('index_result');?>