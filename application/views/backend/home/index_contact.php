<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Contact
    <small>Update</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header ui-sortable-handle" style="cursor: move;">
            <i class="ion ion-clipboard"></i>
            <h3 class="box-title">Setting  Contact</h3>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
            	<label for="contact">Contact</label>
            	<input type="text" class="form-control" id="contact" placeholder="Masukkan nomor contact jualan...">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix no-border">
            <button type="button" class="btn btn-primary pull-right" onclick="update()"><i class="fa fa-save"></i> Save</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper-->

<script type="text/JavaScript">
	/**
	* get data contact from db
	*
	*/
	function get() {
		$.ajax({
			url: 'contact/get',
			type: 'GET',
			dataType: 'json',
			success: function (response) {
				
				$('#contact').val(response.no_whatsapp)
			
			}
		})		
	}

	get() // call function get
	
	/**
	* update contact
	*
	*/
	function update() {
		
		let contact = $('#contact').val()

		$.ajax({
			url: 'contact/update',
			type: 'POST',
			dataType: 'json',
			data: {contact: contact},

			success: function (response) {
				if (response.status == true) {
				  swal(response.message, { icon: "success" });
				  $('.swal-button').click(function(event) {
				    get()
				  });
				} else {
				  swal(response.message, { icon: "error" });
				}
			}
		})
	}
</script>