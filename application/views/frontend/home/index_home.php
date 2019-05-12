<?php $pathAssets = base_url('assets/template_frontend/') ?>
	
	<style>
		* {
			color: black;
		}
		.xl-text1 {
		}

	</style>
	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar" <?php if($marquee['not_activate'] == 1) {echo 'style="display: none"'; } ?>>

				<span class="topbar-child1">
					<marquee><?php echo $marquee['marquee'] ?></marquee>
				</span>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.html" class="logo">
					<img src="<?php echo $pathAssets; ?>images/icons/logo.png" alt="IMG-LOGO">
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
				<img src="<?php echo $pathAssets; ?>images/icons/logo.png" alt="IMG-LOGO">
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

	<!-- Slide -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				
				<!-- SLIDER -->
				<?php foreach ($sliders as $slider): ?>

				<div class="item-slick1 item2-slick1" style="background-image: url(<?php echo $pathAssets; ?>images/slider/<?php echo $slider['image_slider'] ?>);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn" style="color: <?php echo $slider['color_header'] ?>">
							<h1><?php echo $slider['header_slider'] ?></h1>
						</span>

						<h6 class="caption2-slide1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn" style="color: red; font-family: Poppins-Bold; font-size: 24px">
							<?php echo $slider['desc_slider'] ?>
						</h6>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							<a href="<?php echo $slider['link_to_slider'] ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4" style="<?php if($slider['display_button'] == 1){echo 'style: none';} ?>">
								<?php echo $slider['name_to_link'] ?>
							</a>
						</div>
					</div>
				</div>

				<?php endforeach ?>

			</div>
		</div>
	</section>
	
	<!-- Banners -->
	<div class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
					
				<?php foreach ($banners as $banner): ?>
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo $pathAssets ."images/banner/". $banner['img_banner']  ?>" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="<?php echo $banner['link_to_banner'] ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								<?php echo $banner['name_banner'] ?>
							</a>
						</div>
					</div>
				</div>
				<?php endforeach ?>

			</div>
		</div>
	</div>
	
	<!-- Products -->
	<section class="bgwhite p-t-45 p-b-58">
		<div class="container" id="product-kami">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center">
					Products
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Tab panes -->
				<div class="tab-content p-t-35 row">
					<?php foreach ($products as $product): ?>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative <?php echo $product['label_product'] ?>">
								<img src="<?php echo $pathAssets . '/images/products/' . $product['img_product_1'] ?>" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<a href="#" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Pesan Ini
										</a>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20 text-center">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $product['name_product'] ?>
								</a>

								<span class="block2-price m-text6 p-r-5">
									Rp. <?php echo number_format($product['new_price_product'], 0,',','.')  ?>
								</span>
							</div>
						</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</section>
	
	<!-- Countdown -->
	<section class="parallax0 parallax100" style="background-image: url(<?php echo $pathAssets . 'images/countdown/' . $countdown['img_background'] ?>);">
		<div class="overlay0 p-t-190 p-b-200">

			<div class="t-center">
				<a href="product-detail.html" class="dis-block s-text3 p-b-5">
					Gafas sol Hawkers one
				</a>

				<span class="block2-oldprice m-text7 p-r-5">
					$29.50
				</span>

				<span class="block2-newprice m-text8">
					$15.90
				</span>
			</div>

			<div class="flex-col-c-m p-l-15 p-r-15">
				<div class="flex-c-m p-t-44 p-t-30-xl">

					<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
						<span class="m-text10 p-b-1 days">69</span>

						<span class="s-text5">
							days
						</span>
					</div>

					<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
						<span class="m-text10 p-b-1 hours">12</span>

						<span class="s-text5">
							hrs
						</span>
					</div>

					<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
						<span class="m-text10 p-b-1 minutes">58</span>

						<span class="s-text5">
							mins
						</span>
					</div>

					<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
						<span class="m-text10 p-b-1 seconds">44</span>

						<span class="s-text5">
							secs
						</span>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- Testimonials -->
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Testimonials
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					
					<?php foreach ($testimonials as $testimonial): ?>
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="<?php echo $pathAssets . 'images/testimonials/' . $testimonial['image_testimonial'] ?>" alt="IMG-TESTIMONIAL" width="200" height="320">

								<div class="block2-overlay trans-0-4">
									<p class=" p-5" style="color: white; font-weight: 700;">
										<?php echo $testimonial['desc_testimonial'] ?>
									</p>
								</div>
							</div>
						</div>
					</div>			
					<?php endforeach ?>

				</div>
			</div>

		</div>
	</section>
	

	<!-- Description store -->
	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="container">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center">
					<?php echo $descriptionToSell['header_description'] ?>
				</h3>
			</div>
			<div class="flex-w p-l-15 p-r-15">
				<div class="flex-col-c p-l-15 p-r-15 p-t-16 p-b-15 respon1">
					<p class="text-center">
						<?php echo $descriptionToSell['description'] ?>
					</p>
					
					<a href="#" class="btn btn-success btn-md m-3">
						Tanya Kami Di Sini
					</a>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45 text-center">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3 col-md-4">
				<h4 class="s-text12 p-b-30">
					HUBUNGI KAMI
				</h4>

				<div>
					<p class="s-text7 w-size27">
						<?php echo $address['desc_address'] ?>
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<!-- <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Men
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Women
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Dresses
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Sunglasses
						</a>
					</li>
				</ul>
			</div>
 -->

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3 col-md-4">
				<h4 class="s-text12 p-b-30">
					Location
				</h4>
				

			</div>


			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4 col-md-4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<?php foreach ($navbars as $navbar): ?>
					<li>
						<a href="<?php echo $navbar['link_of_navbar'] ?>" style="color: black"><?php echo $navbar['name_navbar'] ?></a>
					</li>
					<?php endforeach ?>
				</ul>
			</div>

			<!-- <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div> -->

		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="<?php echo $pathAssets; ?>images/icons/Whatsapp.png" alt="IMG-PAYPAL">
				<?php echo $contacts['no_whatsapp'] ?>
			</a>
			<div class="t-center s-text8 p-t-20">
				Copyright © 2019 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> Edited by <a href="https://www.facebook.com/0x566F4e" style="color: green">Von</a> 
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo $pathAssets; ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo $pathAssets; ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo $pathAssets; ?>vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo $pathAssets; ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo $pathAssets; ?>vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo $pathAssets; ?>vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $pathAssets; ?>js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo $pathAssets; ?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo $pathAssets; ?>vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo $pathAssets; ?>vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>
