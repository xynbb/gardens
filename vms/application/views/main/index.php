<div class="wrapper">

	<!-- Main Header -->
	<header class="main-header">

		<!-- Logo -->
		<a href="/" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>GVS</b></span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>Gome+</b> Video System</span>
		</a>

		<!-- Header Navbar -->
		<nav class="navbar navbar-static-top" role="navigation">
			<a role="button" data-toggle="offcanvas" class="sidebar-toggle">
			</a>
			<!-- Navbar Right Menu -->
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- Messages: style can be found in dropdown.less-->
					<li class="dropdown messages-menu">
						<!-- Menu toggle button -->
						<a class="dropdown-toggle">
							<i class=""><?php echo Author::givenName() ? Author::givenName() : Author::name(); ?>(<?php echo Author::getRolesName();?>)</i>
						</a>
					</li><!-- /.messages-menu -->
					<!-- Control Sidebar Toggle Button -->
					<li>
						<a href="/author/logout" >退出</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">

		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<ul class="sidebar-menu" id="NavigatorBox">

			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<section class="content-header" style="padding:0px">
			<div>
				<ol class="breadcrumb fa fa-dashboard" style="padding:5px;margin:0px">
					<li class="active"></li>
				</ol>
			</div>
		</section>

		<!-- Main content -->
		<iframe src="<?php echo URL::site('profile/index'); ?>" name="mainContent" id="mainIframe" width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" scrolling="yes" style="overflow:visible;"></iframe>
		<!-- /.content -->
	</div><!-- /.content-wrapper -->

	<!-- Main Footer -->
	<!--       <footer class="main-footer"> -->
        <!-- To the right -->
	<!--         <div class="pull-right hidden-xs"> -->

	<!--         </div> -->
        <!-- Default to the left -->
<!--         <strong>Copyright &copy; 2016 Gome+ VideoTeam.</strong> All rights reserved. -->
	<!--       </footer> -->
	<!-- Add the sidebar's background. This div must be placed
	     immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->
<style>
	.breadcrumb>li+li:before{
		padding:0;
	}
	.content-wrapper, .right-side{
		background-color:  #ffffff;
	}
	.skin-blue .content-header{
		background-color: #ecf0f5;
	}
</style>
<script type="text/javascript">
	var navigators = [];
	var menus = [];
	var controllers = [];
<?php
$firstNavigator = NULL;
if ($privileges instanceof Iterator) {
	foreach ($privileges as $privilege) {
		if (!$privilege->getIsDisplay()) {
			continue;
		}
		if ($privilege->getType() == 'navigator') {
			if ($firstNavigator == NULL) {
				$firstNavigator = $privilege;
			}
			echo "navigators.push({'name':'{$privilege->getName()}', 'privilegeId':'{$privilege->getPrivilegeId()}', 'parentId':'{$privilege->getParentId()}', 'target':'', 'icon':'{$privilege->getIcon()}'});\r\n";
		}
		if ($privilege->getType() == 'menu') {
			echo "menus.push({'name':'{$privilege->getName()}', 'privilegeId':'{$privilege->getPrivilegeId()}', 'parentId':'{$privilege->getParentId()}', 'target':'', 'icon':'{$privilege->getIcon()}'});\r\n";
		}
		if ($privilege->getType() == 'controller') {
			echo "controllers.push({'name':'{$privilege->getName()}', 'privilegeId':'{$privilege->getPrivilegeId()}', 'parentId':'{$privilege->getParentId()}', 'target':'{$privilege->getURI()}', 'icon':'{$privilege->getIcon()}'});\r\n";
		}
	}
}
?>

	var defaultNavigator = <?php echo is_object($firstNavigator) ? $firstNavigator->getPrivilegeId() : 1; ?>;
</script>
<script type="text/javascript">
	if (self != top) {
		top.location = self.location;
	}

	function recoverMenu() {
		if (location.hash.length !== 7) {
			location.hash = '!';
			bind();
			return;
		}
		var info = location.hash.substring(2).split("/");
		if (info.length === 3) {
			var $lv1 = $("#NavigatorBox>li").eq(info[0]);
			var $lv2 = $lv1.find(">ul>li").eq(info[1]);
			var $lv3 = $lv2.find(">ul>li").eq(info[2]);
			$lv1.addClass('active').click();
			$lv2.addClass('active').find(">ul").show();
			$('ol.breadcrumb').html('<li>' + $lv1.find('>a').text().trim() + '</li>' + '<li>' + $lv2.find('>a').text().trim() + '</li>' + '<li>' + $lv3.find('>a').text().trim() + '</li>');
			$('[name="mainContent"]').attr('src', $lv3.addClass('active').find('>a').attr('name', location.hash.substring(1)).attr("href"));
			location.hash = location.hash;
		}
		bind();
	}
	function bind() {
		$('#NavigatorBox a[target="mainContent"]').click(function(e) {
			var lv3Index = $(this).parent().index();
			var lv2Index = $(this).parent().parent().parent().index();
			var lv1Index = $(this).parent().parent().parent().parent().parent().index();
			location.hash = "!" + lv1Index + "/" + lv2Index + "/" + lv3Index;
			$('ol.breadcrumb li').eq(0).remove();
		});
	}

	$(function() {
		setInterval(function() {
			var mainheight = $("#mainIframe").contents().find("body").height();
			$("#mainIframe").height(mainheight);
		}, 200);
	});

</script>