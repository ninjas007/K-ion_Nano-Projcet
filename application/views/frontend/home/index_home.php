<?php $pathAssets = base_url('assets/template_frontend/') ?>
	
		<!-- Slide -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				
				<!-- SLIDER -->
				<?php foreach ($sliders as $slider): ?>

				<div class="item-slick1 item2-slick1" style="background-image: url(<?php echo $pathAssets; ?>images/slider/<?php echo $slider['image_slider'] ?>);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170 p-5">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn" style="color: <?php echo $slider['color_header'] ?>">
							<h1><?php echo $slider['header_slider'] ?></h1>
						</span>

						<h6 class="caption2-slide1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn" style="color: <?php echo $slider['color_desc'] ?>; font-size: 20px; padding: 15px 40px;">
							<?php echo $slider['desc_slider'] ?>
						</h6>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							<a href="<?php echo $slider['link_to_slider'] ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4" style="<?php if($slider['display_button'] == 1){echo 'style: none';} ?>" target="_blank">
								<?php echo $slider['name_to_link'] ?>
							</a>
						</div>
					</div>
				</div>

				<?php endforeach ?>

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
					
					<a href="https://www.facebook.com/anis.muhasanah" class="btn btn-success btn-md m-3" target="_blank">
						Tanya Kami Di Sini
					</a>
				</div>
			</div>
		</div>
	</section>
	
	<!-- Products -->
	<section class="bgwhite p-t-45 p-b-58">
		<div class="container" id="produk-kami" style="background: #f0f0f0;">
			<div class="sec-title p-b-22 pt-5">
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
							<div class="card">
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative <?php echo $product['label_product'] ?>">
										<img src="<?php echo $pathAssets . '/images/products/' . $product['img_product_1'] ?>" alt="IMG-PRODUCT" width="270" height="300">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<a href="#" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" data-toggle="modal" data-target="#exampleModal" onclick="showModal(`<?php echo $product['name_product'] ?>`)">
													Pesan Ini
												</a>
											</div>
										</div>
									</div>
									
									<div class="card-body">
										<div class="block2-txt text-center">
											<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
												<?php echo ucfirst($product['name_product']) ?>
											</a>

											<span class="block2-price m-text6 p-r-5">
												Rp. <?php echo number_format($product['price_product'], 0,',','.')  ?>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</section>
	
	<!-- Countdown -->
	<section class="parallax0 parallax100" style="background-image: url(<?php echo $pathAssets . 'images/countdown/glasses2.jpg'?>)">
		<div class="overlay0 p-t-190 p-b-200">

			<div class="t-center">
				<p href="product-detail.html" class="dis-block s-text3 p-b-5" style="color: white; font-size: 32px">
					AYO SEGERA LAKUKAN PEMESANAN <br>DENGAN MENGKLIK TOMBOL DIBAWAH INI
				</p>
				<br>
				<a href="<?php echo base_url('produk') ?>" class="btn btn-large btn-success" >Pesan Sekarang <i class="fa fa-cart" style="color: white"></i></a>
			</div>
		</div>
	</section>

	<!-- Testimonials -->
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Testimonial Konsumen
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
								<img src="<?php echo $pathAssets . 'images/testimonials/' . $testimonial['image_testimonial'] ?>" alt="IMG-TESTIMONIAL" width="200" height="300">

								<div class="block2-overlay trans-0-4">
									<p class="p-4" style="color: white; font-weight: 700; font-style: italic;">
										<?php echo '" ' . $testimonial['desc_testimonial'] . ' " <br> ~ ' . $testimonial['customer_by'] ?>
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

	<hr>
	
	<!-- Banners -->
	<div class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Banners
				</h3>
			</div>

			<div class="row">
					
				<?php foreach ($banners as $banner): ?>
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo $pathAssets ."images/banner/". $banner['img_banner']  ?>" alt="IMG-BANNER" width="410" height="370">

						<div class="block1-wrapbtn w-size2" style="display: <?php echo $banner['not_activated'] == 1 ? 'none' : '' ; ?>"> 
							<!-- Button -->
							<a href="<?php echo $banner['link_to_banner'] ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4" target="_blank">
								<?php echo $banner['name_banner'] ?>
							</a>
						</div>
					</div>
				</div>
				<?php endforeach ?>

			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade col-sm-12" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-size: 12px">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Form Pesanan</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" id="formPesanan">
	      	<!-- Inject Here modal -->
	      </div>
	      <div class="modal-footer">
	        <a href="#" class="btn btn-primary" id="beli">Beli</a>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

		<script type="text/JavaScript">
		
		/**
		* View form pesanan
		*
		* @param product click     string
		*/
		function showModal(product) {

			$('#formPesanan').html(`
			      	<table class="table table-bordered table-responsive">
			      		<tr>
			      			<td>Nama</td>
			      			<td colspan="2"><input type="text" id="nama" class="form-control" placeholder="Masukkan Nama"></td>
			      		</tr>
			      		<tr>
			      			<td>No Hp Penerima</td>
			      			<td colspan="2"><input type="number" id="hp" class="form-control" placeholder="Masukkan No Hp"></td>
			      		</tr>
			      		<tr>
			      			<td>Alamat <br>Pengiriman</td>
			      			<td colspan="2">
			      				<textarea id="alamat" class="form-control" rows="4" style="resize: none"></textarea>
			      			</td>
			      		</tr>
			      		<tr>
			      			<td>Kurir</td>
		      				<td colspan="2">
			      				<select id="kurir" class="form-control">
								<?php foreach($couriers as $courier) : ?>
									<option value="<?php echo $courier['name_kurir'] ?>"><?php echo $courier['name_kurir'] ?></option>
								<?php endforeach; ?>
			      				</select>
		      				</td>
			      		</tr>
			      		<tr>
			      			<td>Layanan</td>
		      				<td colspan="2"><input type="text" id="layanan" class="form-control" placeholder="paket kurir. contoh: reg, express, dll"></td>
		  				</tr>
			      		<tr>
			      			<td>Pesanan</td>
			      			<td><input type="text" id="pesanan" class="form-control" value="${product}"></td>
			      			<td><input type="text" id="qty" value="1"></td>
			      		</tr>
			      	</table>
			      	<small>
			      		<ul>
			      			<li><strong>* Beli : Anda akan diarahkan ke chatingan WA kami sesuai form yang anda masukkan disini</strong></li>
			      		</ul>
			      	</small>
			`)

		}
		
		$('#beli').click(function(event) {
			
			
			let nama = $('#nama').val()
			let hp = $('#hp').val()
			let alamat = $('#alamat').val()
			let kurir = $('#kurir').val()
			let layanan = $('#layanan').val()
			let pesanan = $('#pesanan').val()
			let qty = $('#qty').val()
			
			let telp1 = `<?php echo $contacts['no_whatsapp'] ?>`;
			let length = telp1.length;
            let telp = `62`+telp1.substring(1, length);

			$(this).attr('href',`https://web.whatsapp.com/send?phone=`+telp+`&text=Nama%20:%20${nama}%0A Alamat%20:%20${alamat}%0A Hp%20:%20${hp}%0A Kurir%20:%20${kurir}%0A Layanan%20:%20${layanan}%0A pesanan%20:%20${pesanan}%0A qty%20:%20${qty}`)

			$(this).attr('target',`_blank`)
		});
			
	</script>


