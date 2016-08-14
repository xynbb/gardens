
$(function(){
	init();
	$.RedMaple.validator();
	$('.tablelist tbody tr:odd').addClass('odd');
});

function init()
{
	jia();
	jian();
	xia();
	shang();
	is_show();
}

function jia()
{
	$(".jia").unbind().click(function(){
		var html = $(".table tr:last").clone();
		html.find("input").not(":checkbox").val("");
		html.find("input[name='m[actions][is_show][]']").val("1");
		html.find(":checkbox").prop("checked",true);
	    $(this).parents("tr").after(html);
	    init();
	});
}

function jian()
{
	$(".jian").unbind().click(function(){
		$(this).parents("tr").remove();
		init();
	});
}

function shang()
{
	$(".shang").unbind().click(function(){
		
		var action 		= $(this).parents("tr");
		var index  		= $(".table tr").index(action);
		var pre			= action.prev();

		action.remove();

		if(index==1)
			$(".table tr:last").after(action);
		else
			pre.before(action);
		
		init();
	});
}


function xia()
{
	$(".xia").unbind().click(function(){
		
		var action 		= $(this).parents("tr");
		var tr  		= $(".table tr");
		var size		= tr.size();
		var index  		= tr.index(action);
		var next			= action.next();

		action.remove();
		
		if(size==index+1)
			$(".table tr:first").after(action);
		else
			next.after(action);
		
		init();
	});
}

function is_show()
{
	$("input[type='checkbox']").unbind().click(function(){
		
		if($(this).prop('checked')){
			$(this).next().val('1');
		}else{
			$(this).next().val('0');
		}
	});
}

function menu_toggle(_obj,_class)
{
	var tr = $(_obj).blur().parents('tr').nextAll(_class);
	
	$('tr.attr').not(tr).hide();
	
	tr.toggle();
}