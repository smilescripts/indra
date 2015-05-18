<?php
	session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="front ie lt-ie9 lt-ie8 lt-ie7 fluid top-full menuh-top"> <![endif]-->
<!--[if IE 7]>    <html class="front ie lt-ie9 lt-ie8 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if IE 8]>    <html class="front ie lt-ie9 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if gt IE 8]> <html class="animations front ie gt-ie8 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if !IE]><!--><html class="animations front fluid top-full menuh-top sticky-top"><!-- <![endif]-->
<head>
	<title>Pendaftaran Beasiswa</title>
	
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="bootstrap/css/responsive.css" rel="stylesheet" type="text/css" />
	
		<!-- JQuery -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/jquery-migrate-1.2.1.min.js"></script>
	
	<!-- Glyphicons Font Icons -->
	<link href="theme/fonts/glyphicons/css/glyphicons.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="theme/fonts/font-awesome/css/font-awesome.min.css">
	<!--[if IE 7]><link rel="stylesheet" href="theme/fonts/font-awesome/css/font-awesome-ie7.min.css"><![endif]-->
	
	<!-- Uniform Pretty Checkboxes -->
	<link href="theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" rel="stylesheet" />
	
	<!-- Bootstrap Extended -->
	<link href="bootstrap/extend/bootstrap-select/bootstrap-select.css" rel="stylesheet" />
	
	<!-- JQueryUI -->
	<link href="theme/scripts/plugins/system/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" />
	
	<!-- MiniColors ColorPicker Plugin -->
	<link href="theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.css" rel="stylesheet" />
	
	<!-- Google Code Prettify Plugin -->
	<link href="theme/scripts/plugins/other/google-code-prettify/prettify.css" rel="stylesheet" />

	<!-- REVOLUTION BANNER CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="theme/scripts/plugins/other/revolution-slider/css/settings.css" media="screen" />

	<!-- Main Theme Stylesheet :: CSS -->
	<link href="theme/css/style-default-menus-dark.css?1374506533" rel="stylesheet" />
	
	<!-- datatables -->
	<link href="js/jquery.dataTables.css" rel="stylesheet" />
	<link href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.css" rel="stylesheet" />
	<link href="js/dataTables.colVis.css" rel="stylesheet" />
	<link href="js/dataTables.responsive.css" rel="stylesheet" />
	
	
	<!-- LESS.js Library -->
	<script src="theme/scripts/plugins/system/less.min.js"></script>
</head>
<body>
	
	<!-- Main Container Fluid -->
	<div class="container-fluid menu-hidden">
		
		<!-- Content -->
		<div id="content">
		
		<!-- Top navbar (note: add class "navbar-hidden" to close the navbar by default) -->
		<div class="navbar main hidden-print">
			
			<div class="secondary">
				<div class="container-960">
				
					<!-- Menu Toggle Button -->
					<button type="button" class="btn btn-navbar visible-phone pull-right">
						<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
					<!-- // Menu Toggle Button END -->
					
					<ul class="topnav pull-left">
						<li><a href="" class="glyphicons search single-icon"><i></i></a></li>
											</ul>
					
					<ul class="topnav pull-right">
						
												<!-- Themer -->
						<li class="hidden-phone"><a href="#themer" data-toggle="collapse" class="glyphicons eyedropper single-icon"><i></i></a></li>
						<!-- // Themer END -->
												
						<li class="hidden-phone follow">
							<span>Follow us</span> 
							<a href="" class="icon-facebook"></a>
							<a href="" class="icon-twitter"></a>
							<a href="" class="icon-youtube"></a>
							<a href="" class="icon-google-plus"></a>
						</li>
						<?php if(!isset($_SESSION["NIM"])){ ?>
							<li class="inverse active"><a href="login.php" class="glyphicons unlock no-ajaxify"><i></i> Masuk</a></li>
						<?php } ?>
						<?php if(isset($_SESSION["NIM"])){ ?>
							<li class="primary"><a href="keluar.php" class="glyphicons lock no-ajaxify"><i></i> Keluar (<?php echo $_SESSION["NIM"]; ?>)</a></li>
						<?php } ?>
						
					</ul>
					<div class="clearfix"></div>
					
				</div>
			</div>
			
			<div class="container-960">
			
			<!-- Brand -->
			<a href="" class="appbrand pull-left"><span class="text-primary">Beasiswa Online</span> UNINUS</a>
			
			<ul class="topnav pull-right">
				
				<li><a href="index.php">Beranda</a></li>
				<li><a href="?module=beasiswa">Beaiswa</a></li>
				<?php if(isset($_SESSION["NIM"])){ ?>
				<li><a href="?module=status">Cek Status</a></li>
				<li><a href="?module=riwayat">Riwayat</a></li>
				<?php } ?>
				<li><a href="?module=petunjuk">Petunjuk Pendaftaran</a></li>

			</ul>
			<div class="clearfix"></div>
			<!-- // Top Menu Right END -->
			
			</div>
			
		</div>
		<!-- Top navbar END -->
	<div id="landing_2">
	
	<?php include "konten.php"; ?>
</div>	
		</div>
		<!-- // Content END -->
		
		<div id="footer" class="hidden-print">
			
			<div class="container-960 innerTB">				
				<!--  Copyright Line -->
				<div class="copy">
					&copy; 2015  - <a href="">Beasiswa Online</a> - All Rights Reserved Indra Ramadhan. 
					<span class="appbrand">Universitas Islam Nusantara (UNINUS)</span>
				</div>
				<!--  End Copyright Line -->
				
			</div>
	
		</div>
		<!-- // Footer END -->
		
	</div>
	<!-- // Main Container Fluid END -->

<!-- Themer -->
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
<!-- // Themer END -->


	
	<!-- Code Beautify -->
	<script src="theme/scripts/plugins/other/js-beautify/beautify.js"></script>
	<script src="theme/scripts/plugins/other/js-beautify/beautify-html.js"></script>
	
	<!-- Global -->
	<script>
	var basePath = '',
		commonPath = '';
	</script>
	
	<!-- JQueryUI -->
	<script src="theme/scripts/plugins/system/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
	
	<!-- JQueryUI Touch Punch -->
	<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
	<script src="theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	
	<!-- jQuery REVOLUTION Slider  -->
    <script type="text/javascript" src="theme/scripts/plugins/other/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
    
    <!-- Front Index with Revolution Slider Demo Script -->
	<script src="theme/scripts/demo/front_index_revolutionslider.js?1374506533"></script>

	<!-- Modernizr -->
	<script src="theme/scripts/plugins/system/modernizr.js"></script>
	
	<!-- Bootstrap -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll Plugin -->
	<script src="theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.js"></script>
	
	<!-- MegaMenu -->
	<script src="theme/scripts/demo/megamenu.js?1374506533"></script>
	
	<!-- jQuery ScrollTo Plugin -->
	<!--[if gt IE 8]><!--><script src="js/jquery-scrollto.js"></script><!--<![endif]-->
	
	<!-- History.js -->
	<!--[if gt IE 8]><!--><script src="js/jquery.history.js"></script><!--<![endif]-->
	
	<!-- jQuery Ajaxify -->
	<!--[if gt IE 8]><!--><script src="theme/scripts/plugins/system/jquery-ajaxify/ajaxify-html5.js"></script><!--<![endif]-->
	
	
	<!-- Holder Plugin -->
	<script src="theme/scripts/plugins/other/holder/holder.js?1374506533"></script>
	
	<!-- Uniform Forms Plugin -->
	<script src="theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script>

	<!-- Bootstrap Extended -->
	<script src="bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
	<script src="bootstrap/extend/bootbox.js"></script>
	
	<!-- Google Code Prettify -->
	<script src="theme/scripts/plugins/other/google-code-prettify/prettify.js"></script>
	
	<!-- MiniColors Plugin -->
	<script src="theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js"></script>
	
	<!-- Cookie Plugin -->
	<script src="theme/scripts/plugins/system/jquery.cookie.js"></script>
	
	<!-- data tables -->
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/jquery.dataTables.js"></script>
	<script src="js/dataTables.colVis.js"></script>
	<script src="js/dataTables.responsive.js"></script>
	
	<!-- Colors -->
	<script>
	var primaryColor = '#e5412d',
		dangerColor = '#b55151',
		successColor = '#609450',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';
	</script>
	
	<!-- Themer -->
	<script>
	var themerPrimaryColor = primaryColor;
	</script>
	<script src="theme/scripts/demo/themer.js"></script>
	
	<!-- Common Demo Script -->
	<script src="theme/scripts/demo/common.js?1374506533"></script>
	
</body>
</html>