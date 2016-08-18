/**
 * 调整工作区尺寸
 */
function resizeContentHeight() {
	var mainHeight = document.body.clientHeight - 85;
	$('#mainIframe').height(mainHeight);
}

/**
 * 初始化导航,菜单
 * @param navigators,menus
 */
function initializeNavigator(navigators, menus) {
	var navigatorBox = $('#NavigatorBox');
	navigatorBox.children().remove();


	for(var i = 0; i < navigators.length; i++) {
		var navigator = navigators[i];
		var navigatorId = navigator.privilegeId;
		HTML = '<li class="treeview"><a href="#"><i class="'+ navigator.icon +'"></i> <span>'+ navigator.name +'</span><i class="fa fa-angle-left pull-right"></i></a><ul class="treeview-menu">';
		//HTML = '';
		for(var k = 0; k < menus.length; k++) {
			var menu = menus[k];
			if(menu.parentId != navigator.privilegeId) {
				continue;
			}
			HTML += '<li class=""><a href="#Menu'+ menu.privilegeId +'"> &nbsp; <i class="'+ menu.icon +'"> '+ menu.name +' </i><i class="fa fa-angle-left pull-right"></i></a><ul class="treeview-menu">';
			for(var n = 0; n < controllers.length; n++) {
				var controller = controllers[n];
				if(controller.parentId != menu.privilegeId) {
					continue;
				}
				HTML += '<li style="padding-left:20px;"><a a href="'+ controller.target +'" target="mainContent"><i class="glyphicon glyphicon-th-list btn-xs"></i> '+ controller.name +'</a></li>';
			}
			HTML += '</ul></li>';
		}

		HTML += '</ul></li>';
		navigatorBox.append(HTML);
	}
	recoverMenu();
}

$(window).resize(function() {
		resizeContentHeight();
});

$(window).load(function() {
	resizeContentHeight();
	initializeNavigator(navigators, menus);


	$('#NavigatorBox > li > ul > li > ul > li > a').click(function() {
		var li = $(this).parent('li');
		var span = li.parent().siblings('a').children(':eq(0)');
		var nav = li.parent().parent().parent('ul').siblings('a').children('span');
		var name = li.text().trim();
		var pname = span.text().trim();
		var navname = nav.text().trim();
		var html = '<li>'+navname+'</li><li>'+pname+'</li><li>'+name+'</li>';
		$('#NavigatorBox > li > ul > li > ul > li').removeClass('active');
		li.addClass('active');
		$('.breadcrumb li:gt(0)').remove();
		$('.breadcrumb').html(html);
	});
});
