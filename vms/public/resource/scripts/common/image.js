var Imageupload = {

	//截图坐标
	coords: null,

	//图片ID
	id: 0,

	//图片上传地址
	uploadUrl: '',

	//图片更新地址
	updateUrl: '',

	//图片类型
	mime: 'image/jpeg',

	//截图比例
	ratio: 4/3,

	//初始化截图框尺寸
	select: [0, 0, 400, 300],

	//截图尺寸
	dimensions: {},

	//截图数据
	images: [],

	//浏览ID
	browseId: '',

	//文件ID
	fileId: '',

	//截图ID
	screenshotId: '',

	//图片ID
	targetId: '',

	//预览模块ID
	previewId: '',

	//图片属性
	attribute: '',

	//在fancybox中
	inFancybox : false,

	//添加图片
	addfile : function() {

		var element = document.getElementById(Imageupload.fileId);
		var file = element.files[0];

		if(!file.type.match('image.*')) {
			Common.alert('图片格式有误，请重新选择');
			return false;
		}

		var canvas = document.createElement("canvas");
		var context = canvas.getContext("2d");
		var img = new Image;
		img.src = URL.createObjectURL(file);

		img.onload = function() {
			var width = this.width;
			var height = this.height;

			var wdthHghtRatio = height/width;

			if(Number(width) > 900) {
				width = 900;
				height = Math.round(Number(900) * wdthHghtRatio);
			}

			canvas.width = width;
			canvas.height = height;
			context.drawImage(img, 0, 0, width, height);

			var canvasToDtaUrl = canvas.toDataURL(Imageupload.mime);
			document.getElementById(Imageupload.targetId).innerHTML = "<img src='" + canvasToDtaUrl + "'>";

			Imageupload.initCrop();
		};

		$('#'+Imageupload.screenshotId).removeClass("disabled");
		$('#'+Imageupload.uploadId).addClass("disabled");
	},

	//截图
	screenshot : function() {

		var dimensions = this.dimensions;
		var coords = this.coords;
		if(!coords) {
			Common.alert("添加图片并选择截图区域");
		}

		var image = new Image();

		for(type in dimensions) {
			var width = dimensions[type]['width'];
			var height = dimensions[type]['height'];

			var canvas = $('<canvas/>');
			var context = canvas[0].getContext("2d");

			canvas.attr("width", width).attr("height", height);
			image.src = $('#'+Imageupload.targetId+' > img').attr('src');

			context.drawImage(image, coords.x, coords.y, coords.w, coords.h, 0, 0, width, height);

			$('#'+Imageupload.previewId+'_'+type).html(canvas);
		}

		$('#'+Imageupload.uploadId).removeClass("disabled");
	},

	//上传
	upload : function() {

		this.images = [];

		var image = {
			'type': 'original',
			'data': $('#'+Imageupload.targetId+' > img').attr('src'),
		}
		this.images.push(image);

		for(type in this.dimensions) {
			var image = {
				'type': type,
				'data': $('#'+Imageupload.previewId+'_'+type+' > canvas')[0].toDataURL(this.mime),
			}
			this.images.push(image);
		}

		Imageupload.startUpload();
		Imageupload.uploadImage();
	},

	//上传图片
	uploadImage: function() {

		if(this.images.length == 0) {
			Imageupload.updateImage();
			return;
		}
		var id = this.id;
		var url = this.uploadUrl;
		var attribute = this.attribute;
		var image = this.images.pop();
		var type = image.type
		var imageData = image.data

		$.ajax({
			type : 'post',
			dataType : 'json',
			url : url,
			data : {
				'id': id,
				'type': type,
				'attribute':attribute,
				'image_data': imageData,
			},
			success : function(response) {
				if(response.code==0){
					Imageupload.endUpload();
					console.log(response.messages);
					Common.alert("上传失败");
				} else {
					Imageupload.uploadImage();
				}
			},
			error : function(response) {
				Imageupload.endUpload();
				Common.alert('上传失败');
			}
		});
	},

	//更新图片地址
	updateImage: function() {

		var id = this.id;
		var url = this.updateUrl;
		var mime = this.mime;
		var attribute = this.attribute;

		$.ajax({
			type : 'post',
			dataType : 'json',
			url : url,
			data : {
				'id': id,
				'mime': mime,
				'attribute':attribute,
			},
			success : function(response) {
				$('#'+Imageupload.previewId).modal('hide')
				Imageupload.endUpload();
				if(response.code==0){
					console.log(response.messages);
					Common.alert("上传失败", true);
				} else {
					//Common.alert("上传成功", true);
					swal({
						title: "上传成功",
						type: "success",
						closeOnConfirm: false,
						timer: 2000,
					});

					if(Imageupload.inFancybox) {
						setTimeout(function(){parent.$.fancybox.close();}, 2000);
					} else if(response.redirect) {
						setTimeout(function(){location.href = response.redirect;}, 2000);
					}
				}
			},
			error : function(response) {
				$('#'+Imageupload.previewId).modal('hide')
				Imageupload.endUpload();
				Common.alert('上传失败', true);
			}
		});
	},

	//初始化截图坐标
	initCoords: function() {
		Imageupload.coords = null;
	},

	//重置截图坐标
	resetCoords: function() {
		Imageupload.coords = null;
	},

	//获取截图坐标
	showCoords: function(coords) {
		Imageupload.coords = coords;
	},

	//初始化截图
	initCrop: function() {
		Imageupload.initCoords;

		$('#'+Imageupload.targetId+' > img').Jcrop({
				//minSize: [260,195],
				aspectRatio: Imageupload.ratio,
				setSelect: Imageupload.select,
				onSelect: Imageupload.showCoords,
				onChange: Imageupload.showCoords,
				onRelease: Imageupload.resetCoords,
		});
	},

	//开始上传
	startUpload: function() {
		$('#'+Imageupload.browseId).addClass("disabled");
		$('#'+Imageupload.screenshotId).addClass("disabled");
		$('#'+Imageupload.uploadId).addClass("disabled");
		$('#'+Imageupload.uploadId+' > span').text("上传中...");
	},

	//结束上传
	endUpload: function() {
		$('#'+Imageupload.browseId).removeClass("disabled");
		$('#'+Imageupload.screenshotId).removeClass("disabled");
		$('#'+Imageupload.uploadId).removeClass("disabled");
		$('#'+Imageupload.uploadId+' > span').text("上传");
	},

	//设置参数
	setParams: function(params) {
		Imageupload.id = params.id;
		Imageupload.uploadUrl = params.uploadUrl;
		Imageupload.updateUrl = params.updateUrl;
		Imageupload.ratio = params.ratio;
		Imageupload.select = params.select;
		Imageupload.dimensions = params.dimensions;
		Imageupload.attribute = params.attribute;

		Imageupload.browseId = params.browseId;
		Imageupload.fileId = params.fileId;
		Imageupload.screenshotId = params.screenshotId;
		Imageupload.targetId = params.targetId;
		Imageupload.previewId = params.previewId;
		Imageupload.uploadId = params.uploadId;

		if(typeof params.uploadId != 'undefined') {
			Imageupload.inFancybox = params.inFancybox;
		}
	},
}

var ImageAutoUpload = {

	//图片类型
	mime: 'image/jpeg',

	//文件ID
	fileId: '',

	//图片ID
	targetId: '',

	//图片地址ID
	urlId: '',

	//图片宽度
	width: 0,

	//图片高度
	height: 0,

	//上传地址
	uploadUrl: '',

	//添加图片
	addFile: function() {
		var element = document.getElementById(ImageAutoUpload.fileId);
		var file = element.files[0];

		if(!file.type.match('image.*')) {
			Common.alert('图片格式有误，请重新选择');
			return false;
		}

		var canvas = document.createElement("canvas");
		var context = canvas.getContext("2d");
		var image = new Image;
		image.src = URL.createObjectURL(file);

		image.onload = function() {
			var width = ImageAutoUpload.width;
			var height = ImageAutoUpload.height;

			canvas.width = width;
			canvas.height = height;
			context.drawImage(image, 0, 0, width, height);

			var canvasToDtaUrl = canvas.toDataURL('image/jpeg');
			document.getElementById(ImageAutoUpload.targetId).innerHTML = "<div class='thumbnail'><img src='" + canvasToDtaUrl + "'></div>";
			//$('#'+ImageAutoUpload.targetId).innerHTML = "<div class='thumbnail'><img src='" + canvasToDtaUrl + "'></div>";

			ImageAutoUpload.uploadImage();	
		};
	},

	uploadImage: function() {

		var url = ImageAutoUpload.uploadUrl;
		var imageData = $('#'+ImageAutoUpload.targetId+' > div > img').attr('src');

		$.ajax({
			type : 'post',
			dataType : 'json',
			url : url,
			data : {
				'image_data': imageData,
			},
			success : function(response) {
				if(response.code==0){
					console.log(response.messages);
					Common.alert("上传失败");
				} else {
					var imageUrl = response.data.image_url;
					$('#'+ImageAutoUpload.urlId).val(imageUrl);
				}
			},
			error : function(response) {
				Common.alert('上传失败');
			}
		});
	},

	//设置参数
	setParams: function(params) {
		ImageAutoUpload.fileId = params.fileId;
		ImageAutoUpload.targetId = params.targetId;
		ImageAutoUpload.urlId = params.urlId;
		ImageAutoUpload.width = params.width;
		ImageAutoUpload.height = params.height;
		ImageAutoUpload.uploadUrl = params.uploadUrl;
	},
}
