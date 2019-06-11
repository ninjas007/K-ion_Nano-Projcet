<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Daftar Kurir
    <small>Add, Edit, Delete</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-4">
        <div class="box box-primary">
        <div class="box-header ui-sortable-handle" style="cursor: move;">
          <i class="ion ion-clipboard"></i>
          <h3 class="box-title">Setting  Kurir</h3>
          <div class="box-tools pull-right">
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
          <ul class="todo-list ui-sortable">
            <!-- Inject here todo -->
          </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
          <button type="button" class="btn btn-default pull-right" onclick="add()" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add kurir</button>
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
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center"></h4>
      </div>
      <div class="modal-body">
        <table class="table">
        <!-- Inject data edit -->
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="simpan-add">Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="simpan-edit">Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/JavaScript">
  
  /**
  * get kurir
  */
  function get() {

    $('.box-body ul').html('get data kurir');

    $.ajax({
      url: 'kurir/get',
      type: 'GET',
      dataType: 'json',
      success: function (response) {

        let output = '';
        
        $.each(response, function(index, el) {
          output += `
            <li>
              <span class="handle ui-sortable-handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
              </span>
              <span class="text">${el.name_kurir}</span>
              <small class="label label-danger pull-right">
                <a id="hapus" onclick="hapus(\`${el.id_kurir}\`)" style="color: white" title="Hapus kurir">
                <i class="fa fa-trash-o"></i></a>
              </small>
              <small class="label label-info pull-right">
                <a id="edit"
                onclick="edit(\`${el.id_kurir}\`,\`${el.name_kurir}\`)" data-toggle="modal" data-target="#myModal" style="color: white" title="Edit kurir">
                <i class="fa fa-edit"></i>
              </a>
              </small>
            </li>
          `
        });

        $('.box-body ul').html(output);
      }
    })
  }

  /**
  * Edit kurir
  */
  function edit(id, kurir) {

    $('#simpan-add').hide()
    $('#simpan-edit').show()
    $('.modal-title').html('Edit kurir')

    $('#myModal .modal-content .modal-body table').html(`
        <tr>
          <td>Kurir</td>
          <td><input type="text" class="form-control" id="kurir" value="${kurir}"></td>
        </tr>
      `)
    
    $('#simpan-edit').click(function(e) {

      let kurir = $('#kurir').val()

      $.ajax({
        url: 'kurir/update',
        type: 'POST',
        dataType: 'json',
        data: {id: id, kurir: kurir},
        success: function (response) {
          swal(response.message, { icon: "success" });
          get()
        }
      })
    });
        
  }
  
  /**
  * Add kurir
  */
  function add() {

    $('#simpan-edit').hide()
    $('#simpan-add').show()
    $('.modal-title').html('Add Kurir')
    
    // show model is add item menu
    $('#myModal .modal-content .modal-body table').html(`
        <tr>
          <td>kurir</td>
          <td><input type="text" class="form-control" id="kurir"></td>
        </tr>
      `)
  
    // process ajax save
    $('#simpan-add').click(function(e) {

      let kurir = $('#kurir').val()

      $.ajax({
        url: 'kurir/add',
        type: 'POST',
        dataType: 'json',
        data: {kurir: kurir},
        success: function (response) {
          swal(response.message, { icon: "success" });
          get()
        }
      })
    });
    
  }

  /**
  * Delete kurir
  */
  function hapus(id) {
    swal({
      title: "yakin ingin menghapus kurir ini?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {

      if (willDelete) {
        $.ajax({
          url: 'kurir/hapus',
          type: 'POST',
          dataType: 'json',
          data: {id: id},
          success: function (response) {
            swal(response.message, { icon: "success" });
            get()
          }
        })      
      }

    });
    
  }
  
  // cal method get / init
  get()

</script>