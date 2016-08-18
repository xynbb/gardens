var Form = {

	messageBox : '#ServerMessageBox',
	
	callback : null,
	
	inFancybox : false,
	
	redirect : false,

	data : {},

	submit : function(element, inFancybox) {

		if(inFancybox) {
			Form.inFancybox = true;
		}
		
		function success(messages, data) {

			var text = messages.join("<br/>\n");
			var timer = 2000;

			swal({
				'title' : '操作成功',
				'text' : text,
				'type' : 'success',
				'showConfirmButton' : false,
				'timer' : timer,
				'location' : null,
			});

			if(Form.inFancybox) {
				setTimeout(function(){parent.$.fancybox.close();}, timer);
			}

			if(Form.callback != null) {
				eval('('+ Form.callback +'(Form.data)' +')');
				return;
			}

			if(redirect) {
				setTimeout(function(){
					if(Form.inFancybox) {
						parent.location.href=redirect;
					} else {
						location.href=redirect;
					}
				}, timer);
				return;
			}

			setTimeout(function(){
				if(Form.inFancybox) {
					parent.location.reload();
				} else {
					location.reload();
				}
			}, timer);
			return;	
		};

		//	Warning: 'alert alert-block';
		//	Error: 'alert alert-error alert-block';
		//	Info: 'alert alert-info alert-block';
		//	Success: 'alert alert-success alert-block';
		function failed(messages, data, redirect) {
			$(Form.messageBox).html('');

			$(Form.messageBox).removeClass('hide');
			$(Form.messageBox).addClass('alert alert-danger alert-dismissable');
			$(Form.messageBox).append('<a class="close" href="#" onclick="$(this).parent().hide();">×</a>');
			$(Form.messageBox).append('<h4 class="alert-heading">操作失败</h4>');

			var ul = $('<ul></ul>');
			for(var i = 0; i < messages.length; i++) {
				ul.append('<li>'+ messages[i] +'</li>');
			}
			$(Form.messageBox).append(ul);
			$(Form.messageBox).show();
			scrollTo(0,0);
		}
		
		function response(result, status) {
			if(status !== 'success') {
				$(Form.messageBox).html('');
				$(Form.messageBox).removeClass('hide');
				$(Form.messageBox).addClass('alert alert-danger alert-dismissable');
				$(Form.messageBox).append('<a class="close" href="#" onclick="$(this).parent().hide();">×</a>');
				$(Form.messageBox).append('<h4 class="alert-heading">操作失败</h4>');
				$(Form.messageBox).show();
				return false;
			}

			result = eval('('+ result +')');

			if(result.code == 0) {
				failed(result.messages, result.data, result.redirect);
			}

			if(result.code == 1) {
				success(result.messages, result.data, result.redirect);
			}
		};
		
		this.data = $(element).serializeArray();
		
		$(Form.messageBox).hide();
		$(element).ajaxSubmit({
			success : response,  // post-submit callback 
			dataType : null,		 // 'xml', 'script', or 'json' (expected server response type)
			timeout : 3000,
		}); 
		return false;
	}

};
