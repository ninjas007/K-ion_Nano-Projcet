	<?php $pathAssets = base_url('assets/template_frontend/') ?>
	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">

			<!-- Address or message for admin -->
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3 col-md-3 col-sm-12">
				<h4 class="s-text12 p-b-30">
					HUBUNGI KAMI
				</h4>

				<div>
					<p class="s-text7 w-size27">
						<?php echo $address['desc_address'] ?>
					</p>

					<div class="flex-m p-t-30">
						<a href="https://www.facebook.com/anis.muhasanah" class="fs-18 color1 p-r-20 fa fa-facebook" target="_blank"></a>
						<a href="https://www.instagram.com/" class="fs-18 color1 p-r-20 fa fa-instagram"  target="_blank"></a>
						<a href="https://web.whatsapp.com/send?phone=<?php $telp = substr($contacts['no_whatsapp'], 1, 12); echo '62' . $telp; ?>" class="fs-18 color1 p-r-20 fa fa-whatsapp" target="_blank"></a>
					</div>
				</div>
			</div>
			
			<!-- Link footer -->
			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4 col-md-2 col-sm-12">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<?php foreach ($navbars as $navbar): ?>
					<li><a href="<?php echo $navbar['link_of_navbar'] ?>" style="color: black"><?php echo $navbar['name_navbar'] ?></a></li>
					<?php endforeach ?>
				</ul>
			</div>

			<!-- Info Rekening  -->
			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4 col-md-2 col-sm-12">
				<h4 class="s-text12 p-b-30">
					Helps
				</h4>

				<ul>
					<li><a href="<?php echo base_url('frontend/info') ?>">Rekening Kami</a></li>
					<li><a href="<?php echo base_url('frontend/info') ?>">Kurir</a></li>
					<li>FAQs</li>
				</ul>
			</div>
			
			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3 col-md-4 col-sm-12 pull-right" id="advertisement">
				<p>Segera lakukan pemesanan, <span style="color: #218838; font-weight: 900; font-size: 20px">STOK TERBATAS. </span> pastikan anda menghubungi distributor resmi kami. Hubungi Facebook kami di <br> <a href="https://facebook.com/anis.muhasanah" style="font-size: 20px; color: black">Anis Muhasanah</a> <br> atau Melalui WA kami
				<?php echo '<a href="https://web.whatsapp.com/send?phone='.$contacts['no_whatsapp'].'" style="color: black; font-size: 20px">'.$contacts['no_whatsapp'].'</a>'; ?></p>
			</div>

		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="<?php echo $pathAssets; ?>images/icons/Whatsapp.png" alt="IMG-WHATSAPP">
				<?php echo $contacts['no_whatsapp'] ?>
			</a>
			<div class="t-center s-text8 p-t-20">
				Copyright © 2019 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> Edited by <a href="https://www.facebook.com/0x566F4e" style="color: green">Von</a> 
			</div>
		</div>
	</footer>

