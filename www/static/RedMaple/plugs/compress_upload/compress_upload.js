/**
 * author:YY
 * 550798276@qq.com
 */
;var swfobject=function(){var D="undefined",r="object",S="Shockwave Flash",W="ShockwaveFlash.ShockwaveFlash",q="application/x-shockwave-flash",R="SWFObjectExprInst",x="onreadystatechange",O=window,j=document,t=navigator,T=false,U=[h],o=[],N=[],I=[],l,Q,E,B,J=false,a=false,n,G,m=true,M=function(){var aa=typeof j.getElementById!=D&&typeof j.getElementsByTagName!=D&&typeof j.createElement!=D,ah=t.userAgent.toLowerCase(),Y=t.platform.toLowerCase(),ae=Y?/win/.test(Y):/win/.test(ah),ac=Y?/mac/.test(Y):/mac/.test(ah),af=/webkit/.test(ah)?parseFloat(ah.replace(/^.*webkit\/(\d+(\.\d+)?).*$/,"$1")):false,X=!+"\v1",ag=[0,0,0],ab=null;
if(typeof t.plugins!=D&&typeof t.plugins[S]==r){ab=t.plugins[S].description;if(ab&&!(typeof t.mimeTypes!=D&&t.mimeTypes[q]&&!t.mimeTypes[q].enabledPlugin)){T=true;
X=false;ab=ab.replace(/^.*\s+(\S+\s+\S+$)/,"$1");ag[0]=parseInt(ab.replace(/^(.*)\..*$/,"$1"),10);ag[1]=parseInt(ab.replace(/^.*\.(.*)\s.*$/,"$1"),10);
ag[2]=/[a-zA-Z]/.test(ab)?parseInt(ab.replace(/^.*[a-zA-Z]+(.*)$/,"$1"),10):0;}}else{if(typeof O.ActiveXObject!=D){try{var ad=new ActiveXObject(W);if(ad){ab=ad.GetVariable("$version");
if(ab){X=true;ab=ab.split(" ")[1].split(",");ag=[parseInt(ab[0],10),parseInt(ab[1],10),parseInt(ab[2],10)];}}}catch(Z){}}}return{w3:aa,pv:ag,wk:af,ie:X,win:ae,mac:ac};
}(),k=function(){if(!M.w3){return;}if((typeof j.readyState!=D&&j.readyState=="complete")||(typeof j.readyState==D&&(j.getElementsByTagName("body")[0]||j.body))){f();
}if(!J){if(typeof j.addEventListener!=D){j.addEventListener("DOMContentLoaded",f,false);}if(M.ie&&M.win){j.attachEvent(x,function(){if(j.readyState=="complete"){j.detachEvent(x,arguments.callee);
f();}});if(O==top){(function(){if(J){return;}try{j.documentElement.doScroll("left");}catch(X){setTimeout(arguments.callee,0);return;}f();})();}}if(M.wk){(function(){if(J){return;
}if(!/loaded|complete/.test(j.readyState)){setTimeout(arguments.callee,0);return;}f();})();}s(f);}}();function f(){if(J){return;}try{var Z=j.getElementsByTagName("body")[0].appendChild(C("span"));
Z.parentNode.removeChild(Z);}catch(aa){return;}J=true;var X=U.length;for(var Y=0;Y<X;Y++){U[Y]();}}function K(X){if(J){X();}else{U[U.length]=X;}}function s(Y){if(typeof O.addEventListener!=D){O.addEventListener("load",Y,false);
}else{if(typeof j.addEventListener!=D){j.addEventListener("load",Y,false);}else{if(typeof O.attachEvent!=D){i(O,"onload",Y);}else{if(typeof O.onload=="function"){var X=O.onload;
O.onload=function(){X();Y();};}else{O.onload=Y;}}}}}function h(){if(T){V();}else{H();}}function V(){var X=j.getElementsByTagName("body")[0];var aa=C(r);
aa.setAttribute("type",q);var Z=X.appendChild(aa);if(Z){var Y=0;(function(){if(typeof Z.GetVariable!=D){var ab=Z.GetVariable("$version");if(ab){ab=ab.split(" ")[1].split(",");
M.pv=[parseInt(ab[0],10),parseInt(ab[1],10),parseInt(ab[2],10)];}}else{if(Y<10){Y++;setTimeout(arguments.callee,10);return;}}X.removeChild(aa);Z=null;H();
})();}else{H();}}function H(){var ag=o.length;if(ag>0){for(var af=0;af<ag;af++){var Y=o[af].id;var ab=o[af].callbackFn;var aa={success:false,id:Y};if(M.pv[0]>0){var ae=c(Y);
if(ae){if(F(o[af].swfVersion)&&!(M.wk&&M.wk<312)){w(Y,true);if(ab){aa.success=true;aa.ref=z(Y);ab(aa);}}else{if(o[af].expressInstall&&A()){var ai={};ai.data=o[af].expressInstall;
ai.width=ae.getAttribute("width")||"0";ai.height=ae.getAttribute("height")||"0";if(ae.getAttribute("class")){ai.styleclass=ae.getAttribute("class");}if(ae.getAttribute("align")){ai.align=ae.getAttribute("align");
}var ah={};var X=ae.getElementsByTagName("param");var ac=X.length;for(var ad=0;ad<ac;ad++){if(X[ad].getAttribute("name").toLowerCase()!="movie"){ah[X[ad].getAttribute("name")]=X[ad].getAttribute("value");
}}P(ai,ah,Y,ab);}else{p(ae);if(ab){ab(aa);}}}}}else{w(Y,true);if(ab){var Z=z(Y);if(Z&&typeof Z.SetVariable!=D){aa.success=true;aa.ref=Z;}ab(aa);}}}}}function z(aa){var X=null;
var Y=c(aa);if(Y&&Y.nodeName=="OBJECT"){if(typeof Y.SetVariable!=D){X=Y;}else{var Z=Y.getElementsByTagName(r)[0];if(Z){X=Z;}}}return X;}function A(){return !a&&F("6.0.65")&&(M.win||M.mac)&&!(M.wk&&M.wk<312);
}function P(aa,ab,X,Z){a=true;E=Z||null;B={success:false,id:X};var ae=c(X);if(ae){if(ae.nodeName=="OBJECT"){l=g(ae);Q=null;}else{l=ae;Q=X;}aa.id=R;if(typeof aa.width==D||(!/%$/.test(aa.width)&&parseInt(aa.width,10)<310)){aa.width="310";
}if(typeof aa.height==D||(!/%$/.test(aa.height)&&parseInt(aa.height,10)<137)){aa.height="137";}j.title=j.title.slice(0,47)+" - Flash Player Installation";
var ad=M.ie&&M.win?"ActiveX":"PlugIn",ac="MMredirectURL="+O.location.toString().replace(/&/g,"%26")+"&MMplayerType="+ad+"&MMdoctitle="+j.title;if(typeof ab.flashvars!=D){ab.flashvars+="&"+ac;
}else{ab.flashvars=ac;}if(M.ie&&M.win&&ae.readyState!=4){var Y=C("div");X+="SWFObjectNew";Y.setAttribute("id",X);ae.parentNode.insertBefore(Y,ae);ae.style.display="none";
(function(){if(ae.readyState==4){ae.parentNode.removeChild(ae);}else{setTimeout(arguments.callee,10);}})();}u(aa,ab,X);}}function p(Y){if(M.ie&&M.win&&Y.readyState!=4){var X=C("div");
Y.parentNode.insertBefore(X,Y);X.parentNode.replaceChild(g(Y),X);Y.style.display="none";(function(){if(Y.readyState==4){Y.parentNode.removeChild(Y);}else{setTimeout(arguments.callee,10);
}})();}else{Y.parentNode.replaceChild(g(Y),Y);}}function g(ab){var aa=C("div");if(M.win&&M.ie){aa.innerHTML=ab.innerHTML;}else{var Y=ab.getElementsByTagName(r)[0];
if(Y){var ad=Y.childNodes;if(ad){var X=ad.length;for(var Z=0;Z<X;Z++){if(!(ad[Z].nodeType==1&&ad[Z].nodeName=="PARAM")&&!(ad[Z].nodeType==8)){aa.appendChild(ad[Z].cloneNode(true));
}}}}}return aa;}function u(ai,ag,Y){var X,aa=c(Y);if(M.wk&&M.wk<312){return X;}if(aa){if(typeof ai.id==D){ai.id=Y;}if(M.ie&&M.win){var ah="";for(var ae in ai){if(ai[ae]!=Object.prototype[ae]){if(ae.toLowerCase()=="data"){ag.movie=ai[ae];
}else{if(ae.toLowerCase()=="styleclass"){ah+=' class="'+ai[ae]+'"';}else{if(ae.toLowerCase()!="classid"){ah+=" "+ae+'="'+ai[ae]+'"';}}}}}var af="";for(var ad in ag){if(ag[ad]!=Object.prototype[ad]){af+='<param name="'+ad+'" value="'+ag[ad]+'" />';
}}aa.outerHTML='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"'+ah+">"+af+"</object>";N[N.length]=ai.id;X=c(ai.id);}else{var Z=C(r);Z.setAttribute("type",q);
for(var ac in ai){if(ai[ac]!=Object.prototype[ac]){if(ac.toLowerCase()=="styleclass"){Z.setAttribute("class",ai[ac]);}else{if(ac.toLowerCase()!="classid"){Z.setAttribute(ac,ai[ac]);
}}}}for(var ab in ag){if(ag[ab]!=Object.prototype[ab]&&ab.toLowerCase()!="movie"){e(Z,ab,ag[ab]);}}aa.parentNode.replaceChild(Z,aa);X=Z;}}return X;}function e(Z,X,Y){var aa=C("param");
aa.setAttribute("name",X);aa.setAttribute("value",Y);Z.appendChild(aa);}function y(Y){var X=c(Y);if(X&&X.nodeName=="OBJECT"){if(M.ie&&M.win){X.style.display="none";
(function(){if(X.readyState==4){b(Y);}else{setTimeout(arguments.callee,10);}})();}else{X.parentNode.removeChild(X);}}}function b(Z){var Y=c(Z);if(Y){for(var X in Y){if(typeof Y[X]=="function"){Y[X]=null;
}}Y.parentNode.removeChild(Y);}}function c(Z){var X=null;try{X=j.getElementById(Z);}catch(Y){}return X;}function C(X){return j.createElement(X);}function i(Z,X,Y){Z.attachEvent(X,Y);
I[I.length]=[Z,X,Y];}function F(Z){var Y=M.pv,X=Z.split(".");X[0]=parseInt(X[0],10);X[1]=parseInt(X[1],10)||0;X[2]=parseInt(X[2],10)||0;return(Y[0]>X[0]||(Y[0]==X[0]&&Y[1]>X[1])||(Y[0]==X[0]&&Y[1]==X[1]&&Y[2]>=X[2]))?true:false;
}function v(ac,Y,ad,ab){if(M.ie&&M.mac){return;}var aa=j.getElementsByTagName("head")[0];if(!aa){return;}var X=(ad&&typeof ad=="string")?ad:"screen";if(ab){n=null;
G=null;}if(!n||G!=X){var Z=C("style");Z.setAttribute("type","text/css");Z.setAttribute("media",X);n=aa.appendChild(Z);if(M.ie&&M.win&&typeof j.styleSheets!=D&&j.styleSheets.length>0){n=j.styleSheets[j.styleSheets.length-1];
}G=X;}if(M.ie&&M.win){if(n&&typeof n.addRule==r){n.addRule(ac,Y);}}else{if(n&&typeof j.createTextNode!=D){n.appendChild(j.createTextNode(ac+" {"+Y+"}"));
}}}function w(Z,X){if(!m){return;}var Y=X?"visible":"hidden";if(J&&c(Z)){c(Z).style.visibility=Y;}else{v("#"+Z,"visibility:"+Y);}}function L(Y){var Z=/[\\\"<>\.;]/;
var X=Z.exec(Y)!=null;return X&&typeof encodeURIComponent!=D?encodeURIComponent(Y):Y;}var d=function(){if(M.ie&&M.win){window.attachEvent("onunload",function(){var ac=I.length;
for(var ab=0;ab<ac;ab++){I[ab][0].detachEvent(I[ab][1],I[ab][2]);}var Z=N.length;for(var aa=0;aa<Z;aa++){y(N[aa]);}for(var Y in M){M[Y]=null;}M=null;for(var X in swfobject){swfobject[X]=null;
}swfobject=null;});}}();return{registerObject:function(ab,X,aa,Z){if(M.w3&&ab&&X){var Y={};Y.id=ab;Y.swfVersion=X;Y.expressInstall=aa;Y.callbackFn=Z;o[o.length]=Y;
w(ab,false);}else{if(Z){Z({success:false,id:ab});}}},getObjectById:function(X){if(M.w3){return z(X);}},embedSWF:function(ab,ah,ae,ag,Y,aa,Z,ad,af,ac){var X={success:false,id:ah};
if(M.w3&&!(M.wk&&M.wk<312)&&ab&&ah&&ae&&ag&&Y){w(ah,false);K(function(){ae+="";ag+="";var aj={};if(af&&typeof af===r){for(var al in af){aj[al]=af[al];}}aj.data=ab;
aj.width=ae;aj.height=ag;var am={};if(ad&&typeof ad===r){for(var ak in ad){am[ak]=ad[ak];}}if(Z&&typeof Z===r){for(var ai in Z){if(typeof am.flashvars!=D){am.flashvars+="&"+ai+"="+Z[ai];
}else{am.flashvars=ai+"="+Z[ai];}}}if(F(Y)){var an=u(aj,am,ah);if(aj.id==ah){w(ah,true);}X.success=true;X.ref=an;}else{if(aa&&A()){aj.data=aa;P(aj,am,ah,ac);
return;}else{w(ah,true);}}if(ac){ac(X);}});}else{if(ac){ac(X);}}},switchOffAutoHideShow:function(){m=false;},ua:M,getFlashPlayerVersion:function(){return{major:M.pv[0],minor:M.pv[1],release:M.pv[2]};
},hasFlashPlayerVersion:F,createSWF:function(Z,Y,X){if(M.w3){return u(Z,Y,X);}else{return undefined;}},showExpressInstall:function(Z,aa,X,Y){if(M.w3&&A()){P(Z,aa,X,Y);
}},removeSWF:function(X){if(M.w3){y(X);}},createCSS:function(aa,Z,Y,X){if(M.w3){v(aa,Z,Y,X);}},addDomLoadEvent:K,addLoadEvent:s,getQueryParamValue:function(aa){var Z=j.location.search||j.location.hash;
if(Z){if(/\?/.test(Z)){Z=Z.split("?")[1];}if(aa==null){return L(Z);}var Y=Z.split("&");for(var X=0;X<Y.length;X++){if(Y[X].substring(0,Y[X].indexOf("="))==aa){return L(Y[X].substring((Y[X].indexOf("=")+1)));
}}}return"";},expressInstallCallback:function(){if(a){var X=c(R);if(X&&l){X.parentNode.replaceChild(l,X);if(Q){w(Q,true);if(M.ie&&M.win){l.style.display="block";
}}if(E){E(B);}}a=false;}}};}();

var JSON;if(!JSON)JSON={};(function(){"use strict";function f(a){return a<10?"0"+a:a}if(typeof Date.prototype.toJSON!=="function"){Date.prototype.toJSON=function(){return isFinite(this.valueOf())?this.getUTCFullYear()+"-"+f(this.getUTCMonth()+1)+"-"+f(this.getUTCDate())+"T"+f(this.getUTCHours())+":"+f(this.getUTCMinutes())+":"+f(this.getUTCSeconds())+"Z":null};String.prototype.toJSON=Number.prototype.toJSON=Boolean.prototype.toJSON=function(){return this.valueOf()}}var cx=/[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,escapable=/[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,gap,indent,meta={"\b":"\\b","\t":"\\t","\n":"\\n","\f":"\\f","\r":"\\r",'"':'\\"',"\\":"\\\\"},rep;function quote(a){escapable.lastIndex=0;return escapable.test(a)?'"'+a.replace(escapable,function(a){var b=meta[a];return typeof b==="string"?b:"\\u"+("0000"+a.charCodeAt(0).toString(16)).slice(-4)})+'"':'"'+a+'"'}function str(h,i){var c,e,d,f,g=gap,b,a=i[h];if(a&&typeof a==="object"&&typeof a.toJSON==="function")a=a.toJSON(h);if(typeof rep==="function")a=rep.call(i,h,a);switch(typeof a){case"string":return quote(a);case"number":return isFinite(a)?String(a):"null";case"boolean":case"null":return String(a);case"object":if(!a)return"null";gap+=indent;b=[];if(Object.prototype.toString.apply(a)==="[object Array]"){f=a.length;for(c=0;c<f;c+=1)b[c]=str(c,a)||"null";d=b.length===0?"[]":gap?"[\n"+gap+b.join(",\n"+gap)+"\n"+g+"]":"["+b.join(",")+"]";gap=g;return d}if(rep&&typeof rep==="object"){f=rep.length;for(c=0;c<f;c+=1)if(typeof rep[c]==="string"){e=rep[c];d=str(e,a);d&&b.push(quote(e)+(gap?": ":":")+d)}}else for(e in a)if(Object.prototype.hasOwnProperty.call(a,e)){d=str(e,a);d&&b.push(quote(e)+(gap?": ":":")+d)}d=b.length===0?"{}":gap?"{\n"+gap+b.join(",\n"+gap)+"\n"+g+"}":"{"+b.join(",")+"}";gap=g;return d}}if(typeof JSON.stringify!=="function")JSON.stringify=function(d,a,b){var c;gap="";indent="";if(typeof b==="number")for(c=0;c<b;c+=1)indent+=" ";else if(typeof b==="string")indent=b;rep=a;if(a&&typeof a!=="function"&&(typeof a!=="object"||typeof a.length!=="number"))throw new Error("JSON.stringify");return str("",{"":d})};if(typeof JSON.parse!=="function")JSON.parse=function(text,reviver){var j;function walk(d,e){var b,c,a=d[e];if(a&&typeof a==="object")for(b in a)if(Object.prototype.hasOwnProperty.call(a,b)){c=walk(a,b);if(c!==undefined)a[b]=c;else delete a[b]}return reviver.call(d,e,a)}text=String(text);cx.lastIndex=0;if(cx.test(text))text=text.replace(cx,function(a){return"\\u"+("0000"+a.charCodeAt(0).toString(16)).slice(-4)});if(/^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,"@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,"]").replace(/(?:^|:|,)(?:\s*\[)+/g,""))){j=eval("("+text+")");return typeof reviver==="function"?walk({"":j},""):j}throw new SyntaxError("JSON.parse");}})();

(function($){
		
	$.fn.compress_upload =  function(_settings)
	{
		var _this = $(this);
		
		var swfSize = _this.size();
		
		var method = [];
		
		for(var i=0;i<swfSize;i++){
			
			var id = 'compress_upload_'+new Date().getTime();
			
			var swf = '';
		
			if(typeof(_settings)=='undefined' || typeof(_settings)!='object') _settings = {};
			
			var settings = defaultSettings(_this);
			
			settings = $.extend(settings,_settings);
			
			$.each( settings, function(name, value){
				eval("settings."+name+" =  paramFormat(name,value);");
			});
			
			var  attribute = {
								buttonID:id,
								requestUrl:settings.requestUrl,
								auto:settings.auto,
								buttonCursor:settings.buttonCursor,
								buttonText:settings.buttonText,
								buttonCancelText:settings.buttonCancelText,
								buttonEnabled:settings.buttonEnabled,
								buttonCancelEnabled:settings.buttonCancelEnabled,
								buttonImage:settings.buttonImage,
								fileRequestName:settings.fileRequestName,
								fileMaxSize:settings.fileMaxSize,
								fileMaxNum:settings.fileMaxNum,
								fileTypeExts:settings.fileTypeExts,
								fileTypeDesc:settings.fileTypeDesc,
								fileMulti:settings.fileMulti,
								requestData:settings.requestData,
								method:settings.method,
								imageWidth:settings.imageWidth,
								imageHeight:settings.imageHeight,
								imageQuality:settings.imageQuality,
								compressImage:settings.compressImage,
								width:settings.width,
								height:settings.height,
								progressType:settings.progressType
							 };
							 
			var _event = {
						  onSWFReady:settings.onSWFReady,
						  onCancel:settings.onCancel,
						  onSWFReady:settings.onSWFReady,
						  onEnable:settings.onEnable,
						  onDisable:settings.onDisable,
						  onSelect:settings.onSelect,
						  onSelectError:settings.onSelectError,
						  onUploadStart:settings.onUploadStart,
						  onUploadError:settings.onUploadError,
						  onUploadComplete:settings.onUploadComplete,
						  onUploadSuccess:settings.onUploadSuccess,
						  onUploadEnd:settings.onUploadEnd,
						  onUploadProgress:settings.onUploadProgress,
						  onError:settings.onError,
						  onLoadEnd:function()
						  {
								swf = document.getElementById(id);
								$("#"+id).css({zIndex: 1,position:"absolute"});
								
								if($("#"+id).next('.compress_button').size()==0&&attribute.buttonImage!='')
								{
									$("#"+id).after('<input type="button" name="'+id+'_bg" name="'+id+'_bg" class="compress_button" value="'+attribute.buttonText+'" style="border:none;background: url('+attribute.buttonImage+') repeat scroll 0% 0% transparent; height: '+attribute.height+'px; width: '+attribute.width+'px; position: absolute;" />');
								}
						  }
						 };
						 
			eval("window."+id+" = _event;");
			
			_this.eq(0).hide().before('<div class="compress_upload" style="height: '+attribute.height+'px; width: '+attribute.width+'px;"><span id="'+id+'"></span></div>');
			
			var setRequestData = function(name,value)
			{
				if(value!='') swf.setRequestData(name,value);
				return method;
			};
			
			var _settings = function(name,value)
			{
				value = paramFormat(name,value);
				
				switch(name)
				{
					case 'buttonText':
					case 'buttonCancelText':
						$("#"+id).next().val(value);
					break;
					
					case 'buttonImage':
					alert(value);
						if(value!='')
						{
							var ImgObj = imgExists(value);
							
							ImgObj.onerror = function()
							{
								$("#"+id).next().remove();
								
								swf.settings(name,'');
							}
							
							ImgObj.onload = function()
							{
								$("#"+id).next().css({background:"url("+value+") repeat scroll 0% 0% transparent"});
								
								swf.settings(name,value);
							}
						}
						else
						{
							$("#"+id).next().remove();
							
							swf.settings(name,'');
						}
						
						return method;
					break;

					case 'width':
						$("#"+id).width(value).next().css({width:value+"px"}).parent().css({width:value+"px"});
					break;
					
					case 'height':
						$("#"+id).height(value).next().css({height:value+"px"}).parent().css({height:value+"px"});
					break;
					
					case 'buttonEnabled':
						$("#"+id).next().prop('disabled',(value=='true')?false:true);
					break;	
				}
				
				swf.settings(name,value);
				
				return method;
			};
			
			var upload = function()
			{
				swf.upload();
				return method;
			};
			
			var disable = function()
			{
				swfObject();
				swf.disable();
				return method;
			};
			
			var cancel = function()
			{
				swf.cancel();
				return method;
			};
			
			var stop = function()
			{
				swf.stop();
				return method;
			};
			
			var destroy = function()
			{
				$('#'+id).parent().remove();
				_this.show();
				settings.onDestroy();
			};
			
			if(swfSize>1){
		
				method[i] =    {
								setRequestData:setRequestData,
								settings:_settings,
								upload:upload,
								disable:disable,
								cancel:cancel,
								stop:stop,
								destroy:destroy
								};
							
			}else{
			
				method =    {
									setRequestData:setRequestData,
									settings:_settings,
									upload:upload,
									disable:disable,
									cancel:cancel,
									stop:stop,
									destroy:destroy
									};
			
			}
			
			if(attribute.buttonImage!=''){
			
				var ImgObj = imgExists(attribute.buttonImage);
				
				ImgObj.onerror = function()
				{
					attribute.buttonImage = '';
					swfobject.embedSWF(settings.swf,id, settings.width, settings.height, "10.0.0", settings.expressInstallSwfurl, attribute,(attribute.buttonImage!='')?{wmode:'transparent'}:{},{});	
				};
				
				ImgObj.onload = function()
				{
					swfobject.embedSWF(settings.swf,id, settings.width, settings.height, "10.0.0", settings.expressInstallSwfurl, attribute,(attribute.buttonImage!='')?{wmode:'transparent'}:{},{});	
				};
			
			}
			else
			{
				swfobject.embedSWF(settings.swf,id, settings.width, settings.height, "10.0.0", settings.expressInstallSwfurl, attribute,(attribute.buttonImage!='')?{wmode:'transparent'}:{},{});
			}
		
		}
		
		return method;
	};
	
	
	//文件大小格式化为数字单位(B)
	var formatSizeToNum = function(size)
	{
		size = size.replace(/\s+/g,"");
		
		unit = size.replace(/([\-\+1-9][0-9]*)([BKMG]*)/ig,"$2").toUpperCase();	
		
		size = Math.abs(parseInt(size.replace(/([\-\+1-9][0-9]*)([BKMG]*)/ig,"$1")));
		
		if(size=='') return 100*1024*1024;
		
		if(unit=='K'||unit=='KB') size = size*1024;
		
		if(unit=='M'||unit=='MB') size = (size<=100&&size>0)?size*1024*1024:100*1024*1024;
		
		if(unit=='G'||unit=='GB') size = (size<=100/1024&&size>0)?size*1024*1024*1024:100*1024*1024;
		
		return size;
	};
	
	//格式化参数
	var paramFormat = function(name,value)
	{
		switch(name)
		{
			case 'auto':
			
			case 'buttonEnabled':
			
			case 'buttonCancelEnabled':
				
			case 'fileMulti':
			
			case 'compressImage':
				value = value?'true':'false';
			break;
			
			case 'height':
			
			case 'width':
			
			case 'imageWidth':
			
			case 'imageHeight':
				 value = parseInt(value);
			break;
			
			case 'buttonCursor':
				value = (value=='hand')?'hand':'arrow';
			break;
			
			case 'fileRequestName':
				value = (value=='')?'Filedata':value;
			break;
			
			case 'method':
				value = value.toUpperCase();
				if(value!='POST' && value!='GET') value = 'POST';
			break;
			
			case 'requestData':
				if(value!='' && typeof(value)=='string')
				{
					var jsonObject = {};
					var requestDataArr = value.split("&");
					for(var i=0;i<requestDataArr.length;i++)
					{
						var p = requestDataArr[i].split("=");
						var a = p[0]?p[0]:'';
						var b = p[1]?p[1]:'';
						if(a!='') eval("jsonObject."+a+"='"+b+"';");
					}
					value = jsonObject;
				}
				if(value!='' && typeof(value)=='object') value = encodeURI(JSON.stringify(value));
			break;
			
			case 'fileMaxNum':
				 value  = parseInt(value)>1000?1000:parseInt(value);
			break;
			
			case 'imageQuality':
				 value  = (parseInt(value)>100 || parseInt(value)<0)?80:parseInt(value);
			break;
			
			case 'fileMaxSize':
				 value  = formatSizeToNum(value);
			break;
			
			case 'progressType':
				 if(!(value=='fileBytes' || value=='count' || value=='filesBytes')) value = 'fileBytes';
			break;
		};

		return value;
	};
	
	//加载图片
	var	imgExists = function(src) 
	{
		if(src=='') return false;
		var ImgObj = new Image(); //判断图片是否存在  
		ImgObj.src = src+"?"+Date.parse( new Date());
		var isImage = false; 
		return ImgObj;
	};
	
	//默认设置
	var defaultSettings = function(compress)
	{
		return {
				//属性----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
				auto:true,//是否自动上传
				buttonCursor:'hand', //设置要显示的光标悬停在browse按钮。可能的值是“hand”和“arrow”。
				buttonImage:'',//按钮图片
				buttonText:'上 传',//上传按钮文字
				buttonCancelText:'取 消',//上传按钮取消文字
				buttonEnabled:true,//激活按钮 默认值 true 
				buttonCancelEnabled:false,//激活取消按钮 默认值 false
				fileRequestName:'Filedata',//请求名称 默认值“file” 例如,在PHP中,如果将此选项设置为“the_files”,您可以访问的文件已经上传使用$ _FILES[' the_files '];
				fileMaxSize:'100MB',//允许的最大尺寸文件上传。这个值可以是数字或字符串。如果它是一个字符串,它接受一个单元(B,KB、MB或GB)。默认单位是KB。你可以设置这个值没有限制为0。
				fileMaxNum:1000,//允许上传的最大数量，默认1000
				fileTypeDesc:"All Files",//可选的描述文件。这个字符串出现在浏览文件对话框的文件类型下拉列表中。
				fileTypeExts:"*.*",//允许扩展的列表,可以上传。手动输入文件名称可以绕过这种级别的安全,所以你应该检查你的服务器端脚本文件类型。分号分隔的多个扩展应该予以运行(即。”*.jpg;*.png;*.gif”)。
				fileMulti:true,//设置为false一次只允许一个文件选择。
				height:24,//button 的高度 ，默认22
				width:54,//button 的宽度，默认50
				swf:"compress_upload.swf",//swf文件路径
				requestUrl:"compress_upload.php",//swf文件路径
				requestData:'',//swf文件路径 默认”空“
				method:"POST",//swf文件路径
				imageWidth:0,//压缩的宽度 0不限制
				imageHeight:0,//压缩的高度 0不限制
				imageQuality:80,//压缩质量 默认值80
				compressImage:false,//压缩图片 默认true
				progressType:'fileBytes',//进度类型 “fileBytes”对每个上传文件 “count”针对多文件以数量作为进度信息 “filesBytes”文件的总大小
				expressInstallSwfurl:"expressInstall.swf",//（String，可选的）指定express install SWF的URL并激活Adobe express install [ http://www.adobe.com/cfusion/knowledgebase/index.cfm?id=6a253b75 ]。 
				
				//事件----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
				onCancel:function(){},//取消上传时触发
				onSWFReady:function(){},//swf加载完毕触发
				onEnable:function(){},//激活时触发
				onDisable:function(){},//禁用时触发
				onSelect:function(files){},//选择文件后触发
				/**
				 * 
				 * 
				 * 选择文件的错误代码 code
				 *
				 *  FILES_NUM_EXCEEDED – 文件数量超过限制.
				 *  FILE_EXCEEDS_SIZE – 文件大小超过限制.
				 *  EMPTY_FILE – 空文件.
				 *	TYPE_FILE  - 文件类型错误
				 * */
				onSelectError:function(file,code,msg){},//选择文件错误后触发
				onUploadStart:function(index,count,file){},//上传开始时触发
				onUploadError:function(file,code,msg){},//上传开始时触发
				onUploadComplete:function(file){},//上传完成
				onUploadSuccess:function(file,data,msg){},//上传成功返回服务器信息
				onUploadEnd:function(files){},//上传结束
				onUploadProgress:function(p1,p2)
				{
					var progress = compress.nextAll('.cu_progress').show();
					
					if(progress.size()==0)
					{
						var html =  '<div class="cu_progress">'+
									'<div class="box"><div class="sider"></div></div>'+
									'<div class="text">0%</div>'+
									'<div class="fileName"></div>'+
									'</div>';
									
						compress.after(html);
						
						progress = compress.nextAll('.cu_progress');
					}
					
					var width = parseInt(p1.bytesLoaded/p1.bytesTotal*100);
					
					progress.find('.sider').css("width",width+"%");
					progress.find('.text').html(width+"%");
					progress.find('.fileName').html(p1['target']['name']);
					
					if(width==100) progress.hide();
				
				},//上传进度
				onError:function(msg){},//flash报错
				onDestroy:function(){},//删除上传按钮
				onInit:function(){}//js初始化完成
		};
	};
		  
})(jQuery);