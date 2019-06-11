<?php $pathAssets = base_url('assets/template_frontend/') ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo $pathAssets; ?>images/countdown/glasses2.jpg);">
		<h2 class="l-text2 t-center">
			Product
		</h2>
		<p class="m-text13 t-center">
			K-Ion Glasses
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Info Rekening Kami
						</h4>

						<ul class="p-b-54">
							<?php foreach ($rekenings as $rekening) {
								echo '<li class="p-t-4"> <b>' . $rekening['nama_bank'] . '</b> <br> ' . $rekening['no_rekening'] . ' <br> '. ucfirst($rekening['atas_nama']) .'</li>';
							} ?>
						</ul>

						<!--  -->
						<h4 class="m-text14 pb-2">
							Kurir Support
						</h4>
						<ul>
							<?php foreach ($couriers as $courier): ?>
								<?php echo '<li>' . $courier['name_kurir'] . '</li>' ?>
							<?php endforeach ?>
						</ul>

						<div class="filter-color p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-12">
								Color
							</div>

							<ul class="flex-w">

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
									<label class="color-filter color-filter2" for="color-filter2"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
									<label class="color-filter color-filter4" for="color-filter4"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
									<label class="color-filter color-filter6" for="color-filter6"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
									<label class="color-filter color-filter7" for="color-filter7"></label>
								</li>
							</ul>
						</div>

					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

					<!-- Product -->
					<div class="row">

						<!-- Tab01 -->
						<div class="tab01">
							<!-- Tab panes -->
							<div class="tab-content p-t-35 row">
								<?php foreach ($products as $product): ?>
										
									<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
										<div class="card">
											<div class="block2">
												<div class="block2-img wrap-pic-w of-hidden pos-relative <?php echo $product['label_product'] ?>">
													<img src="<?php echo $pathAssets . '/images/products/' . $product['img_product_1'] ?>" alt="IMG-PRODUCT" width="200" height="205">

													<div class="block2-overlay trans-0-4">
														<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
															<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
															<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
														</a>

														<div class="block2-btn-addcart w-size1 trans-0-4">
															<a href="#" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" data-toggle="modal" data-target="#exampleModal" onclick="showModal(`<?php echo $product['name_product'] ?>`)">
																Pesan
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

					<!-- Pagination -->
					<!-- <div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div> -->
				</div>
			</div>
		</div>
	</section>
	
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

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>

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
