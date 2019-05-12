<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Marquee / Text Berjalan
    <small>Edit, Enabled or Disabled</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
        <div class="box-header ui-sortable-handle" style="cursor: move;">
          <i class="fa fa-gear"></i>
          <h3 class="box-title">Setting Marquee</h3>
          <div class="box-tools pull-right">
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
          <button type="button" class="btn btn-primary pull-right" onclick="save()"><i class="fa fa-save"></i> Save</button>
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
  * get data marquee text
  *
  */ 
  function get() {
    $.ajax({
      url: 'marquee/get',
      type: 'GET',
      dataType: 'json',
      success: function (response) {
        
        let no_activate = '';
        
        if (response.not_activate == 1) {
          no_activate = 'selected';
        }

        $('.box-body').html(`
          <p><marquee behavior="" direction="">${response.marquee}</marquee></p>
          <input type="text" class="form-control" placeholder="Tulis marquee disini" id="marquee">
          <br>
          <label for="">Aktifkan / Non aktifkan marquee</label>
          <select class="form-control" id="no-active">
            <option value="0">Aktif marquee</option>
            <option value="1" `+no_activate+`>Non aktif marquee</option>
          </select>
          `)
          
      }
    })
  }
  
  /**
  * save setting marquee
  *
  */ 
  function save() {

    let marquee = $('#marquee').val()
    let nonaktif = $('#no-active').val()

    $.ajax({
      url: 'marquee/save',
      type: 'POST',
      dataType: 'json',
      data: {marquee: marquee, status: nonaktif},
      success: function (response) {
        swal({text: response.message, icon: "success"})
        get()
      }
    })
    
  }

  get()

</script>