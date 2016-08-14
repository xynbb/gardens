<?php echo $_this->getNav();?>
<div class="rightinfo">
<form id="_form"  action="/<?php echo __CONTROLLER__;?>/<?php echo __ACTION__;?>" method="post" onsubmit="search();return false;" loading="#_loading" result="#_result" page="page">

	<?php if($_this->checkCA('role','add')):?>
    <div class="tools">
    	<ul class="toolbar">
        <li class="click" onclick="iframe('/role/add','添加')""><span><img src="/static/theme/images/t01.png" /></span>添加</li>
        </ul>
    </div>
    <?php endif;?>
</form>
    <?php $_this->view('/role/index_result');?>
</div>