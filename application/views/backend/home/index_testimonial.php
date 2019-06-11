<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Testimonials
    <small>Add, Edit, Delete</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header ui-sortable-handle" style="cursor: move;">
            <i class="fa fa-gear"></i>
            <h3 class="box-title">Setting  Testimonials</h3>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <a href="#" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#myModal" onclick="add()"><i class="fa fa-plus"></i> Add Testimonial</a>
            <br>
            <br>
            <button class="btn btn-sm btn-primary" id="back"><i class="fa fa-arrow-left"></i> Back</button>
            <button class="btn btn-sm btn-primary" id="next">Next <i class="fa fa-arrow-right"></i></button>
            <h4 class="pull-right">Total testimonial : <span id="totalTestimonial"></span></h4>
            <br><br>
            <table class="table table-striped table-responsive table-bordered" id="table-testimonial">
              <thead>
                <tr>
                  <th>#</th>
                  <th width="400">Description Testimonial</th>
                  <th>Customer</th>
                  <th>Image</th>
                  <th>Date Modified</th>
                  <th class="text-center" width="100">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Inject testimonial here -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper-->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <form method="post" enctype="multipart/form-data" id="form-save">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center"></h4>
      </div>
      <div class="modal-body">
        <table class="table" id="table-form">
        <!-- Inject data form -->
        </table>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="simpan-add">Simpan</button>
        <button type="submit" class="btn btn-primary" id="simpan-edit">Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
</div>

<script type="text/JavaScript">
  
  /**
  * Pagination back page
  *
  */
  $('#back').click(function(e) {
    
    var lengthBack = $('#table-testimonial tbody tr:first-child td:first-child').text();
    var length = parseInt(lengthBack) - 11;
    if (lengthBack != 1) {
        get(length);
    }

  });

  /**
  * Pagination next page
  *
  */
  $('#next').click(function(e) {
     
      var lengthNext = $('#table-testimonial tbody tr:last-child td:first-child').text();
      if (lengthNext != $('#totalTestimonial').text()) {
          get(lengthNext);
      }
      
  });
  
  /**
  * Get data products
  * 
  * @response    show table
  */
  function get(limit = 0) {
    
    $('#table-testimonial tbody').html('<tr><td colspan="9">get data...</td></tr>')

    $.ajax({
      url: 'testimonial/get',
      type: 'get',
      dataType: 'json',
      data: {limit: limit},
      success: function (response) {

        let output = '';
        let path = window.location.pathname.split('/', 2)
        let assets = window.location.origin + '/' + path[1] + '/assets/template_frontend/images/testimonials/'
        
        $.each(response.data, function(index, el) {
          
          output += `
            <tr>
              <td>${parseInt(limit) + 1}</td>
              <td>${el.desc_testimonial}</td>
              <td>${el.customer_by}</td>
              <td><img src="`+assets+`${el.image_testimonial}" width="30" height="30"></td>
              <td>${el.date_modified}</td>
              <td class="text-center">
              <a href="#" onclick="edit(
                          \`${el.id_testimonial}\`,
                          \`${el.desc_testimonial}\`,
                          \`${el.customer_by}\`,
                          \`${el.image_testimonial}\`)"
            data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-primary" title="Edit Testimonial"><i class="fa fa-pencil"></i></a>
                <a href="#" class="btn btn-sm btn-danger" title="Delete Testimonial" onclick="hapus(\`${el.id_testimonial}\`)"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          `
          limit++;
        });

        $('#table-testimonial tbody').html(output)
        $('#totalTestimonial').html(response.totalRows)
      }

    })
    
  }
  
  /**
  * Edit data testimonial
  * 
  * @response
  */
  function edit(id, desc, customer, img) {
    
    $('#myModal .modal-content .modal-body table').html(`get data...`)
    $('#simpan-add').hide()
    $('#simpan-edit').show()
    $('.modal-title').html('Edit Testimonial')

    let path = window.location.pathname.split('/', 2)
    let assets = window.location.origin + '/' + path[1] + '/assets/template_frontend/images/testimonials/'

    $('#myModal .modal-content .modal-body table').html(`
        <tr>
          <td valign="top">Description</td>
          <td>
            <input type="hidden" name="id" value="${id}">
            <textarea class="form-control" name="desc" cols="3" rows="5" style="resize: none" maxlength="210">${desc}</textarea>
          </td>
        </tr>
        <tr>
          <td>Customer</td>
          <td><input type="text" class="form-control" name="customer" value="${customer}" maxlength="30"></td>
        </tr>
        <tr>
          <td>Image</td>
          <td><input type="file" class="form-control" name="img"></td>
        </tr>
        <tr><td><img src="`+assets+`${img}" width="50" height="50"></td><tr>
        `)

    // process ajax save
    $('#form-save').submit(function(e) {
      
      e.preventDefault()

      $.ajax({
          url: 'testimonial/update',
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
              $('.swal-button').click(function(event) {
                location.reload()
              });
            } else {
              swal(response.message, { icon: "error" });
            }
          }
      })
    });
  }

  /**
  * Add data testimonial
  * 
  * @response
  */
  function add() {
    
    $('#simpan-edit').hide()
    $('#simpan-add').show()
    $('.modal-title').html('Add Testimonial')

    $('#myModal .modal-content .modal-body table').html(`
        <tr>
          <td valign="top">Description</td>
          <td>
            <textarea  rows="4" class="form-control" name="desc" style="resize: none" maxlength="210"></textarea>
          </td>
        </tr>
        <tr>
          <td>Customer Name</td>
          <td><input type="text" class="form-control" name="customer" maxlength="30"></td>
        </tr>
        <tr>
          <td>Image</td>
          <td><input type="file" class="form-control" name="img"></td>
        </tr>
        `)
    
    // process ajax save
    $('#form-save').submit(function(e) {
      
      e.preventDefault()

      $.ajax({
          url: 'testimonial/add',
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
              $('.swal-button').click(function(event) {
                location.reload()
              });
            } else {
              swal(response.message, { icon: "error" });
            }
          }
      })
    });
  }

  /**
  * Delete testimonial
  *
  */
  function hapus(id) {
    
    swal({
      title: "yakin ingin menghapus testimonial ini?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {

      if (willDelete) {
         $.ajax({
           url: 'testimonial/delete',
           type: 'POST',
           dataType: 'json',
           data: {id: id},

           success: function (response) {
             if (response.status == true) {
                swal(response.message, { icon: "success" });
                get()
             } else {
                swal(response.message, { icon: "error" });
             }
           }
         })
      }

    });   

  }

  // call function get
  get()
    
</script>