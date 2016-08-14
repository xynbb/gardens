$.RedMaple.config.validator = {};

$.RedMaple.config.validator.form 			= "#_form";

$.RedMaple.config.validator.errorClass 		= 'error';
$.RedMaple.config.validator.successClass 	= 'success';
$.RedMaple.config.validator.ignore 			= "";
$.RedMaple.config.validator.success 		= success;
$.RedMaple.config.validator.errorPlacement	= error;
$.RedMaple.config.validator.submitHandler 	= submit;
$.RedMaple.config.validator.tipsIndex 		= {};
$.RedMaple.config.validator.getTabId 		= getTabId;

function getTabId()
{
	return $(".tabs").eq($(".tab").index($(ele).parents(".tab"))).attr('tab_id');
}

function success(error, ele)
{
	var id = error.attr('id');
	
	id  =  (id.substr(32,4)=='_md5')?id:$.RedMaple.md5(id)+"_md5";
	
	error.attr('id',id);
	
	$("#"+id).removeClass($.RedMaple.config.validator.errorClass ).addClass($.RedMaple.config.validator.successClass);
}

function error(error, ele)
{
	var id = error.attr('id');
	
	id = (id.substr(32,4)=='_md5')?id:$.RedMaple.md5(id)+"_md5";
	
	error.attr('id',id);
	
	if(error.text()!=''&&$.RedMaple.config.validator.getTabId && $(ele).is(':hidden')&&$(ele).attr('type')!='hidden')
	{
		var tabID = $.RedMaple.config.validator.getTabId($(ele));
		
		if(!$.RedMaple.config.validator.tipsIndex[tabID])
		{
			$.RedMaple.config.validator.tipsIndex[tabID] = layer.tips("此选项卡有提示信息！", "#"+tabID);
		}
	}
	
	$("#"+id).removeClass($.RedMaple.config.validator.successClass).addClass($.RedMaple.config.validator.errorClass);

	if($("#"+id).size()==0) 
		$(ele).after(error);
	else
		$("#"+id).text(error.text());
}

function submit()
{
	$.RedMaple.form($.RedMaple.config.validator.form).submit(function(json){
	
		if(json.eval==true) eval(json.data.js);
	
	});

	return false;
};