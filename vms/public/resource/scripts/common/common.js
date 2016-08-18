var Common = {
	alert: function(text, time, callback) {
		var defaultTime = 1500;
		if ((typeof time) === 'function') {
			callback = time;
			time = defaultTime;
		}
		time = time || defaultTime;
		swal({
			'title': '操作警告',
			'text': text,
			'type': 'error',
			'showConfirmButton': false,
			'timer': time
		});
		if ((typeof callback) === 'function') {
			setTimeout(callback, time);
		}
	},
	success: function(text, time, callback) {
		var defaultTime = 1500;
		if ((typeof time) === 'function') {
			callback = time;
			time = defaultTime;
		}
		time = time || defaultTime;
		swal({
			'title': '操作成功',
			'text': text,
			'type': 'success',
			'showConfirmButton': false,
			'timer': time
		});
		if ((typeof callback) === 'function') {
			setTimeout(callback, time);
		}
	},
	error: function(text, time, callback) {
		var defaultTime = 1500;
		if ((typeof time) === 'function') {
			callback = time;
			time = defaultTime;
		}
		time = time || defaultTime;
		swal({
			'text': text,
			'title': '操作失败',
			'type': 'error',
			'showConfirmButton': false,
			'timer': time
		});
		if ((typeof callback) === 'function') {
			setTimeout(callback, time);
		}
	},
	info: function(text, time, callback) {
		var defaultTime = 1500;
		if ((typeof time) === 'function') {
			callback = time;
			time = defaultTime;
		}
		time = time || defaultTime;
		swal({
			'title': '操作提示',
			'text': text,
			'type': 'info',
			'showConfirmButton': false,
			'timer': time
		});
		if ((typeof callback) === 'function') {
			setTimeout(callback, time);
		}
		//'error', 'warning', 'info', 'success'
	},
	confirm: function(text, url, data) {
		swal({
			title: text,
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			closeOnConfirm: false,
		},
			function() {
				Common.submit(url, data, 'reload');
			});

	},
	submit: function(url, data, location, redirectUrl) {

		$.ajax({
			type: 'post',
			url: url,
			data: {'arr': data},
			dataType: "json",
			success: function(response) {
				if (response.code == 0) {
					swal({
						title: "操作失败",
						text: response.message,
						type: "error",
					});
				} else {
					swal({
						title: "操作成功",
						text: response.message,
						type: "success",
						showConfirmButton: false,
						timer: 2000,
						location: location,
						redirectUrl: redirectUrl,
					});
				}
			},
			error: function(response) {
				swal({
					title: "操作失败",
					text: response.message,
					type: "error",
				});
			}
		});
	},
};
