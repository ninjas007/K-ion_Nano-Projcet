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
    Description to Sell
    <small>Add, Edit, Delete</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-gear"></i> Edit Description</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
            	<div class="form-group">
	            	<h4 for="">Header Description</h4>
    	        	<input type="text" class="form-control" name="header" id="header">    		
            	</div>
            	<br>
                <textarea class="textarea" id="editor-textarea" onkeyup="refresh()" placeholder="Place some text here"></textarea>
   				<button type="button" class="btn btn-primary pull-right" onclick="update()">Save</button>
            </div>
          </div>
          <div class="box-footer text-center">
            <iframe id="viewer" style="border:none; width:100%; height: 300px"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
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
	* get data description from db
	*
	*/
	function get() {
		$.ajax({
			url: 'description/get',
			type: 'GET',
			dataType: 'json',
			success: function (response) {
				
				$('#header').val(response.header_description)
				$('#editor-textarea').html(response.description)
				refresh()
			
			}
		})		
	}

	get() // call function get
	
	/**
	* update description
	*
	*/
	function update() {
		let header = $('#header').val()
		let content = $('#editor-textarea').val()

		$.ajax({
			url: 'description/update',
			type: 'POST',
			dataType: 'json',
			data: {header: header, content: content},

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