	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/template_frontend/'); ?>images/countdown/glasses2.jpg);">
		<h2 class="l-text2 t-center">
			INFO
		</h2>
		<p class="m-text13 t-center">
			K-Ion Glasses
		</p>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-12 p-30">
					<h3 class="m-text26 p-t-15 p-b-16">
						Kontak
					</h3>
					<p>
						WA : <?php echo $contacts['no_whatsapp'] ?>
					</p>
				</div>
				<div class="col-md-4 col-sm-12 p-30">
					<h3 class="m-text26 p-t-15 p-b-16">
						Kurir
					</h3>
					<p>
						<?php foreach ($couriers as $courier): ?>
							<?php echo $courier['name_kurir'] . ',' ?>
						<?php endforeach ?>
					</p>
				</div>
				<div class="col-md-4 col-sm-12 p-30">
					<h3 class="m-text26 p-t-15 p-b-16">
						Rekening Kami
					</h3>
					<p>
						<?php foreach ($rekenings as $rekening): ?>
							<?php echo '<li>' . $rekening['nama_bank'] . ' | ' . $rekening['atas_nama'] . ' | ' . $rekening['no_rekening'] . '</li>' ?>
						<?php endforeach ?>
					</p>
				</div>
			</div>
		</div>
	</section>


	