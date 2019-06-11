<?php $pathAssets = base_url('assets/template_frontend/') ?>

<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo $pathAssets ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo $pathAssets ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo $pathAssets ?>vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo $pathAssets ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo $pathAssets ?>vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo $pathAssets ?>js/main.js"></script>

</body>
</html>