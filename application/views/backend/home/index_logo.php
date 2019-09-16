<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Logo
    <small>Update</small>
    </h1>
  </section>
  <!-- Main content -->
	<form id="change-image" method="post" action="<?php echo base_url('backend/logo/update') ?>" enctype="multipart/form-data">
	  <section class="content">
	    <div class="row">
	      <div class="col-md-6">
	      	<?php echo $this->session->flashdata('alert') ?>
	        <div class="box box-primary">
	          <div class="box-header ui-sortable-handle" style="cursor: move;">
	            <i class="ion ion-clipboard"></i>
	            <h3 class="box-title">Setting  Logo</h3>
	            <div class="box-tools pull-right">
	            </div>
	          </div>
	          <!-- /.box-header -->
	          <div class="box-body">
		            <img src="<?php echo base_url('assets/template_frontend/images/logo/logo.jpg') ?>" width="100%" height="300">
					<br>
					<br>
		            <input type="file" name="image" class="form-control">
	          </div>
	          <!-- /.box-body -->
	          <div class="box-footer clearfix no-border">
	            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	</form>
  <!-- /.content -->
</div>
<!-- /.content-wrapper-->

<script type="text/JavaScript">
	
	/**
	* update logo
	*
	*/
	$('#change-image').submit(function(e) {

	  e.preventDefault()

	  $.ajax({
	      url: 'logo/update',
	      type: 'POST',
	      dataType: 'json',
	      data: new FormData(this),
	      processData:false,
	      contentType:false,
	      cache:false,
	      async:false,

	      success: function (response) {
	        if (response.status == true) {
	          swal(response.message, { icon: "success" });
	          $('.swal-button').click(function(e) {
	          	location.reload()
	          });
	        } else {
	          swal(response.message, { icon: "error" });
	        }
	      }
	  })
	});

</script>