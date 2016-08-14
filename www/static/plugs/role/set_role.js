$(function(){
	
	var is_super =  $('input[is_super="1"]:checked');
	
	if(is_super.size()>0) $("input").not($("input[name='user_id']")).not(is_super).not('input[type="button"]').prop('disabled',true);
	
    $("input").click(function(){
    	
    	var _this = $(this);
    	
    	if($(this).attr('is_super')=='1') $('input').not($(this)).not($("input[name='user_id']")).not('input[type="button"]').prop('disabled',$(this).prop('checked'));
    	
    	$.RedMaple.form("#_form").submit(function(json){
    		if(!json.status)
			{
    			_this.prop('checked',!_this.prop('checked'));
    			
    			if(_this.attr('is_super')=='1') $('input').not(_this).not('input[type="button"]').prop('disabled',_this.prop('checked'));
    			
				alert(json.data);
			}
    	});
	});
    
    $("select").change(function(){
    	$.RedMaple.form("#_form").submit();
	});
	
});