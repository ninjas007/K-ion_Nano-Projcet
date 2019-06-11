<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Profile
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
            <h3 class="box-title">Setting  Admin</h3>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <form action="<?php echo base_url('backend/admin/update') ?>" method="POST">
          	<div class="box-body">
	            <div class="form-group">
	            	<label for="email">Email</label>
	            	<input type="text" class="form-control" name="email">
	            </div>
	            <div class="form-group">
	            	<label for="oldPassword">Password Lama</label>
	            	<input type="password" class="form-control" name="oldPassword">
	            </div>
	            <div class="form-group">
	            	<label for="newPassword">Password Baru</label>
	            	<input type="password" class="form-control" name="newPassword">
	            </div>
	            <div class="form-group">
	            	<label for="newPassword2">Confirm Password Baru</label>
	            	<input type="password" class="form-control" name="newPassword2">
	            </div>
	        </div>
	          <!-- /.box-body -->
	        <div class="box-footer clearfix no-border">
	            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
	        </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper-->