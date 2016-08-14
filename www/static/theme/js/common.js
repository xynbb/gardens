function search(page)
{
	if(page)
		$.RedMaple.form("#_form").search(page);
	else
		$.RedMaple.form("#_form").search();
}

function iframe(url,title,width,height,no_parent)
{
	if(!width)
	{
		width  = parent.parent.document.body.offsetWidth-40;
	}
	
	if(!height)
	{
		height = parent.parent.document.body.offsetHeight-40;
	}
	
	if(!no_parent)
		parent.parent.$.RedMaple.layer.iframe(url,title,width,height);
	else
		$.RedMaple.layer.iframe(url,title,width,height);
}

function changeData(url,obj,msg,search)
{
	$.RedMaple.form().changeData(url,obj,msg);
	
	if(search) search();
}

$(function(){
	$("select").each(function(i,j){
		var multiple = $(j).prop('multiple');
		var hide     = $(j).attr('unset');
		
		if(!multiple&&!hide)
		{
			$(j).uedSelect({width : $(j).width()});
		}
		
	});
	uedSelect();
});

function uedSelect()
{
	$("select").each(function(i,j){
		
		if($(j).parents('.uew-select').size()==0)
		{
			$(j).uedSelect({width : $(j).width()});
			
		}
		
	});
}

function ajax(url,data,func)
{
	$.ajax({
		  url : url,
		  type:"POST",
		  data:data,
		  dataType:'json',
		  success:function(josn)
		  {
			  func(josn.data);
		  }
	}); 
}

function tab()
{
	$(".itab ul li a").click(function(){
		$(".itab ul li a").removeClass();
		$(this).addClass('selected');
		var index = $(".itab ul li a").index($(this));
		$('form').each(function(i,j){
			
			if($(j).find('#_tab').size()==0)
				$(j).append("<input name='_tab' id='_tab' type='hidden' value='"+index+"'/>");
			else
				$(j).find('#_tab').val(index);
		});
		$('.tabson').hide().eq(index).show();
	});
}

function no_ajax_subimt(select,action)
{
	var _action 	= $(select).attr('action');
	var _onsubmit 	= $(select).attr('onsubmit');
	
	$(select).attr('action',action)
			 .attr('onsubmit','')
			 .submit()
			 .attr('action',_action)
			 .attr('onsubmit',_onsubmit);
}

function uploadPic(obj, index, identityId) {
	var upload_button =  $(obj).uploading({
		auto				:true,
		swf					:"/public/coder/js/auth/uploading/uploading.swf?"+new Date().getTime(),
		url					:"/upload/index",
		debug				:false,
		progress            :false,
		onUploadSuccess:function(file,data)
		{
			eval("var data = "+data+";");
			$("#identity"+index).show();
			var str = "<img src='/"+data.url+"' width='120px' height='120px'><input type='hidden' value='"+data.url+"' name='identity"+index+"'>"
			$("#"+identityId).html(str);
		}
	});
}