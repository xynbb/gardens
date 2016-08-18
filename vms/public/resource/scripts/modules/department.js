var Department = {
	bindFancybox : function() {
		$('[name="edit"]').click(function() {
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

		$('[name="members"]').click(function() {
			$.fancybox({
				minWidth : 1000,
				minHeight : 800,
				width : '85%',
				height : '80%',
				autoSize : false,
				type : 'iframe',
				href : $(this).attr('data-link')
			});
		});
	}
};
