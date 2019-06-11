<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Banners
    <small>Edit</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header ui-sortable-handle" style="cursor: move;">
            <i class="ion ion-clipboard"></i>
            <h3 class="box-title">Setting  Banner</h3>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="change-slider">
            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
            <ul class="todo-list ui-sortable">
              <!-- Inject here todo -->
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-6" id="view-slider">
        <div class="box box-primary">
          <div class="box-header ui-sortable-handle" style="cursor: move;">
            <i class="fa fa-list"></i>
            <h3 class="box-title">Banner display</h3>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row" id="display-banner">
              
            </div>
          </div>
          <!-- /.box-body -->
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
    <form method="post" enctype="multipart/form-data" id="form-edit">
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
        <button type="submit" class="btn btn-primary" id="simpan-edit">Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
</div>

<script type="text/JavaScript">

/**
* get slider item
*/
function get() {
  

  $.ajax({
    url: 'banner/get',
    type: 'GET',
    dataType: 'json',
    success: function (response) {
      let output1 = '';
      let output2 = '';
      let path = window.location.pathname.split('/', 2)
      let assets = window.location.origin + '/' + path[1] + '/assets/template_frontend/images/banner/'
      
      // looping data slider
      $.each(response, function(index, el) {
        
        // for show menu slider left display
        output1 += `
          <li>
            <span class="handle ui-sortable-handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
            <span class="text">Banner ${index + 1}</span>
            <small class="label label-info pull-right">
              <a id="edit"
              onclick="edit(\`${el.id_banner}\`,
                            \`${el.name_banner}\`,
                            \`${el.not_activated}\`,
                            \`${el.link_to_banner}\`,
                            \`${el.img_banner}\`,)"
              data-toggle="modal" data-target="#myModal" style="color: white" title="Edit Item">
              <i class="fa fa-edit"></i>
            </a>
            </small>
          </li>
        `;
        
        // for show slider display
        output2 += `
          <div class="col-md-4">
            <img src="`+assets+`${el.img_banner}" width="150" height="130"/>
          </div>
        `;

      });
      
      $('.box-body#change-slider ul').html(output1); // show menu slider
      $('#display-banner').html(output2); // show display slider
    }

  })
}

/**
* get banner item
*
* @param id   number
* @param link   string
* @param text   string
* @param display status    number
* @param image   string
*
*/
function edit(id, textButton, status, linkButton, image) {

  let path = window.location.pathname.split('/', 2)
  let assets = window.location.origin + '/' + path[1] + '/assets/template_frontend/images/banner/'
  
  $('#myModal .modal-content .modal-body table').html(`<tr><td>get data...</td></tr>`)

  function checkActive(status) {
    if (status == 1) {
      return 'selected';
    }
  }

  $('#myModal .modal-content .modal-body table').html(`
      <tr>
        <td>Header</td>
        <td><input type="hidden" name="id" value="${id}">
        <input type="text" class="form-control" name="textButton" maxlength="30" value="${textButton}"></td>
        <td colspan="2">
          <select name="statusButton" class="form-control">
            <option value="0">Aktif Button</option>
            <option value="1" `+checkActive(status)+`>Non Aktif Button</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Link button</td>
        <td><input type="text" class="form-control" name="linkButton" maxlength="50" id="link" value="${linkButton}"></td>
      </tr>
      <tr>
        <td>Image</td>
        <td><input type="file" class="form-control" name="image"></td>
      </tr>
      <tr>
        <td></td>
        <td><img src="`+assets+`${image}" width="50" height="30"></td>
      </tr>
    `)
  
  $('#form-edit').submit(function(e) {

    e.preventDefault()

    $.ajax({
        url: 'banner/update',
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
            location.reload()
          } else {
            swal(response.message, { icon: "error" });
          }
        }
    })
  });
}


// cal method get / init
get()

</script>