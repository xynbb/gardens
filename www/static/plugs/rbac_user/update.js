$(function(){
	$.RedMaple.validator();
	
	$.ganged({
		url:"/master/get_city",
		id:["#area_id","#city_id"]
	});
});