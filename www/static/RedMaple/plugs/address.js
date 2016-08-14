(function($){
	
	$.address =  function(setting)
	{
		setting = $.extend(defaultSettings(),!setting?{}:setting);
		
		selectedAddress();
		
		$(setting.province).change(function(){
			getAddress(setting.city,$(this).val());
			$(setting.county+" option:gt(0)").remove();
		});
		
		$(setting.city).change(function(){
			getAddress(setting.county,$(this).val());
		});
		
		function selectedAddress()
		{
			getAddress(setting.province,'');
			
			var address_id = $(setting.province).attr(setting.address_id);
			
			if(!address_id) return ;
			
			var province = address_id.substring(0, 2);
			
			if(!address_id&&province.length<2) return ;
			
			$(setting.province+" option[value='"+province+"']").prop('selected',true);
			
			getAddress(setting.city,province);
			
			var city = address_id.substring(0, 4);

			if(city.length<4) return ;
			
			$(setting.city+" option[value='"+city+"']").prop('selected',true);
			
			getAddress(setting.county,city);
			
			if(address_id<6) return ;
			
			$(setting.county+" option[value='"+address_id+"']").prop('selected',true);
			
		}
		
		function getAddress(id,val)
		{
			var json = $.ajax({url:setting.url,data:{id:val,'name':id.substr(1)}});
			
			if(json.status)
				$(id).html(json.data);
			else
				alert(json.data);
		}
		
		function defaultSettings()
		{
			return {
					address_id:"address_id",
					province  :"#province",
					city      :"#city",
					county    :"#county",
					url		  :"common/GetAddress"
				 };
		}
		
	};
	
})(jQuery);