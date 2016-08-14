(function($){
	
	$.ganged =  function(setting)
	{
		setting = $.extend(defaultSettings(),!setting?{}:setting);
		
		var val 		 = "",
			rm  		 = "",
			callback		 ,
			id_len 		 = setting.id.length,
			callback_len = setting.callback.length;

		for(var i in setting.id)
		{
			if(callback_len==1||callback_len!=id_len)
				callback = setting.callback[0];
			else if(callback_len==id_len)
				callback = setting.callback[i];
			else
				callback = false;
			
			createGanged(setting.id[parseInt(i)],get(setting.id[parseInt(i)+1]),reset(parseInt(i)+1),callback);
			
			var val = selected(setting.id[i],val,i,callback);
		}
		
		if(setting.endCallback) setting.endCallback();
		
		function createGanged(selected,next,reset,callback)
		{
			selected = $(selected);
			
			if(selected.size()==0) return ;
			
			selected.on("change",function(){
				  
				  var _this	= $(this),
					  val	= _this.val();
				  
				  _this.attr('val',val);
				  
				  if(reset) $(reset).remove();
				  
				  if(val&&next)  getOptions($(next),val,callback);
				  
				  if(callback) callback(_this);
			  });
			
		}
		
		function reset(i)
		{
			var selected = "";
			
			for(var j=i;j<setting.id.length;j++)
			{
				selected += (selected?",":"")+setting.id[j]+($(setting.id[j]).prop('multiple')?" option":" option:gt(0)");
			}

			return selected;
		}
		
		function selected(selected,val,i,callback)
		{
			if(!selected||(i>0&&val=='')) return '';
			
			var obj = $(selected);
			
			if(obj.size()==0) return ;
			
			getOptions(obj,val,callback);
			
			val = get(obj.attr('val'));
			
			obj.find("option[value='"+val+"']").prop('selected',true);
			
			if(val&&callback) callback(obj);
			
			return val;
		}
		
		function get(val)
		{
			return val?val:'';
		}
		
		function getOptions(obj,val)
		{
			var json	 = $.ajax({url:setting.url,data:{id:val,'name':obj.attr('name')}});
			
			if(obj.prop('multiple'))
				obj.find("option").remove();
			else
				obj.find("option:gt(0)").remove();
			
			if(json.status)
				obj.append(json.data);	
			else
				alert(json.data);
		}
		
		function defaultSettings()
		{
			return {
					url:"",
					id :[],
					callback:[],
					endCallback:function(){}
				   };
		}
		
		return selected;
	};
	
})(jQuery);