function createXmlHttpRequest() {
	try {
		return new window.XMLHttpRequest(); 
	} catch (e) {
		try {
			return new window.ActiveXObject("Microsoft.XMLHTTP");
		} catch (e) {
			throw new Error("您的浏览器不支持AJAX！");
		}
	}
}

//标志当前会话
if(!sessionStorage.getItem('sessionId')) {
	sessionStorage.setItem('sessionId', md5(Date.parse(new Date()).toString()));
}

function Uploader() {
	
	this.sessionId = sessionStorage.getItem('sessionId');
	
	this.options = {
			
		//上传文件
		file : null,
		
		//表单数据
		data : {},
			
		//容器标识
		wrapper : null,
		
		onloadstart : false,
		
		onload : false,
		
		onloadend : false,
		
		onprogress : false,
		
		oncomplete : false,
		
		onabort : false,
		
		onerror : false
	};
	
	
	//视频标识
	this.videoId = 0;
	
	//视频文件名
	this.fileName = '';

	//视频标题
	this.title = '';
	
	//视频标识验证token
	this.token = '';
	
	//上传标识
	this.uploadId = 0;
	
	//上传地址
	this.uploadURL = null;
	
	//上传分片状态地址
	this.stateURL = null;
	
	//XMLHttpRequest
	this.XHR = createXmlHttpRequest();
	
	//会话标识
	this.fileId = null;
	
	//暂停
	this.pausing = false;
	
	//已发送位置
	this.position = 0;
	
	//包字节数
	this.packet = 5 * 1024 * 1024;
	
	this.buffer = null;
	
	this.file = function() {
		this.options.file = arguments[0];
		return this;
	};
	
	this.data = function() {
		this.options.data = arguments[0];
		return this;
	};
	
	this.wrapper = function() {
		this.options.wrapper = arguments[0];
		return this;
	};
	
	this.onloadstart = function() {
		this.options.onloadstart = arguments[0];
		return this;
	};
	
	this.onload = function() {
		this.options.onload = arguments[0];
		return this;
	};
	
	this.onloadend = function() {
		this.options.onloadend = arguments[0];
		return this;
	};
	
	this.onprogress = function() {
		this.options.onprogress = arguments[0];
		return this;
	};
	
	this.oncomplete = function() {
		this.options.oncomplete = arguments[0];
		return this;
	};
	
	this.onabort = function() {
		this.options.onabort = arguments[0];
		return this;
	};
	
	this.onerror = function() {
		this.options.onerror = arguments[0];
		return this;
	};
	
};

Uploader.prototype.execute = function() {

	var pairs = this.options.file.name.split('.');
	pairs.length > 1 && pairs.pop();
	
	this.fileName = pairs.join('.');
	this.title = this.fileName;
	this.fileId = md5(this.options.file.name);
	
	this.packet = (this.options.file.size / 99) > this.packet ? Math.ceil(this.options.file.size / 99) : this.packet;
	
	if($('#'+ this.fileId).length) {
		this.ifAllCompleted();
		return;
	}
	
	var process = localStorage.getItem(this.fileId);
	try {
		process = $.parseJSON(process);
		
		this.videoId = process.videoId;
		this.token = process.token;
		this.uploadURL = process.uploadURL;
		this.stateURL = process.stateURL;
		
		console.log('Process');
		console.log(process);
	} catch(e) {
		console.log('Process is null.');
	}
	
	if(this.videoId && this.token && this.uploadURL && this.stateURL) {
		console.log('Continue the process: video_id:'+ this.videoId +'.');
		this.render();
		this.resume();
	} else {
		console.log('Start a new process.');
		this.getVideoId();
	}
	
	return this;
};

/**
 * 获取video_id
 * response: {"code":"1","message":"Ok","data":{"video_id":249291803,"token":"ff4e4eeae3ea05e36ec239b1a47dc7ca"}}
 */
Uploader.prototype.getVideoId = function() {
	var instance = this;
	var videoIdURL = '/video/getVideoId?_=' + new Date().getTime();
	
	$.ajax({
		async : false,
		url : videoIdURL,
		data : {},
		type : 'get',
		dataType : 'json',
		success : function(response) {
			if(response.code != '1') {
				throw new Error(response.message);
			}
			
			instance.videoId = response.data['video_id'];
			instance.token = response.data['token'];
			
			console.log('Get video_id: '+ response.message +', video_id:'+ instance.videoId +'.');
			instance.render();
			instance.create();
		},
		error : function(xhr, status, message) {
			console.log('status: '+ status +'; message:'+ message);
		}
	});
};

/**
 * 创建视频
 * response: {"upload_url":"http:\/\/172.16.42.84\/u1_2_upload?upload_id=2015020017049","upload_id":"2015020017049","state_url":"http:\/\/172.16.42.84\/out\/tmp\/","image_url":"http:\/\/172.16.42.84\/out\/tmp\/"}
 */
Uploader.prototype.create = function() {
	var instance = this;
	var createURL = '/video/create';
	
	//初始位置 0
	this.position = 0;
	
	var values = this.options.data;
	values.video_id = this.videoId;
	values.token = this.token;
	values.title = this.title;
	values.file_name = this.fileName;
	values.file_size = this.options.file.size;
	
	$.ajax({
		async : false,
		url : createURL,
		data : values,
		type : 'post',
		dataType : 'json',
		success : function(response) {
			if(response.code != '1') {
				localStorage.removeItem(instance.fileId);
				throw new Error(response.message);
			}

			instance.uploadURL = response.data.upload_url;
			instance.stateURL = response.data.state_url;
			
			//保存会话
			localStorage.setItem(instance.fileId, '{"videoId":'+ instance.videoId+',"token":"'+ instance.token +'","uploadURL":"'+ instance.uploadURL +'","stateURL":"'+ instance.stateURL +'"}');
			console.log('Create video: '+ response.message +', video_id:'+ instance.videoId +'.');

			instance.send();
		},
		error : function(xhr, status, message) {
			console.log('status: '+ status +'; message:'+ message);
		}
	});
};

/**
 * 续传
 */
Uploader.prototype.resume = function() {
	var instance = this;
	var crossURL = '/video/cross';
	
	var xhr = createXmlHttpRequest();
	var url = crossURL +'?stateURL='+ instance.stateURL + '/' +instance.videoId +'.state&_=' + new Date().getTime();
	
	xhr.open('GET', url, true);
	xhr.send(null);
	
	xhr.onreadystatechange = function() {
		if(xhr.readyState == 4 && xhr.status == 200) {
			instance.pausing = false;
			
			var lines = xhr.responseText; //0-1105431227/1658146816
			if(lines.length == 0) {
				instance.position = 0;
				console.log('0/'+ instance.options.file.size);
				instance.send();
				return;
			}
			
			var ranges = lines.split("\r\n");
			if(ranges.length == 0) {
				instance.position = 0;
				console.log('0/'+ instance.options.file.size);
				instance.send();
				return;
			}
			
			var range = ranges[ranges.length - 1].split("/");
			var positions = range[0].split("-");
			
			instance.position = parseInt(positions[1]) + 1;
			console.log('0-'+ instance.position +'/'+ instance.options.file.size);
			
			instance.send();
			return;
		}
	};

	console.log('Resume');
};

/**
 * 渲染元素
 */
Uploader.prototype.render = function() {
	var instance = this;
	if($('#'+ this.fileId).length != 0) {
		return;
	}
	
	var container = $('<div id="'+ this.fileId +'" status="loading" style="display:block;width:500px;clear:both;"></div>');
	
	var infoNode = $('<div id="info-'+ this.videoId +'" name="info" style="display:block;"><input name="info" type="hidden" filename="' + this.options.file.name + '" video_id="' + this.videoId + '"/></div>');
	var fileInfo = $('<span id="name-'+ this.videoId +'" style="font-size:14px;font-weight:700;display:inline-block;overflow:hidden;max-width:400px;">'+ this.title +'</span>');
	var pauseButton = $('<span id="pause-'+ this.videoId +'" class="label label-success" style="cursor:pointer;margin-left:3px;"> 暂停 </span>');
	var deleteButton = $('<span id="delete-'+ this.videoId +'" class="label label-danger" style="cursor:pointer;margin-left:3px;"> 删除 </span>');
	
	var progressNode = $('<div id="progress-'+ this.videoId +'" class="progress" style="margin-top:10px;height:12px;"></div>');
	var progressBackground = $('<div name="Progress" class="progress-bar" aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" role="progressbar"></div>');
	var progressNumber = $('<span name="Number" style="float:right;margin-right:10px;font-size:9px;line-height:12px;">0.00%</span>');
	
	fileInfo.appendTo(infoNode);
	pauseButton.appendTo(infoNode);
	deleteButton.appendTo(infoNode);
	
	progressNumber.appendTo(progressBackground);
	progressBackground.appendTo(progressNode);
	
	infoNode.appendTo(container);
	progressNode.appendTo(container);
	
	container.appendTo($('#'+ this.options.wrapper));
	
	pauseButton.bind('click', function() {
		if(instance.pausing) {
			pausing = false;
			$(this).html(' 暂停 ');
			instance.resume();
		} else {
			instance.pausing = true;
			$(this).html(' 继续 ');
			instance.pause();
		}
	});
	
	deleteButton.bind('click', function() {
		var that = this;
		swal({
			title : '确定删除吗？',
			type : "warning",
			showCancelButton : true,
			confirmButtonClass : "btn-danger",
			closeOnConfirm : true,
		},
		function() {
			$(that).parents('.video-form').remove();
			if (!$('.video-form').length) {
				$('.saveBtn').hide();
				window.onbeforeunload = null;
			}
			instance.cancel();
		});
	});
};

Uploader.prototype.progress = function(byteLength) {
	var progress = (this.position + byteLength) / this.options.file.size * 100;
	progress = progress > 100 ? 100 : progress;
	
	$('#progress-'+ this.videoId +' [name="Progress"]').attr('aria-valuenow', progress.toFixed(2)).css('width', progress.toFixed(2) +'%');
	$('#progress-'+ this.videoId +' [name="Number"]').html(progress.toFixed(2) +'%');
};

/**
 * 发送
 */
Uploader.prototype.send = function() {
	var instance = this;
	if(this.pausing) {
		return;
	}
	 
	if(instance.position > instance.options.file.size) {
		instance.complete();
		return;
	}
	
	function send(offset) {
		
		instance.XHR.open('POST', instance.uploadURL, true);

		instance.XHR.setRequestHeader("X-Session-ID", instance.videoId);
		instance.XHR.setRequestHeader("X-Position", instance.options.data.position);
		instance.XHR.setRequestHeader("Content-Type", "application/octet-stream");
		instance.XHR.setRequestHeader("Content-Disposition", "attachment; name=\"video\"; filename=\""+ escape(instance.options.file.name) +"\"");
		instance.XHR.setRequestHeader("X-Content-Range", "bytes "+ instance.position +"-"+ (offset - 1) +"/"+ instance.options.file.size);
		
		instance.XHR.onreadystatechange = function() {
			if(instance.XHR.readyState == 4) {
				var status = instance.XHR.status;
				if(status == 200) {
					instance.progress(offset);
					instance.complete();
					return;
				} else if(status == 201) {
					instance.position = offset;
					instance.send();
					return;
				} else {
					if(status != 0) {
						Common.alert('服务器异常（'+ status +')');
					}
					return;
				}
			}
		};
		
		instance.XHR.send(instance.buffer);
		
		instance.XHR.upload.onloadstart = function(event) {
			if(instance.options.onloadstart) {
				eval('instance.options.onloadstart');
			}
			console.log('send.loadstart');
		};
		instance.XHR.upload.onload = function(event) {
			instance.progress(event.loaded);
			
			if(instance.options.onload) {
				eval('instance.options.onload');
			}
			console.log('send.load');
		};
		instance.XHR.upload.onloadend = function(event) {
			if(instance.options.onloadend) {
				eval('instance.options.onloadend');
			}
			console.log('send.loadend');
		};
		instance.XHR.upload.onabort = function() {
			if(instance.options.onabort) {
				eval('instance.options.onabort');
			}
			console.log('send.abort');
		};
		instance.XHR.upload.onprogress = function(event) {
			instance.progress(event.loaded);
			
			if(instance.options.onprogress) {
				eval('instance.options.onprogress');
			}
			console.log('send.progress');
		};
		instance.XHR.upload.onerror = function(event) {
			if(instance.options.onerror) {
				eval('instance.options.onerror');
			}
			console.log('send.error');
		};
		instance.XHR.upload.ontimeout = function(event) {
			if(instance.options.ontimeout) {
				eval('instance.options.ontimeout');
			}
			console.log('send.timeout');
		};
	}
	
	function read(offset) {

		var blob = null;
		
		if(instance.options.file.slice){
			blob = instance.options.file.slice(instance.position, offset);
		}
		if(instance.options.file.webkitSlice) {
			blob = instance.options.file.webkitSlice(instance.position, offset);
		}
		if(instance.options.file.mozSlice) {
			blob = instance.options.file.mozSlice(instance.position, offset);
		}
		
		if(blob == null) {
			throw new Error('Slice Blob error.');
		}
		instance.buffer = blob;
		send(offset);
		return;
	};
	
	var offset = (instance.position + instance.packet) > instance.options.file.size ? instance.options.file.size : (instance.position + instance.packet);

	//开始读数据
	read(offset);
	
	//记录上传
	var items = localStorage.getItem(instance.sessionId);
	items = $.parseJSON(items) || {};
	items[instance.videoId] = 0;
	
	localStorage.setItem(instance.sessionId, $.toJSON(items));
};

Uploader.prototype.complete = function() {
	var instance = this;
	$.ajax({
		async : false,
		url : '/video/uploadFinish',
		data : {'video_id' : this.videoId},
		type : 'post',
		dataType : 'json',
		success : function(response) {
			new PNotify({
				title: '上传成功！',
				text: instance.options.file.name,
				type: 'success'
			});
			
			$('#pause-'+ instance.videoId).unbind();
			
			var items = localStorage.getItem(instance.sessionId);
			items = $.parseJSON(items) || {};
			items[instance.videoId] = 1;
			localStorage.setItem(instance.sessionId, $.toJSON(items));
			
			instance.ifAllCompleted();
		}
	});

	localStorage.removeItem(this.fileId);
	
	if(this.options.oncomplete) {
		eval('this.options.oncomplete');
	}

	console.log('Uploader.complete');
};

Uploader.prototype.pause = function() {
	this.pausing = true;
	this.XHR.abort();
	console.log('Uploader.pause');
};

Uploader.prototype.cancel = function() {
	var instance = this;
	
	this.XHR.abort();
	
	$.ajax({
		async : false,
		url : '/video/uploadCancel',
		data : {'video_id' : this.videoId},
		type : 'post',
		dataType : 'json',
		success : function(response) {
			console.log('Canceled');
			
			var items = localStorage.getItem(instance.sessionId);
			items = $.parseJSON(items) || {};
			delete items[instance.videoId];
			localStorage.setItem(instance.sessionId, $.toJSON(items));
			
			instance.ifAllCompleted();
		}
	});

	localStorage.removeItem(this.fileId);
	$('#' + this.fileId).parents('.video-form').remove();
	$('#'+ this.fileId).remove();
	console.log('Canceled');
};

Uploader.prototype.ifAllCompleted = function() {
	//var editAfterUploadURL = '/video/editAfterUpload';
	var videoIds = [];
	var items = localStorage.getItem(this.sessionId);
	items = $.parseJSON(items);
	
	for(var videoId in items) {
		if(!items[videoId]) {
			return;
		}
		videoIds.push(videoId);
	}
	if(videoIds.length == 0) {
		return;
	}
//
//	$.fancybox({
//		'minWidth' : 600,
//		'minHeight' : 400,
//		'width' : '85%',
//		'height' : '90%',
//		'autoSize' : false,
//		'closeBtn' : false,
//		'closeClick' : false,
//		'type' : 'iframe',
//		'href' : editAfterUploadURL + '?video_ids=' + videoIds.join(','),
//		'helpers' : {
//			'overlay' : {
//				'closeClick' : false
//			}
//		}
//	});
};

