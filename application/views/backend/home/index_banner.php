<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Banners
    <small>Add, Edit, Delete</small>
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
          <!-- /.box-body -->
          <div class="box-footer clearfix no-border">
            <button type="button" class="btn btn-primary pull-right" onclick="add()" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Slider</button>
          </div>
        </div>
      </div>
      <div class="col-md-6" id="view-slider">
        <div class="box box-primary">
          <div class="box-header ui-sortable-handle" style="cursor: move;">
            <i class="fa fa-list"></i>
            <h3 class="box-title">Slider display</h3>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <!-- Inject slider here -->.
              </div>
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="fa fa-angle-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="fa fa-angle-right"></span>
              </a>
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
    <form method="post" enctype="multipart/form-data" id="form-add">
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
* get slider item
*/
function get() {
  
  $('.box-body#change-slider ul').html('get data...'); // show menu slider
  $('#carousel-example-generic .carousel-inner').html('get data...'); // show display slider

  $.ajax({
    url: 'slider/get',
    type: 'GET',
    dataType: 'json',
    success: function (response) {
      let output1 = '';
      let output2 = '';
      let path = window.location.pathname.split('/', 2)
      let assets = window.location.origin + '/' + path[1] + '/assets/template_frontend/images/slider/'
      
      // looping data slider
      $.each(response, function(index, el) {
        
        let active = '';

        // check active item slider to carousel
        if (el.id_slider == 1) {
          active = 'active';
        }
        
        // for show menu slider left display
        output1 += `
          <li>
            <span class="handle ui-sortable-handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
            <span class="text">Slider ${index + 1}</span>
            <small class="label label-danger pull-right">
              <a id="hapus" onclick="hapus(\`${el.id_slider}\`)" style="color: white" title="Hapus item">
              <i class="fa fa-trash-o"></i></a>
            </small>
            <small class="label label-info pull-right">
              <a id="edit"
              onclick="edit(\`${el.id_slider}\`,
                            \`${el.header_slider}\`,
                            \`${el.color_header}\`,
                            \`${el.desc_slider}\`,
                            \`${el.color_desc}\`,
                            \`${el.link_to_slider}\`,
                            \`${el.name_to_link}\`,
                            \`${el.display_button}\`,
                            \`${el.image_slider}\`)"
              data-toggle="modal" data-target="#myModal" style="color: white" title="Edit item">
              <i class="fa fa-edit"></i>
            </a>
            </small>
          </li>
        `;
        
        // for show slider display
        output2 += `
          <div class="item `+active+`">
            <img src="`+assets+`${el.image_slider}" width="500" height="300">
            <div class="carousel-caption">
            <p style="color: ${el.color_header}">${el.header_slider}</p>
            <p style="color: ${el.color_desc}">${el.desc_slider}</p>
            <p><a href="${el.link_to_slider}" class="btn btn-sm btn-default">${el.name_to_link}</a></p>
            </div>
          </div>
        `;

      });
      
      $('.box-body#change-slider ul').html(output1); // show menu slider
      $('#carousel-example-generic .carousel-inner').html(output2); // show display slider
    }

  })
}

/**
* get slider item
*
* @param id   string
* @param header   string
* @param color header   string
* @param description    string
* @param color description    string
* @param link button    string
* @param text button    string
* @param display button    number
* @param name image   string
*
*/
function edit(id, header, c_header, desc, c_desc, link, name, display, image) {

  let path = window.location.pathname.split('/', 2)
  let assets = window.location.origin + '/' + path[1] + '/assets/template_frontend/images/slider/'
  
  $('#myModal .modal-content .modal-body table').html(`<tr><td>get data...</td></tr>`)
  $('#simpan-add').hide()
  $('#simpan-edit').show()
  $('.modal-title').html('Edit Slider')

  function checkActive(display) {
    if (display == 1) {
      return 'selected';
    }
  }

  function disabledText(display) {
    if (display == 1) {
      return 'disabled';
    }
  }

  $('#myModal .modal-content .modal-body table').html(`
      <tr>
        <td>Header</td>
        <td><input type="hidden" name="id" id="id_slider" value="${id}">
        <input type="text" class="form-control" name="header" id="header" maxlength="30" value="${header}"></td>
      </tr>
      <tr>
        <td>Color Header</td>
        <td><input type="color" class="form-control" name="c_header" id="c_header" value="${c_header}"></td>
      </tr>
      <tr>
        <td>Description</td>
        <td><input type="text" class="form-control" name="desc" id="desc" maxlength="70" value="${desc}"></td>
      </tr>
      <tr>
        <td>Color Description</td>
        <td><input type="color" class="form-control" name="c_desc" id="c_desc" value="${c_desc}"></td>
      </tr>
      <tr>
        <td>Link button</td>
        <td><input type="text" class="form-control" name="linkButton" maxlength="50" id="link" value="${link}"></td>
        <td colspan="2">
          <select name="displayButton" id="displayButton" class="form-control">
            <option value="0">Aktif Button</option>
            <option value="1" `+checkActive(display)+`>Non Aktif Button</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Text button</td>
        <td><input type="text" class="form-control" name="textButton" maxlength="15" id="textButton" value="${name}" `+disabledText(display)+`></td>
      </tr>
      <tr>
        <td>Image</td>
        <td><input type="file" class="form-control" name="image" id="image"></td>
      </tr>
      <tr>
        <td></td>
        <td><img src="`+assets+`${image}" width="50" height="30"></td>
      </tr>
    `)
  
  $('#form-add').submit(function(e) {

    e.preventDefault()

    $.ajax({
        url: 'slider/update',
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

/**
* Add slider item
*
*/
function add() {

  $('#simpan-edit').hide()
  $('#simpan-add').show()
  $('.modal-title').html('Add Slider Item')
  
  $('#myModal .modal-content .modal-body table').html(`
      <tr>
        <td>Header</td>
        <td><input type="text" class="form-control" name="header" maxlength="30" id="header"></td>
      </tr>
      <tr>
        <td>Color Header</td>
        <td><input type="color" class="form-control" name="c_header" id="c_header" value="#ffffff"></td>
      </tr>
      <tr>
        <td>Description</td>
        <td><input type="text" class="form-control" name="description" maxlength="70" id="desc"></td>
      </tr>
      <tr>
        <td>Color Description</td>
        <td><input type="color" class="form-control" name="c_desc" id="c_desc" value="#ffffff"></td>
      </tr>
      <tr>
        <td>Link button</td>
        <td><input type="text" class="form-control" name="linkButton" maxlength="50" id="link"></td>
        <td colspan="2">
          <select name="displayButton" id="displayButton" class="form-control">
            <option value="0">Aktif</option>
            <option value="1">Non Aktif</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Text button</td>
        <td><input type="text" class="form-control" name="textButton" maxlength="15" id="name"></td>
      </tr>
      <tr>
        <td>Image</td>
        <td><input type="file" class="form-control" name="image" id="image"></td>
      </tr>
    `)
  
  // process ajax save
  $('#form-add').submit(function(e) {
    
    e.preventDefault()

    $.ajax({
        url: 'slider/add',
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

/**
* Delete slider
* 
* @param id slider
*/
function hapus(id) {
  swal({
    title: "yakin ingin menghapus slide ini?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {

    if (willDelete) {
        $.ajax({
          url: 'slider/delete',
          type: 'POST',
          dataType: 'json',
          data: {id: id},

          success: function (response) {
            if (response.status == true) {
              swal(response.message, { icon: "success" });
            } else {
              swal(response.message, { icon: "error" });
            }
            get()
          }
        })      
    }

  });
  
}

// cal method get / init
get()

</script>