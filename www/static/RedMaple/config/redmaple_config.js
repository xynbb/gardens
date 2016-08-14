$.RedMaple.config.load 					= {};
//初始化调用js
$.RedMaple.config.load.init 			= {};
$.RedMaple.config.load.init.js			= [];
$.RedMaple.config.load.init.js[0]		= $.RedMaple.jsPath+'/plugs/layer/layer.min.js';

//验证
$.RedMaple.config.load.validator 		= {};
$.RedMaple.config.load.validator.js 	= [];
$.RedMaple.config.load.validator.js[0] 	= $.RedMaple.jsPath+'/plugs/validation/jquery.validate.js';
$.RedMaple.config.load.validator.js[1] 	= $.RedMaple.jsPath+'/plugs/validation/additional-methods.js';
$.RedMaple.config.load.validator.js[2] 	= $.RedMaple.jsPath+'/plugs/validation/lib/messages_zh.js';
$.RedMaple.config.load.validator.js[3] 	= $.RedMaple.jsPath+'/config/validator_config.js';