<?php 

//session_start();
include_once "koneksi/config.php";

if(isset($_POST['ceklogin'])){


function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$namauser = anti_injection($_POST['login_name']);
$sandi     = anti_injection($_POST['login_password']);


if (!ctype_alnum($namauser) OR !ctype_alnum($sandi))
{
  	header('location:index.php?aks=error1');
}

else
{
	$login=mysql_query("SELECT * FROM  petugas WHERE NAMAPETUGAS='$namauser' AND PASSWORDPETUGAS='$sandi' ");
	$ada=mysql_num_rows($login);
	$r=mysql_fetch_array($login);


	if ($ada > 0)
	{
  		session_start();

  		$_SESSION['NAMAPETUGAS']     	= $r['NAMAPETUGAS'];
		$_SESSION['EMAILPETUGAS']     	= $r['EMAILPETUGAS'];
		$_SESSION['IDPETUGAS']     	= $r['IDPETUGAS'];
  		
		
  		
		header('location:panel.php');
	}
	
	else{
	
		echo "<script>alert('Username Atau Password Salah');window.location='index.php'</script>";
  	}
	
}
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sidebar-hat"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sidebar-hat"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sidebar-hat"> <![endif]-->
<!--[if gt IE 8]> <html class="animations ie gt-ie8 fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sidebar-hat"> <![endif]-->
<!--[if !IE]><!--><html class="animations fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sidebar-hat"><!-- <![endif]-->
<head>
	<title>FLAT KIT (v1.2.0)</title>
	
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
	<script src="../js/jquery-1.10.1.min.js"></script>
	<script src="../js/jquery-migrate-1.2.1.min.js"></script>
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
      <script src="../theme/scripts/plugins/system/html5shiv.js"></script>
    <![endif]-->
	
	<!-- Main Theme Stylesheet :: CSS -->
	<link href="../theme/css/style-default-menus-dark.css?1374506526" rel="stylesheet" type="text/css" />
	
	
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
<body class="document-body login">
	
	<!-- Wrapper -->
<div id="login">

	<div class="container">
	
		<div class="wrapper">
		
			<h1 class="glyphicons lock">Masuk Panel <i></i></h1>
		
			<!-- Box -->
			<div class="widget widget-heading-simple widget-body-gray">
				
				<div class="widget-body">
				
					<!-- Form -->
					<form method="POST" action="">
						<label>Username</label>
						<input type="text" class="input-block-level" name="login_name" placeholder="Your Username"/> 
						<label>Password <a class="password" href="">forgot it?</a></label>
						<input type="password" class="input-block-level margin-none" name="login_password" placeholder="Your Password" />
						<div class="separator bottom"></div> 
						<div class="row-fluid">
							<div class="span8">
								<div class="uniformjs"><label class="checkbox"><input type="checkbox" value="remember-me">Remember me</label></div>
							</div>
							<div class="span4 center">
								<button class="btn btn-block btn-inverse" name="ceklogin" type="submit">Masuk</button>
							</div>
						</div>
					</form>
					<!-- // Form END -->
							
				</div>
				<div class="widget-footer">
					<p class="glyphicons restart"><i></i>Please enter your username and password ...</p>
				</div>
			</div>
			<!-- // Box END -->
			
		</div>
		
	</div>
	
</div>
<!-- // Wrapper END -->	
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
	
	
	<!-- Modernizr -->
	<script src="../theme/scripts/plugins/system/modernizr.js"></script>
	
	<!-- Bootstrap -->
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll Plugin -->
	<script src="../theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.js"></script>
	
	<!-- Holder Plugin -->
	<script src="../theme/scripts/plugins/other/holder/holder.js?1374506526"></script>
	
	<!-- Uniform Forms Plugin -->
	<script src="../theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script>
	
	<!-- MegaMenu -->
	<script src="../theme/scripts/demo/megamenu.js?1374506526"></script>

	
	
	<!-- Common Demo Script -->
	<script src="../theme/scripts/demo/common.js?1374506526"></script>
	
</body>
</html>