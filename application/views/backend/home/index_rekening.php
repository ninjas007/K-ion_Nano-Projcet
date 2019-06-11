<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Daftar Rekening
    <small>Add, Edit, Delete</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
        <div class="box-header ui-sortable-handle" style="cursor: move;">
          <i class="ion ion-clipboard"></i>
          <h3 class="box-title">Setting  Rekening</h3>
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
          <button type="button" class="btn btn-default pull-right" onclick="add()" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Rekening</button>
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
  * get rekening
  */
  function get() {

    $('.box-body ul').html('get data rekening');

    $.ajax({
      url: 'rekening/get',
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
              <span class="text">${el.nama_bank}</span>
              <span class="text" style="font-style: italic; font-size: 12px; color: blue"> a/n ${el.atas_nama} ( ${el.no_rekening} )</span>
              <small class="label label-danger pull-right">
                <a id="hapus" onclick="hapus(\`${el.id_rekening}\`)" style="color: white" title="Hapus rekening">
                <i class="fa fa-trash-o"></i></a>
              </small>
              <small class="label label-info pull-right">
                <a id="edit"
                onclick="edit(\`${el.id_rekening}\`,\`${el.nama_bank}\`,\`${el.atas_nama}\`,\`${el.no_rekening}\`)" data-toggle="modal" data-target="#myModal" style="color: white" title="Edit rekening">
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
  * Edit rekening
  */
  function edit(id, bank, nama, rekening) {

    $('#simpan-add').hide()
    $('#simpan-edit').show()
    $('.modal-title').html('Edit rekening')

    $('#myModal .modal-content .modal-body table').html(`
        <tr>
          <td>Nama Bank</td>
          <td><input type="text" class="form-control" id="bank" value="${bank}"></td>
        </tr>
        <tr>
          <td>Atas Nama</td>
          <td><input type="text" class="form-control" id="nama" value="${nama}"></td>
        </tr>
        <tr>
          <td>Rekening</td>
          <td><input type="text" class="form-control" id="rekening" value="${rekening}"></td>
        </tr>
      `)
    
    $('#simpan-edit').click(function(e) {

      let bank = $('#bank').val()
      let nama = $('#nama').val()
      let rekening = $('#rekening').val()

      $.ajax({
        url: 'rekening/update',
        type: 'POST',
        dataType: 'json',
        data: {id: id, bank: bank, nama: nama, rekening: rekening},
        success: function (response) {
          swal(response.message, { icon: "success" });
          get()
        }
      })
    });
        
  }
  
  /**
  * Add rekening
  */
  function add() {

    $('#simpan-edit').hide()
    $('#simpan-add').show()
    $('.modal-title').html('Add Rekening')
    
    // show model is add item menu
    $('#myModal .modal-content .modal-body table').html(`
        <tr>
          <td>Nama Bank</td>
          <td><input type="text" class="form-control" id="bank"></td>
        </tr>
        <tr>
          <td>Atas Nama</td>
          <td><input type="text" class="form-control" id="nama"></td>
        </tr>
        <tr>
          <td>Rekening</td>
          <td><input type="text" class="form-control" id="rekening"></td>
        </tr>
      `)
  
    // process ajax save
    $('#simpan-add').click(function(e) {

      let bank = $('#bank').val()
      let nama = $('#nama').val()
      let rekening = $('#rekening').val()

      $.ajax({
        url: 'rekening/add',
        type: 'POST',
        dataType: 'json',
        data: {bank: bank, nama: nama, rekening: rekening},
        success: function (response) {
          swal(response.message, { icon: "success" });
          get()
        }
      })
    });
    
  }

  /**
  * Delete rekening
  */
  function hapus(id) {
    swal({
      title: "yakin ingin menghapus rekening ini?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {

      if (willDelete) {
        $.ajax({
          url: 'rekening/hapus',
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