<?php $pathAssets = base_url('assets/template_backend/') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo $pathAssets; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $pathAssets; ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo $pathAssets; ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $pathAssets; ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $pathAssets; ?>dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo $pathAssets; ?>bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo $pathAssets; ?>bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo $pathAssets; ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo $pathAssets; ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo $pathAssets; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- jQuery 3 -->
    <script src="<?php echo $pathAssets; ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo $pathAssets; ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- swal alert -->
    <script type="text/javascript" language="JavaScript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
    a:hover{
    cursor: pointer;
    }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo $pathAssets; ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Admin</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $pathAssets; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      Admin
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url('changePassword') ?>" class="btn btn-default btn-flat">Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url('login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $pathAssets; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
                <li><a href="<?php echo base_url('backend/logo') ?>"><i class="fa fa-circle-o"></i> Logo</a></li>
                <!-- <li><a href="<?php echo base_url('backend/navbar') ?>"><i class="fa fa-circle-o"></i> Menu Website</a></li> -->
                <li><a href="<?php echo base_url('backend/marquee') ?>"><i class="fa fa-circle-o"></i> Marquee</a></li>
                <li><a href="<?php echo base_url('backend/slider') ?>"><i class="fa fa-circle-o"></i> Sliders</a></li>
                <li><a href="<?php echo base_url('backend/banner') ?>"><i class="fa fa-circle-o"></i> Banners</a></li>
                <li><a href="<?php echo base_url('backend/product') ?>"><i class="fa fa-circle-o"></i> Products</a></li>
                <li><a href="<?php echo base_url('backend/testimonial') ?>"><i class="fa fa-circle-o"></i> Testimonials</a></li>
                <li><a href="<?php echo base_url('backend/description') ?>"><i class="fa fa-circle-o"></i> Description</a></li>
                <li><a href="<?php echo base_url('backend/address') ?>"><i class="fa fa-circle-o"></i> Address</a></li>
                <li><a href="<?php echo base_url('backend/contact') ?>"><i class="fa fa-circle-o"></i> Contact</a></li>
                <li><a href="<?php echo base_url('backend/rekening') ?>"><i class="fa fa-circle-o"></i> Rekening</a></li>
                <li><a href="<?php echo base_url('backend/kurir') ?>"><i class="fa fa-circle-o"></i> Kurir</a></li>
              </ul>
        </section>
        <!-- /.sidebar -->
      </aside>