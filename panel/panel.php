<?php
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"> <![endif]-->
<!--[if gt IE 8]> <html class="animations ie gt-ie8 fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"> <![endif]-->
<!--[if !IE]><!--><html class="animations fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"><!-- <![endif]-->
<head>
	<title>Panel Beasiswa</title>
	
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	
	<!-- Bootstrap -->
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="../bootstrap/css/responsive.css" rel="stylesheet" type="text/css" />
	
	<!-- Glyphicons Font Icons -->
	<link href="../theme/fonts/glyphicons/css/glyphicons.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="../theme/fonts/font-awesome/css/font-awesome.min.css">
	<!--[if IE 7]><link rel="stylesheet" href="../theme/fonts/font-awesome/css/font-awesome-ie7.min.css"><![endif]-->
	
	<!-- Uniform Pretty Checkboxes -->
	<link href="../theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" rel="stylesheet" />
	
	<!-- PrettyPhoto -->
    <link href="../theme/scripts/plugins/gallery/prettyphoto/css/prettyPhoto.css" rel="stylesheet" />
    
    <!-- JQuery -->
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/jquery-migrate-1.2.1.min.js"></script>
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
      <script src="../theme/scripts/plugins/system/html5shiv.js"></script>
    <![endif]-->
	
	<!-- Bootstrap Extended -->
	<link href="../bootstrap/extend/jasny-fileupload/css/fileupload.css" rel="stylesheet">
	<link href="../bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">
	<link href="../bootstrap/extend/bootstrap-select/bootstrap-select.css" rel="stylesheet" />
	<link href="../bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" rel="stylesheet" />
	
	<!-- DateTimePicker Plugin -->
	<link href="../theme/scripts/plugins/forms/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet" />
	
	<!-- JQueryUI -->
	<link href="../theme/scripts/plugins/system/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" />
	
	<!-- MiniColors ColorPicker Plugin -->
	<link href="../theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.css" rel="stylesheet" />
	
	<!-- Notyfy Notifications Plugin -->
	<link href="../theme/scripts/plugins/notifications/notyfy/jquery.notyfy.css" rel="stylesheet" />
	<link href="../theme/scripts/plugins/notifications/notyfy/themes/default.css" rel="stylesheet" />
	
	<!-- Gritter Notifications Plugin -->
	<link href="../theme/scripts/plugins/notifications/Gritter/css/jquery.gritter.css" rel="stylesheet" />
	
	<!-- Easy-pie Plugin -->
	<link href="../theme/scripts/plugins/charts/easy-pie/jquery.easy-pie-chart.css" rel="stylesheet" />

	<!-- Google Code Prettify Plugin -->
	<link href="../theme/scripts/plugins/other/google-code-prettify/prettify.css" rel="stylesheet" />
	
	<!-- Select2 Plugin -->
	<link href="../theme/scripts/plugins/forms/select2/select2.css" rel="stylesheet" />

	<!-- Pageguide Guided Tour Plugin -->
	<!--[if gt IE 8]><!--><link media="screen" href="../theme/scripts/plugins/other/pageguide/css/pageguide.css" rel="stylesheet" /><!--<![endif]-->

	<!-- FooTable Plugin -->
	<link href="../theme/scripts/plugins/tables/FooTable/css/footable-0.1.css" rel="stylesheet" />
	
	<!-- datatables -->
	<link href="../js/jquery.dataTables.css" rel="stylesheet" />
	<link href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.css" rel="stylesheet" />
	<link href="../js/dataTables.colVis.css" rel="stylesheet" />
	<link href="../js/dataTables.responsive.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="../js/dataTables.tableTools.css">
	<link rel="stylesheet" type="text/css" href="../js/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="DataTablesEditor/css/dataTables.editor.css">

	<!-- Main Theme Stylesheet :: CSS -->
	<link href="../theme/css/style-default-menus-dark.css?1374506516" rel="stylesheet" type="text/css" />
	
	 <link rel="stylesheet" href="../kendoUI/kendo.common.min.css" />
    <link rel="stylesheet" href="../kendoUI/kendo.default.min.css" />
    <link rel="stylesheet" href="../kendoUI/kendo.dataviz.min.css" />
    <link rel="stylesheet" href="../kendoUI/kendo.dataviz.default.min.css" />

    <script src="../kendoUI/jquery.min.js"></script>
    <script src="../kendoUI/kendo.all.min.js"></script>
	
	
	
	<!-- FireBug Lite -->
	<!-- <script src="https://getfirebug.com/firebug-lite-debug.js"></script> -->

	<!-- LESS.js Library -->
	<script src="../theme/scripts/plugins/system/less.min.js"></script>
	
	<!-- Global -->
	<script>
	//<![CDATA[
	var basePath = '',
		commonPath = '../';

	// colors
	var primaryColor = '#e5412d',
		dangerColor = '#b55151',
		successColor = '#609450',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';

	var themerPrimaryColor = primaryColor;
	//]]>
	</script>
</head>
<body class="document-body ">
	<div class="container-fluid menu-hidden sidebar-hidden-phone fluid menu-left">
		<div id="wrapper">
			<div id="menu" class="hidden-print">
				<a href="" class="appbrand"><span class="text-primary">MENU</a>
				<div class="slim-scroll" data-scroll-height="800px">
					<button type="button" class="btn btn-navbar">
						<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
					<span class="profile center">
						<a href="my_account_advanced.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-default-menus-dark&amp;sidebar_type=collapsible"><img src="http://dummyimage.com/74x74/232323/ffffff&text=photo" alt="Avatar" /></a>
					</span>
					<ul>
						<li><a href="?module=beranda" class="glyphicons dashboard"><i></i><span>Beranda</span></a></li>
						<li class="hasSubmenu">
							<a href="#menu_master" data-toggle="collapse" class="glyphicons suitcase"><i></i><span>Data Master</span><span class="icon-chevron-down"></span></a>
							<ul class="collapse" id="menu_master">
								<li class="">
									<a href="?module=petugas">Data Petugas<span class="badge badge-primary fix">4</span></a>
								</li>
								<li class="">
									<a href="?module=mahasiswa">Data Mahasiswa<span class="badge badge-primary fix">4</span></a>
								</li>
								<li class="">
									<a href="?module=aspek">Aspek Penilaian<span class="badge badge-primary fix">4</span></a>
								</li>
		
							</ul>
						</li>
						<li class="hasSubmenu">
							<a href="#menu_proses" data-toggle="collapse" class="glyphicons edit"><i></i><span>Proses Data</span><span class="icon-chevron-down"></span></a>
							<ul class="collapse" id="menu_proses">
								<li class="hasSubmenu">
									<a href="?module=penilaian">Penilaian<span class="badge badge-primary fix">4</span></a>
								</li>
		
								<li class="hasSubmenu">
									<a href="#menu_proses_persetujuan" data-toggle="collapse">Persetujuan<span class="badge badge-primary fix">4</span></a>
									<ul class="collapse" id="menu_proses_persetujuan">
										<li class=""><a href="?module=persetujuan">Persetujuan Data</a></li>
										<li class=""><a href="?module=disetujui">Telah Disetujui</a></li>
									</ul>
								</li>
		
							</ul>
						</li>
						<li><a href="?module=beasiswa" class="glyphicons edit"><i></i><span>Info Beasiswa</span></a></li>
						<li class="hasSubmenu">
							<a href="#menu_laporan" data-toggle="collapse" class="glyphicons file"><i></i><span>Laporan</span><span class="icon-chevron-down"></span></a>
							<ul class="collapse" id="menu_laporan">
								<li><a href="?module=laporan"><span>Laporan</span></a></li>
							</ul>
						</li>
						<li class="hasSubmenu">
							<a href="#menu_pengaturan" data-toggle="collapse" class="glyphicons settings"><i></i><span>Pengaturan</span><span class="icon-chevron-down"></span></a>
							<ul class="collapse" id="menu_pengaturan">
								<li><a href="?module=backup" ><i></i><span>Backup</span></a></li>
								<li><a href="?module=restore" ><i></i><span>Restore</span></a></li>
							</ul>
						</li>				
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<div id="content">
				<div class="navbar main">
					<button type="button" class="btn btn-navbar pull-left visible-phone">
						<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
					<div class="pull-left" style="margin-top:12px; margin-left:20px;">
					<span><strong class="text-primary">Beasiswa Online</strong></span>
					</div>
					<ul class="topnav pull-right hidden-phone">
						<li><a href="#themer" data-toggle="collapse" class="glyphicons eyedropper single-icon"><i></i></a></li>
						<li class="account dropdown dd-1">
							<a data-toggle="dropdown" href="" class="glyphicons logout lock"><span class="hidden-tablet hidden-phone hidden-desktop-1"><?php echo $_SESSION['NAMAPETUGAS']; ?></span><i></i></a>
							<ul class="dropdown-menu pull-right">
								<li class="profile">
									<span>
										<span class="heading">Profile <a href="" class="pull-right text-primary text-weight-regular">edit</a></span>
										<a href="" class="img thumb">
											<img data-src="holder.js/51x51/dark" alt="Avatar" />
										</a>
										<span class="details">
											<a href="" class="strong text-regular"><?php echo $_SESSION['NAMAPETUGAS']; ?></a><br>
											<?php echo $_SESSION['EMAILPETUGAS']; ?>
										</span>
										<span class="clearfix"></span>
									</span>
								</li>
								<li>
									<span>
										<a class="btn btn-default btn-mini pull-right" href="logout.php">Sign Out</a>
									</span>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="topnav pull-right hidden-phone">
						<li><a href="" class="glyphicons envelope single-icon"><i></i><span class="badge fix badge-primary">5</span></a></li>
						<li><a href="" class="glyphicons cup single-icon"><i></i><span class="badge fix badge-primary">7</span></a></li>
						<li class="hidden-tablet"><a href="" class="glyphicons comments single-icon"><i></i><span class="badge fix badge-primary">3</span></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				
				<?php include "konten.php"; ?>
			</div>
		</div>
		<div class="clearfix"></div>
		<div id="footer" class="hidden-print">
			<div class="copy">&copy; 2012 - 2013 - <a href="http://www.mosaicpro.biz">MosaicPro</a> - All Rights Reserved. <a href="http://themeforest.net/?ref=mosaicpro" target="_blank">Purchase FLAT KIT on ThemeForest</a> - Current version: v1.2.0 / <a target="_blank" href="http://demo.mosaicpro.biz/flatkit/CHANGELOG">changelog</a></div>
		</div>
	</div>
			
	<div id="themer" class="collapse">
		<div class="wrapper">
			<span class="close2">&times; close</span>
			<h4>Themer <span>color options</span></h4>
			<ul>
				<li>Theme: <select id="themer-theme" class="pull-right"></select><div class="clearfix"></div></li>
				<li>Primary Color: <input type="text" data-type="minicolors" data-default="#ffffff" data-slider="hue" data-textfield="false" data-position="left" id="themer-primary-cp" /><div class="clearfix"></div></li>
				<li>
					<span class="link" id="themer-custom-reset">reset theme</span>
					<span class="pull-right"><label>advanced <input type="checkbox" value="1" id="themer-advanced-toggle" /></label></span>
				</li>
			</ul>
			<div id="themer-getcode" class="hide">
				<hr class="separator" />
				<button class="btn btn-primary btn-small pull-right btn-icon glyphicons download" id="themer-getcode-less"><i></i>Get LESS</button>
				<button class="btn btn-inverse btn-small pull-right btn-icon glyphicons download" id="themer-getcode-css"><i></i>Get CSS</button>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>


	
	<!-- jQuery Event Move -->
	<script src="../theme/scripts/plugins/system/jquery.event.move/js/jquery.event.move.js"></script>
	
	<!-- jQuery Event Swipe -->
	<script src="../theme/scripts/plugins/system/jquery.event.swipe/js/jquery.event.swipe.js"></script>
	
	<!-- jQuery ScrollTo Plugin -->
	<!--[if gt IE 8]><!--><script src="../js/jquery-scrollto.js"></script><!--<![endif]-->
	
	<!-- History.js -->
	<!--[if gt IE 8]><!--><script src="../js/jquery.history.js"></script><!--<![endif]-->
	
	<!-- jQuery Ajaxify -->
	<!--[if gt IE 8]><!--><script src="../theme/scripts/plugins/system/jquery-ajaxify/ajaxify-html5.js"></script><!--<![endif]-->
	
	
	<!-- Code Beautify -->
	<script src="../theme/scripts/plugins/other/js-beautify/beautify.js"></script>
	<script src="../theme/scripts/plugins/other/js-beautify/beautify-html.js"></script>
	
	<!-- PrettyPhoto -->
	<script src="../theme/scripts/plugins/gallery/prettyphoto/js/jquery.prettyPhoto.js"></script>
	
	<!-- JQueryUI -->
	<script src="../theme/scripts/plugins/system/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
	
	<!-- JQueryUI Touch Punch -->
	<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
	<script src="../theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	
	<!-- Modernizr -->
	<script src="../theme/scripts/plugins/system/modernizr.js"></script>
	
	<!-- Bootstrap -->
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll Plugin -->
	<script src="../theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.js"></script>
	
	<!-- Holder Plugin -->
	<script src="../theme/scripts/plugins/other/holder/holder.js?1374506516"></script>
	
	<!-- Uniform Forms Plugin -->
	<script src="../theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script>
	
	<!-- MegaMenu -->
	<script src="../theme/scripts/demo/megamenu.js?1374506516"></script>

	<!-- Bootstrap Extended -->
	<script src="../bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
	<script src="../bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
	<script src="../bootstrap/extend/jasny-fileupload/js/bootstrap-fileupload.js"></script>
	<script src="../bootstrap/extend/bootbox.js"></script>
	<script src="../bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js"></script>
	<script src="../bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js"></script>
	
	<!-- Google Code Prettify -->
	<script src="../theme/scripts/plugins/other/google-code-prettify/prettify.js"></script>
	
	<!-- Gritter Notifications Plugin -->
	<script src="../theme/scripts/plugins/notifications/Gritter/js/jquery.gritter.min.js"></script>
	
	<!-- Notyfy Notifications Plugin -->
	<script src="../theme/scripts/plugins/notifications/notyfy/jquery.notyfy.js"></script>
	
	<!-- MiniColors Plugin -->
	<script src="../theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js"></script>
	
	<!-- DateTimePicker Plugin -->
	<script src="../theme/scripts/plugins/forms/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	
	<!-- data tables -->
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/jquery.dataTables.js"></script>
	<script src="../js/dataTables.colVis.js"></script>
	<script src="../js/dataTables.responsive.js"></script>
	<script type="text/javascript" charset="utf-8" src="../js/dataTables.tableTools.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="DataTablesEditor/js/dataTables.editor.min.js"></script>
		

	<!-- Cookie Plugin -->
	<script src="../theme/scripts/plugins/system/jquery.cookie.js"></script>
	
	<!-- Select2 Plugin -->
	<script src="../theme/scripts/plugins/forms/select2/select2.js"></script>
	
	<!-- Themer -->
	<script src="../theme/scripts/demo/themer.js"></script>
	
	<!-- Twitter Feed -->
	<script src="../theme/scripts/demo/twitter.js"></script>
	
	<!-- Easy-pie Plugin -->
	<script src="../theme/scripts/plugins/charts/easy-pie/jquery.easy-pie-chart.js"></script>
	
	<!-- Sparkline Charts Plugin -->
	<script src="../theme/scripts/plugins/charts/sparkline/jquery.sparkline.min.js"></script>
	
	<!-- Ba-Resize Plugin -->
	<script src="../theme/scripts/plugins/other/jquery.ba-resize.js"></script>
	
	<!-- ColorPicker -->
	<script src="../theme/scripts/plugins/color/farbtastic/farbtastic.js"></script>
	
	<!-- Multiselect Plugin -->
	<script src="../theme/scripts/plugins/forms/multiselect/js/jquery.multi-select.js"></script>
	
	<!-- bootstrap-timepicker Plugin -->
	<script src="../theme/scripts/plugins/forms/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	
	<!-- InputMask Plugin -->
	<script src="../theme/scripts/plugins/forms/jquery-inputmask/dist/jquery.inputmask.bundle.min.js"></script>
	
	<!-- Form Elements Page Demo Script -->
	<script src="../theme/scripts/demo/form_elements.js"></script>
	
	
	
	<!-- FooTable Plugin -->
	<script src="../theme/scripts/plugins/tables/FooTable/js/footable.js"></script>
	
	<!-- Responsive Tables Demo Script -->
	<script src="../theme/scripts/demo/tables_responsive.js"></script>
	
	<!-- Common Demo Script -->
	<script src="../theme/scripts/demo/common.js?1374506516"></script>
	
</body>
</html>