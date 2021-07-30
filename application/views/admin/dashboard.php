<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  .panel {
 margin-bottom:20px;
 background-color:#fff;
 border:1px solid transparent;
 border-radius:4px;
 -webkit-box-shadow:0 1px 1px rgba(0,0,0,.05);
 box-shadow:0 1px 1px rgba(0,0,0,.05)
}
.panel-body {
 padding:15px
}
.panel-heading {
 padding:10px 15px;
 border-bottom:1px solid transparent;
 border-top-left-radius:3px;
 border-top-right-radius:3px
}
/*.panel-heading>.dropdown .dropdown-toggle {
 color:inherit
}*/
.panel-title {
 margin-top:0;
 margin-bottom:0;
 font-size:16px;
 color:inherit
}
.panel-title>a {
 color:inherit
}
.panel-footer {
 padding:10px 15px;
 background-color:#f5f5f5;
 border-top:1px solid #ddd;
 border-bottom-right-radius:3px;
 border-bottom-left-radius:3px
}


.panel-default {
 border-color:#ddd
}
.panel-default>.panel-heading {
 color:#333;
 background-color:#f5f5f5;
 border-color:#ddd
}
.panel-default>.panel-heading+.panel-collapse>.panel-body {
 border-top-color:#ddd
}
.panel-default>.panel-heading .badge {
 color:#f5f5f5;
 background-color:#333
}
.panel-default>.panel-footer+.panel-collapse>.panel-body {
 border-bottom-color:#ddd
}
.panel-primary {
 border-color:#428bca
}
.panel-primary>.panel-heading {
 color:#fff;
 background-color:#428bca;
 border-color:#428bca
}
.panel-primary>.panel-heading+.panel-collapse>.panel-body {
 border-top-color:#428bca
}
.panel-primary>.panel-heading .badge {
 color:#428bca;
 background-color:#fff
}
.panel-primary>.panel-footer+.panel-collapse>.panel-body {
 border-bottom-color:#428bca
}
.panel-success {
 border-color:#d6e9c6
}
.panel-success>.panel-heading {
 color:#3c763d;
 background-color:#dff0d8;
 border-color:#d6e9c6
}
.panel-success>.panel-heading+.panel-collapse>.panel-body {
 border-top-color:#d6e9c6
}
.panel-success>.panel-heading .badge {
 color:#dff0d8;
 background-color:#3c763d
}
.panel-success>.panel-footer+.panel-collapse>.panel-body {
 border-bottom-color:#d6e9c6
}
.panel-info {
 border-color:#bce8f1
}
.panel-info>.panel-heading {
 color:#31708f;
 background-color:#d9edf7;
 border-color:#bce8f1
}
.panel-info>.panel-heading+.panel-collapse>.panel-body {
 border-top-color:#bce8f1
}
.panel-info>.panel-heading .badge {
 color:#d9edf7;
 background-color:#31708f
}
.panel-info>.panel-footer+.panel-collapse>.panel-body {
 border-bottom-color:#bce8f1
}
.panel-warning {
 border-color:#faebcc
}
.panel-warning>.panel-heading {
 color:#8a6d3b;
 background-color:#fcf8e3;
 border-color:#faebcc
}
.panel-warning>.panel-heading+.panel-collapse>.panel-body {
 border-top-color:#faebcc
}
.panel-warning>.panel-heading .badge {
 color:#fcf8e3;
 background-color:#8a6d3b
}
.panel-warning>.panel-footer+.panel-collapse>.panel-body {
 border-bottom-color:#faebcc
}
.panel-danger {
 border-color:#ebccd1
}
.panel-danger>.panel-heading {
 color:#a94442;
 background-color:#f2dede;
 border-color:#ebccd1
}
.panel-danger>.panel-heading+.panel-collapse>.panel-body {
 border-top-color:#ebccd1
}
.panel-danger>.panel-heading .badge {
 color:#f2dede;
 background-color:#a94442
}
.panel-danger>.panel-footer+.panel-collapse>.panel-body {
 border-bottom-color:#ebccd1
}
.announcement-text { padding-left: 12px; font-size: 20px; }













</style>
<head>
  
<?php $this->load->view('admin/inc/head');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  
<?php $this->load->view('admin/inc/top_nav');?>

  <!-- Main Sidebar Container -->
<?php $this->load->view('admin/inc/sidebar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <?php $this->load->view('admin/inc/breadcrumb');?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">





      <div class="row">
       <!-- /.col -->
       <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fas fa-users" style="color:#fff;"></i></span>

            <div class="info-box-content">
            <a href="products"><span class="info-box-text">Products</span></a>
            <span class="info-box-number"><?=$count_services?></span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->



        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="far fa-square"></i></span>

            <div class="info-box-content">
            <a href="register"><span class="info-box-text">Registration Details</span></a>
            <span class="info-box-number"><?=$count_slider?></span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fas fa-chart-pie"></i></span>

            <div class="info-box-content">
            <a href="pr-classification"><span class="info-box-text">Classification List</span></a>
            <span class="info-box-number"><?=$count_talent?></span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
       
      </div>



















      
        
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

<?php $this->load->view('admin/inc/footer');?>
</div>

<?php $this->load->view('admin/inc/scripts');?>
</body>

<!-- Mirrored from adminlte.io/themes/dev/AdminLTE/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Apr 2020 05:30:09 GMT -->
</html>
