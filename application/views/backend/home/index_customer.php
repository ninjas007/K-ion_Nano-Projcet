<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Data Customer</h1>
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
            <table class="table table-striped table-responsive table-bordered" id="table-testimonial">
              <?php if ($customers != NULL) { ?>
              <thead>
                <tr>
                  <th width="40">No</th>
                  <th>Nama Customer</th>
                  <th>No Hp Customer</th>
                  <th>Tgl Order</th>
                  <th>Deskripsi Order</th>
                  <th class="text-center" width="100">Delete</th>
                </tr>
              </thead>
              <tbody>
                <!-- Inject testimonial here -->
                <?php foreach ($customers as $key => $customer): ?>
                <tr>
                  <td align="center"><?php echo ++$key ?></td>
                  <td><?php echo $customer['nama_customer'] ?></td>
                  <td><?php echo $customer['nohp_customer'] ?></td>
                  <td><?php echo $customer['date'] ?></td>
                  <td><?php echo $customer['description'] ?></td>
                  <td align="center"><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                <?php endforeach ?>
              </tbody>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper-->