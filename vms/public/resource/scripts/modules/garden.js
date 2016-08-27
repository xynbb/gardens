var Garden = {
	bindFancybox : function() {
		$('[name="pop"]').click(function() {
			$.fancybox({
				minWidth : 1000,
				minHeight : 400,
				width : '85%',
				height : '40%',
				autoSize : false,
				type : 'iframe',
				href : $(this).attr('data-link')
			});
		});
	}

};
