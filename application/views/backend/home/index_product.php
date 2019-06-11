<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Products
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
            <h3 class="box-title">Setting  Products</h3>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <a href="#" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#myModal" onclick="add()"><i class="fa fa-plus"></i> Add Product</a>
            <table class="table table-striped table-responsive table-bordered" id="table-product">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name Product</th>
                  <th>New Price</th>
                  <th>Image</th>
                  <th>Label Product</th>
                  <th>Date Modified</th>
                  <th class="text-center" width="100">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Inject product here -->
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
  * Get data products
  * 
  * @response    show table
  */
  function get() {
    
    $('#table-product tbody').html('<tr><td colspan="9">get data...</td></tr>')
  
    $.ajax({
      url: 'product/get',
      type: 'GET',
      dataType: 'json',
      success: function (response) {

        function status(label){
          if (label == 'block2-labelsale') {
            return 'Empty'
          } else {
            return 'Ready'
          }
        }


        let output = '';
        let path = window.location.pathname.split('/', 2)
        let assets = window.location.origin + '/' + path[1] + '/assets/template_frontend/images/products/'
        
        $.each(response, function(index, el) {
          
          output += `
            <tr>
              <td>${index+1}</td>
              <td>${el.name_product}</td>
              <td>${el.price_product}</td>
              <td><img src="`+assets+`${el.img_product_1}" width="30" height="30"></td>
              <td>`+status(el.label_product)+`</td>
              <td>${el.date_input}</td>
              <td class="text-center">
              <a href="#" onclick="edit(
                          \`${el.id_product}\`,
                          \`${el.name_product}\`,
                          \`${el.price_product}\`,
                          \`${el.img_product_1}\`,
                          \`${el.label_product}\`,)"
            data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-primary" title="Edit Product"><i class="fa fa-pencil"></i></a>
                <a href="#" class="btn btn-sm btn-danger" title="Delete Product" onclick="hapus(\`${el.id_product}\`)"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          `

        });

        $('#table-product tbody').html(output)
      }

    })
    
  }
  
  /**
  * Edit data product
  * 
  * @response
  */
  function edit(id, name, price, img, label) {
    
    $('#myModal .modal-content .modal-body table').html(`get data`)
    $('#simpan-add').hide()
    $('#simpan-edit').show()
    $('.modal-title').html('Edit Product')

    let path = window.location.pathname.split('/', 2)
    let assets = window.location.origin + '/' + path[1] + '/assets/template_frontend/images/products/'

    function cekLabel(label) {
      if (label == 'block2-labelsale') {
        return 'selected'
      }
    }

    $('#myModal .modal-content .modal-body table').html(`
        <tr>
          <td>Product Name</td>
          <td>
            <input type="hidden" name="id" value="${id}">
            <input type="text" class="form-control" name="name" value="${name}">
          </td>
        </tr>
        <tr>
          <td>Price</td>
          <td><input type="text" class="form-control" name="price" value="${price}"></td>
        </tr>
        <tr>
          <td>Label</td>
          <td>
            <select class="form-control" name="label">
              <option value="block2-labelnew">Ready</option>
              <option value="block2-labelsale" `+cekLabel(label)+`>Empty</option>
            </select>
          </td>
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
          url: 'product/update',
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
  * Add data product
  * 
  * @response
  */
  function add() {
    
    $('#simpan-edit').hide()
    $('#simpan-add').show()
    $('.modal-title').html('Add Product')

    let path = window.location.pathname.split('/', 2)
    let assets = window.location.origin + '/' + path[1] + '/assets/template_frontend/images/products/'

    $('#myModal .modal-content .modal-body table').html(`
        <tr>
          <td>Product Name</td>
          <td><input type="text" class="form-control" name="name"></td>
        </tr>
        <tr>
          <td>Price</td>
          <td><input type="number" class="form-control" name="price"></td>
        </tr>
        <tr>
          <td>Label</td>
          <td>
            <select class="form-control" name="label">
              <option value="block2-labelnew">Ready</option>
              <option value="block2-labelsale">Empty</option>
            </select>
          </td>
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
          url: 'product/add',
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
  * Delete produk
  *
  */
  function hapus(id) {
    
    swal({
      title: "yakin ingin menghapus produk ini?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {

      if (willDelete) {
         $.ajax({
           url: 'product/delete',
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