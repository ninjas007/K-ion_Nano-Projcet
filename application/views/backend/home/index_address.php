<style>
	#editor-textarea{
		width: 100%;
		height: 250px;
		font-size: 14px;
		line-height: 18px;
		border: 1px solid #dddddd;
		padding: 10px;
		resize: none;
	}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Address
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
            <h3 class="box-title">Setting  Address</h3>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="change-address">
            <textarea class="textarea" id="editor-textarea" onkeyup="refresh()" placeholder="Place some text here"></textarea>
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix no-border">
            <button type="button" class="btn btn-primary pull-right" onclick="update()"><i class="fa fa-save"></i> Save</button>
          </div>
        </div>
      </div>
      <div class="col-md-6" id="view-slider">
        <div class="box box-primary">
          <div class="box-header ui-sortable-handle" style="cursor: move;">
            <h3 class="box-title">Address display</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <iframe id="viewer" style="border:none; width:100%; height: 300px"></iframe>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper-->

<script type="text/JavaScript">
	/**
	* override text to display
	*
	*/
	function refresh() {
		let textContent = $('#editor-textarea').val();
		document.getElementById('viewer').srcdoc = textContent;
	}

	/**
	* get data address from db
	*
	*/
	function get() {
		$.ajax({
			url: 'address/get',
			type: 'GET',
			dataType: 'json',
			success: function (response) {
				
				$('#editor-textarea').html(response.desc_address)
				refresh()
			
			}
		})		
	}

	get() // call function get
	
	/**
	* update address
	*
	*/
	function update() {
		
		let content = $('#editor-textarea').val()

		$.ajax({
			url: 'address/update',
			type: 'POST',
			dataType: 'json',
			data: {content: content},

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