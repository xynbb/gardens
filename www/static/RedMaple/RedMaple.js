jQuery(function ($){
	$.RedMaple	= {
					init:function()
					{	
						//获取RedMaple.js路径
						$.RedMaple.interior.getJsPath();
						//重写jQuery的Ajax
						$.ajax = $.RedMaple.ajax;
						//加载配置文件
						$.RedMaple.load.js($.RedMaple.jsPath+'/config/redmaple_config.js');
						$.RedMaple.load.js($.RedMaple.config.load.init.js);
					},
					config:{},
					jsPath:'',
					interior:
					{
						jQueryAjax:$.ajax,
						loadFiles:{},
						js:'RedMaple.min.js',
						getJsPath:function()
						{
							var js    = document.scripts;
							
							for(var i in js)
							{
								var src   = js[i].src;
								
								if(!src) continue;
								
								var index = src.indexOf($.RedMaple.interior.js);
								
								if(index>=0)
								{
									$.RedMaple.jsPath = src.substr(0,index-1);
									
									break;
								}
							}

							if($.RedMaple.jsPath=='') alert("请勿修改js类名！");
						}
					},
					load:{
							js:function(url,func)
							{
								var _url_key = "_"+$.RedMaple.md5($.RedMaple.json().stringify(url));

								if($.RedMaple.interior.loadFiles[_url_key])
									return true;
								else
									$.RedMaple.interior.loadFiles[_url_key] = true;
							
								if(typeof(url)=='object')
									var	urls = url;
								else
									var urls = url.split(",");
								
								for(var i in urls)
								{
									var _key = "_"+$.RedMaple.md5(urls[i]);
									
									if(!$.RedMaple.interior.loadFiles[_key])
										$.RedMaple.interior.loadFiles[_key] = true;
									else
										continue;

									var options = {type:"GET",url:urls[i]};
									
									if(func)
									{
										options.dataType = "script";
										options.success  = func;
										$.RedMaple.interior.jQueryAjax(options);
									}
									else
									{
										options.cache	= false;
										options.async	= false;
										eval($.RedMaple.interior.jQueryAjax(options).responseText);
									}
								}
							},
							css:function(url,func)
							{
								if($.RedMaple.interior.loadFiles["_"+$.RedMaple.md5(url)]) return true;
								
								var urls = url.split(",");
								
								for(var i in urls)
								{
									if(!$.RedMaple.interior.loadFiles["_"+$.RedMaple.md5(urls[i])])
										$.RedMaple.interior.loadFiles["_"+$.RedMaple.md5(urls[i])] = true;
									else
										continue;
									
									$("head").append('<link rel="stylesheet" href="'+urls[i]+'" />');
								}
								
								if(!$.RedMaple.interior.loadFiles["_"+$.RedMaple.md5(url)])
									$.RedMaple.interior.loadFiles["_"+$.RedMaple.md5(url)] = true;
							}
					},
					cookie:
					{
						write:function(b, c, d)
						{
							var e = "";
							if (d) 
							{
								e = new Date((new Date).getTime() + d*1000);
								e = "; expires=" + e.toGMTString();
							}
							document.cookie = b + "=" + escape(c) + e;
						},
						remove:function (b)
						{
							var c = new Date;
							c.setTime(c.getTime() - 1);
							document.cookie = b + "=; expires=" + c.toGMTString();
						},
						read:function (b)
						{
							var c = "";
							b = b + "=";
							if (document.cookie.length > 0)
							{
								offset = document.cookie.indexOf(b);
								if (offset != -1)
								{
									offset += b.length;
									end = document.cookie.indexOf(";", offset);
									if (end == -1)
										end = document.cookie.length;
									c = unescape(document.cookie.substring(offset, end));
								}
							}
							return c;
						}
					},
					form:function(form)
					{
						
						if(form)
							var _form = {index:0,url:$(form).attr('action'),values:{},form:$(form)};
						else
							var _form = {index:0,url:'',values:{},form:''};
						
						var _this = {
										set:function(a,b)
										{
											if(a && b) _form.values[a] = b;
											
											if(a && !b)
											{
												var a 		= $(a),
													name  	= a.attr('name'),
													value 	= a.val();
												
												if(name != undefined)
												{
													var s = name.indexOf('[]');
													
													if(s>-1)
													{
														name 				   = name.replace('[]','');
														_form.values[name] = _form.values[name]?_form.values[name]:new Array();
														_form.values[name].push(value);
													}
													else
													{
														_form.values[name] = value;
													}
												}
												else
												{
													_form.values[_form.index] = value;
													_form.index++;
												}
											}
											
											if(!a && b && b instanceof Object) $.extend(_form.values, b);

											return _this;
										},
										submit:function(fun)
										{
											if(!_form.url) return alert('form not find "action/url"！');

											_form.form.find(":input:not(:submit,:reset,:image,:button,[disabled],:radio,:checkbox,:file),:radio:checked,:checkbox:checked").each(function(i,v){ _this.set(v); });
																
											var options 	= {};
											
											options.url 	= _form.url;
											options.data	= _form.values;
											
											if(fun) options.success	= fun;
						
											return $.ajax(options);
										},
										search:function(pageNo)
										{
										
											var loading = _form.form.attr('loading');
												loading	= loading?loading:"#_loading";
											var result  = _form.form.attr('result');
												result	= result?result:"#_result";
											var loading = _form.form.attr('loading');
												loading	= loading?loading:"#_loading";
											var page 	= _form.form.attr('page');
												page	= page?""+page:"page";
											
											$(result).hide();
											$(loading).show();
											
											if($("#"+page).size()>0)
												$("#"+page).val(pageNo?pageNo:1);
											else
												_form.form.append('<input name="'+page+'" type="hidden" value="'+(pageNo?pageNo:1)+'"  autocomplete="off" id="'+page+'">');

											_this.submit(function(json){
												$(loading).hide();
												$(result).replaceWith(json.data).show();
											});
										},
										changeData:function(url,values,title,fun)
										{
											if(title && !confirm(title)) return false;
											
											var options 	= {};
											
											options.url 	= url;
											options.data	= values?values:{};
											options.success = function(json)
											{
												if(fun) return fun();
												
												if(json.status)
													layer.msg("<div style='text-align: center;font-size: 20px;font-weight: bold;color: green;padding: 10px 0 20px;'>"+json.data+"</div>", 1,{type:-1});
												else
													layer.msg("<span style='text-align: center;font-size: 20px;font-weight: bold;color: red;'>"+json.data+"</span>", 1);
											};
											
											$.ajax(options);
										}
									};
						
						return _this;
					},
					ajax:function(options)
					{
						if(options.jQuery) return $.RedMaple.interior.jQueryAjax(options);
						
						options.data	= options.data?$.extend(options.data, {ajax:1}):{ajax:1};
						
						options.cache	= options.cache?options.cache:false;
						options.type	= options.type?options.type:"POST";
						options.async	= options.async?options.async:false;
						
						
						if(options.async===false)
						{
							var success 	= options.success?options.success:false;
							
							options.success?delete options.success:'';
							
							var data 		= $.RedMaple.interior.jQueryAjax(options).responseText;
							
							try{	
								eval("data = "+data+";");
							}catch(e){
								alert("返回数据错误，请勿必返回json");
							}
							
							if(success) success(data);
							
							return data;
						}
						else
						{
							var success 	= options.success;

							options.success = function(data)
							{
								try{
									eval("data = "+data+";");
								}catch(e){
									alert("返回数据错误，请勿必返回json");
								}
								
								success(data);
							};
							
							$.RedMaple.interior.jQueryAjax(options);	
						}	
						
						
					},
					layer:
					{
						iframe:function(src,title)
					    {
							
							var options = {
											type: 2,
											closeBtn: [1,true],
											time:0,
											shade: [0.8, '#999'],
											border: [5, 0.3, '#000'],
											offset: ['20px',''],
											area: ['95%', ($(window).height() - 50) +'px']
										};
							
							if( typeof(src) == "object")
							{
								options = $.extend(options,src);
							}
							else
							{
								options.iframe = {src:src};
								options.title  = title?title:"修改";
							}
							
							var index = $.layer(options);
							
							return {close:function(){layer.close(index)}};
					    }
					},				    
					validator:function(options)
					{
						$.RedMaple.load.js($.RedMaple.config.load.validator.js);
						
						var config = $.RedMaple.config.validator;
						options    = (options&&typeof(options)=='object')?$.extend(config, options):config;
						
						$.validator.setDefaults(options);
													
						$(options.form).validate();	
					},
					md5: function(string)
					{
						var rotateLeft=function(lValue,iShiftBits){return(lValue<<iShiftBits)|(lValue>>>(32-iShiftBits))};var addUnsigned=function(lX,lY){var lX4,lY4,lX8,lY8,lResult;lX8=(lX&0x80000000);lY8=(lY&0x80000000);lX4=(lX&0x40000000);lY4=(lY&0x40000000);lResult=(lX&0x3FFFFFFF)+(lY&0x3FFFFFFF);if(lX4&lY4)return(lResult^0x80000000^lX8^lY8);if(lX4|lY4){if(lResult&0x40000000)return(lResult^0xC0000000^lX8^lY8);else return(lResult^0x40000000^lX8^lY8)}else{return(lResult^lX8^lY8)}};var F=function(x,y,z){return(x&y)|((~x)&z)};var G=function(x,y,z){return(x&z)|(y&(~z))};var H=function(x,y,z){return(x^y^z)};var I=function(x,y,z){return(y^(x|(~z)))};var FF=function(a,b,c,d,x,s,ac){a=addUnsigned(a,addUnsigned(addUnsigned(F(b,c,d),x),ac));return addUnsigned(rotateLeft(a,s),b)};var GG=function(a,b,c,d,x,s,ac){a=addUnsigned(a,addUnsigned(addUnsigned(G(b,c,d),x),ac));return addUnsigned(rotateLeft(a,s),b)};var HH=function(a,b,c,d,x,s,ac){a=addUnsigned(a,addUnsigned(addUnsigned(H(b,c,d),x),ac));return addUnsigned(rotateLeft(a,s),b)};var II=function(a,b,c,d,x,s,ac){a=addUnsigned(a,addUnsigned(addUnsigned(I(b,c,d),x),ac));return addUnsigned(rotateLeft(a,s),b)};var convertToWordArray=function(string){var lWordCount;var lMessageLength=string.length;var lNumberOfWordsTempOne=lMessageLength+8;var lNumberOfWordsTempTwo=(lNumberOfWordsTempOne-(lNumberOfWordsTempOne%64))/64;var lNumberOfWords=(lNumberOfWordsTempTwo+1)*16;var lWordArray=Array(lNumberOfWords-1);var lBytePosition=0;var lByteCount=0;while(lByteCount<lMessageLength){lWordCount=(lByteCount-(lByteCount%4))/4;lBytePosition=(lByteCount%4)*8;lWordArray[lWordCount]=(lWordArray[lWordCount]|(string.charCodeAt(lByteCount)<<lBytePosition));lByteCount++}lWordCount=(lByteCount-(lByteCount%4))/4;lBytePosition=(lByteCount%4)*8;lWordArray[lWordCount]=lWordArray[lWordCount]|(0x80<<lBytePosition);lWordArray[lNumberOfWords-2]=lMessageLength<<3;lWordArray[lNumberOfWords-1]=lMessageLength>>>29;return lWordArray};var wordToHex=function(lValue){var WordToHexValue="",WordToHexValueTemp="",lByte,lCount;for(lCount=0;lCount<=3;lCount++){lByte=(lValue>>>(lCount*8))&255;WordToHexValueTemp="0"+lByte.toString(16);WordToHexValue=WordToHexValue+WordToHexValueTemp.substr(WordToHexValueTemp.length-2,2)}return WordToHexValue};var uTF8Encode=function(string){string=string.replace(/\x0d\x0a/g,"\x0a");var output="";for(var n=0;n<string.length;n++){var c=string.charCodeAt(n);if(c<128){output+=String.fromCharCode(c)}else if((c>127)&&(c<2048)){output+=String.fromCharCode((c>>6)|192);output+=String.fromCharCode((c&63)|128)}else{output+=String.fromCharCode((c>>12)|224);output+=String.fromCharCode(((c>>6)&63)|128);output+=String.fromCharCode((c&63)|128)}}return output};var x=Array();var k,AA,BB,CC,DD,a,b,c,d;var S11=7,S12=12,S13=17,S14=22;var S21=5,S22=9,S23=14,S24=20;var S31=4,S32=11,S33=16,S34=23;var S41=6,S42=10,S43=15,S44=21;string=uTF8Encode(string);x=convertToWordArray(string);a=0x67452301;b=0xEFCDAB89;c=0x98BADCFE;d=0x10325476;for(k=0;k<x.length;k+=16){AA=a;BB=b;CC=c;DD=d;a=FF(a,b,c,d,x[k+0],S11,0xD76AA478);d=FF(d,a,b,c,x[k+1],S12,0xE8C7B756);c=FF(c,d,a,b,x[k+2],S13,0x242070DB);b=FF(b,c,d,a,x[k+3],S14,0xC1BDCEEE);a=FF(a,b,c,d,x[k+4],S11,0xF57C0FAF);d=FF(d,a,b,c,x[k+5],S12,0x4787C62A);c=FF(c,d,a,b,x[k+6],S13,0xA8304613);b=FF(b,c,d,a,x[k+7],S14,0xFD469501);a=FF(a,b,c,d,x[k+8],S11,0x698098D8);d=FF(d,a,b,c,x[k+9],S12,0x8B44F7AF);c=FF(c,d,a,b,x[k+10],S13,0xFFFF5BB1);b=FF(b,c,d,a,x[k+11],S14,0x895CD7BE);a=FF(a,b,c,d,x[k+12],S11,0x6B901122);d=FF(d,a,b,c,x[k+13],S12,0xFD987193);c=FF(c,d,a,b,x[k+14],S13,0xA679438E);b=FF(b,c,d,a,x[k+15],S14,0x49B40821);a=GG(a,b,c,d,x[k+1],S21,0xF61E2562);d=GG(d,a,b,c,x[k+6],S22,0xC040B340);c=GG(c,d,a,b,x[k+11],S23,0x265E5A51);b=GG(b,c,d,a,x[k+0],S24,0xE9B6C7AA);a=GG(a,b,c,d,x[k+5],S21,0xD62F105D);d=GG(d,a,b,c,x[k+10],S22,0x2441453);c=GG(c,d,a,b,x[k+15],S23,0xD8A1E681);b=GG(b,c,d,a,x[k+4],S24,0xE7D3FBC8);a=GG(a,b,c,d,x[k+9],S21,0x21E1CDE6);d=GG(d,a,b,c,x[k+14],S22,0xC33707D6);c=GG(c,d,a,b,x[k+3],S23,0xF4D50D87);b=GG(b,c,d,a,x[k+8],S24,0x455A14ED);a=GG(a,b,c,d,x[k+13],S21,0xA9E3E905);d=GG(d,a,b,c,x[k+2],S22,0xFCEFA3F8);c=GG(c,d,a,b,x[k+7],S23,0x676F02D9);b=GG(b,c,d,a,x[k+12],S24,0x8D2A4C8A);a=HH(a,b,c,d,x[k+5],S31,0xFFFA3942);d=HH(d,a,b,c,x[k+8],S32,0x8771F681);c=HH(c,d,a,b,x[k+11],S33,0x6D9D6122);b=HH(b,c,d,a,x[k+14],S34,0xFDE5380C);a=HH(a,b,c,d,x[k+1],S31,0xA4BEEA44);d=HH(d,a,b,c,x[k+4],S32,0x4BDECFA9);c=HH(c,d,a,b,x[k+7],S33,0xF6BB4B60);b=HH(b,c,d,a,x[k+10],S34,0xBEBFBC70);a=HH(a,b,c,d,x[k+13],S31,0x289B7EC6);d=HH(d,a,b,c,x[k+0],S32,0xEAA127FA);c=HH(c,d,a,b,x[k+3],S33,0xD4EF3085);b=HH(b,c,d,a,x[k+6],S34,0x4881D05);a=HH(a,b,c,d,x[k+9],S31,0xD9D4D039);d=HH(d,a,b,c,x[k+12],S32,0xE6DB99E5);c=HH(c,d,a,b,x[k+15],S33,0x1FA27CF8);b=HH(b,c,d,a,x[k+2],S34,0xC4AC5665);a=II(a,b,c,d,x[k+0],S41,0xF4292244);d=II(d,a,b,c,x[k+7],S42,0x432AFF97);c=II(c,d,a,b,x[k+14],S43,0xAB9423A7);b=II(b,c,d,a,x[k+5],S44,0xFC93A039);a=II(a,b,c,d,x[k+12],S41,0x655B59C3);d=II(d,a,b,c,x[k+3],S42,0x8F0CCC92);c=II(c,d,a,b,x[k+10],S43,0xFFEFF47D);b=II(b,c,d,a,x[k+1],S44,0x85845DD1);a=II(a,b,c,d,x[k+8],S41,0x6FA87E4F);d=II(d,a,b,c,x[k+15],S42,0xFE2CE6E0);c=II(c,d,a,b,x[k+6],S43,0xA3014314);b=II(b,c,d,a,x[k+13],S44,0x4E0811A1);a=II(a,b,c,d,x[k+4],S41,0xF7537E82);d=II(d,a,b,c,x[k+11],S42,0xBD3AF235);c=II(c,d,a,b,x[k+2],S43,0x2AD7D2BB);b=II(b,c,d,a,x[k+9],S44,0xEB86D391);a=addUnsigned(a,AA);b=addUnsigned(b,BB);c=addUnsigned(c,CC);d=addUnsigned(d,DD)}var tempValue=wordToHex(a)+wordToHex(b)+wordToHex(c)+wordToHex(d);return tempValue.toLowerCase();
					},
					json:function()
					{
						var JSON;if(!JSON)JSON={};(function(){"use strict";function f(a){return a<10?"0"+a:a}if(typeof Date.prototype.toJSON!=="function"){Date.prototype.toJSON=function(){return isFinite(this.valueOf())?this.getUTCFullYear()+"-"+f(this.getUTCMonth()+1)+"-"+f(this.getUTCDate())+"T"+f(this.getUTCHours())+":"+f(this.getUTCMinutes())+":"+f(this.getUTCSeconds())+"Z":null};String.prototype.toJSON=Number.prototype.toJSON=Boolean.prototype.toJSON=function(){return this.valueOf()}}var cx=/[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,escapable=/[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,gap,indent,meta={"\b":"\\b","\t":"\\t","\n":"\\n","\f":"\\f","\r":"\\r",'"':'\\"',"\\":"\\\\"},rep;function quote(a){escapable.lastIndex=0;return escapable.test(a)?'"'+a.replace(escapable,function(a){var b=meta[a];return typeof b==="string"?b:"\\u"+("0000"+a.charCodeAt(0).toString(16)).slice(-4)})+'"':'"'+a+'"'}function str(h,i){var c,e,d,f,g=gap,b,a=i[h];if(a&&typeof a==="object"&&typeof a.toJSON==="function")a=a.toJSON(h);if(typeof rep==="function")a=rep.call(i,h,a);switch(typeof a){case"string":return quote(a);case"number":return isFinite(a)?String(a):"null";case"boolean":case"null":return String(a);case"object":if(!a)return"null";gap+=indent;b=[];if(Object.prototype.toString.apply(a)==="[object Array]"){f=a.length;for(c=0;c<f;c+=1)b[c]=str(c,a)||"null";d=b.length===0?"[]":gap?"[\n"+gap+b.join(",\n"+gap)+"\n"+g+"]":"["+b.join(",")+"]";gap=g;return d}if(rep&&typeof rep==="object"){f=rep.length;for(c=0;c<f;c+=1)if(typeof rep[c]==="string"){e=rep[c];d=str(e,a);d&&b.push(quote(e)+(gap?": ":":")+d)}}else for(e in a)if(Object.prototype.hasOwnProperty.call(a,e)){d=str(e,a);d&&b.push(quote(e)+(gap?": ":":")+d)}d=b.length===0?"{}":gap?"{\n"+gap+b.join(",\n"+gap)+"\n"+g+"}":"{"+b.join(",")+"}";gap=g;return d}}if(typeof JSON.stringify!=="function")JSON.stringify=function(d,a,b){var c;gap="";indent="";if(typeof b==="number")for(c=0;c<b;c+=1)indent+=" ";else if(typeof b==="string")indent=b;rep=a;if(a&&typeof a!=="function"&&(typeof a!=="object"||typeof a.length!=="number"))throw new Error("JSON.stringify");return str("",{"":d})};if(typeof JSON.parse!=="function")JSON.parse=function(text,reviver){var j;function walk(d,e){var b,c,a=d[e];if(a&&typeof a==="object")for(b in a)if(Object.prototype.hasOwnProperty.call(a,b)){c=walk(a,b);if(c!==undefined)a[b]=c;else delete a[b]}return reviver.call(d,e,a)}text=String(text);cx.lastIndex=0;if(cx.test(text))text=text.replace(cx,function(a){return"\\u"+("0000"+a.charCodeAt(0).toString(16)).slice(-4)});if(/^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,"@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,"]").replace(/(?:^|:|,)(?:\s*\[)+/g,""))){j=eval("("+text+")");return typeof reviver==="function"?walk({"":j},""):j}throw new SyntaxError("JSON.parse");}})();
						
						return JSON;
					}
				};
						
	$.RedMaple.init();
});