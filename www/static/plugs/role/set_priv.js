$(function(){
	
	$('.tablelist tbody tr:odd').addClass('odd');
	
	$("input:checkbox[path]").click(function(){
		var _this	= $(this);
		var path  	= _this.attr('path');
		var _path 	= '';
		 
		if(_this.prop('checked'))
		{
			path = path.substr(2,path.length-3).split(',');
			
			for(var i in path)
			{
				_path += path[i]+",";
				
				if(_this.attr('name')=='mid[]')
					$("input:checkbox[path='0,"+_path+"']").prop('checked',true);
				else
					$("input:checkbox[path='0,"+_path+"'][name='mid[]']").prop('checked',true);
			}
		}
		else
		{
			if(_this.attr('name')=='mid[]')
			{
				$("input:checkbox[path^='"+path+"']").prop('checked',false);
			}
		}
		
		$.RedMaple.form("#_form").submit();
	});
	
	$("#qx").click(function(){
		$("input:checkbox").prop('checked',$(this).prop('checked'));
		$.RedMaple.form("#_form").submit();
	});
	
});