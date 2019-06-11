<?php $pathAssets = base_url('assets/template_frontend/') ?>

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

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/template_frontend/') ?>js/main.js"></script>

</body>
</html>

