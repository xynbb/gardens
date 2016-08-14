$(function(){
	
	$.RedMaple.validator();
		
	$("#r_path").change(function(){
		var val = $(this).val();
		if(val=='0,')
		{
			$("#is_super").show();
		}else{
			$("#is_super").hide();
			$("#r_is_super1").prop('checked',false);
			$("#r_is_super2").prop('checked',true);
			
		}
	});
});