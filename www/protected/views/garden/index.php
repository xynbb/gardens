<?php echo $_this->getNav();?>
<div class="rightinfo">
<form id="_form"  action="/<?php echo __CONTROLLER__;?>/<?php echo __ACTION__;?>" method="post" onsubmit="search();return false;" loading="#_loading" result="#_result" page="page">

	<?php if($_this->checkCA('garden','add')):?>
    <div class="tools" style="padding: 0px 8px;">
    	<ul class="toolbar">
        <li class="click" onclick="iframe('/garden/add','添加','80%','90%')""><span><img src="/static/theme/images/t01.png" /></span>添加</li>
        </ul>
    </div>
    <?php endif;?>
</form>
    <?php $_this->view('/garden/index_result');?>
</div>