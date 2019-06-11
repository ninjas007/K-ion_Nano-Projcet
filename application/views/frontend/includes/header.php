<?php $pathAssets = base_url('assets/template_frontend/') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>K-Ion Nano Glasses</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo $pathAssets; ?>images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $pathAssets; ?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $pathAssets; ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $pathAssets; ?>fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $pathAssets; ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $pathAssets; ?>fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $pathAssets; ?>vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $pathAssets; ?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $pathAssets; ?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $pathAssets; ?>vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $pathAssets; ?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $pathAssets; ?>vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $pathAssets; ?>vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $pathAssets; ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pathAssets; ?>css/main.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo $pathAssets; ?>vendor/jquery/jquery-3.2.1.min.js"></script>
	<style>
		* {
			color: black;
		}

		a:hover {
			color: salmon !important;
			font-weight: 900 !important;
		}
		.xl-text1 {
		}
		
		@media screen and (max-width: 1000px) {
		  #advertisement img {
		  	width: 330px;
		  	height: 230px;
		  }
		}

	</style>
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1" id="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar" <?php if($marquee['not_activate'] == 1) {echo 'style="display: none"'; } ?>>

				<span class="topbar-child1">
					<marquee onmouseover="this.stop()" onmouseout="this.start()"><?php echo $marquee['marquee'] ?></marquee>
				</span>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="#header1" class="logo">
					<img src="<?php echo $pathAssets; ?>images/logo/logo.jpg" alt="IMG-LOGO" width="120" heigth="27">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<?php foreach ($navbars as $navbar): ?>
								<li>
									<a href="<?php echo $navbar['link_of_navbar'] ?>"><?php echo $navbar['name_navbar'] ?></a>
								</li>
							<?php endforeach ?>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="<?php echo $pathAssets; ?>images/logo/logo.jpg" alt="IMG-LOGO" width="120" heigth="27">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<?php foreach ($navbars as $navbar): ?>
					<li>
						<a href="<?php echo $navbar['link_of_navbar'] ?>" style="color: black"><?php echo $navbar['name_navbar'] ?></a>
					</li>
					<?php endforeach ?>
				</ul>
			</nav>
		</div>
	</header>
