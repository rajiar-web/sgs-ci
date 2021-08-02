<!DOCTYPE html>
<html lang="en">

<head>
  
<?php $this->load->view('admin/inc/head');?>
  <link rel="stylesheet" href="<?=admin_custom_css();?>custome.css"/>
    <link rel="stylesheet" href="<?=admin();?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <style>
    #cat_list td .btn
    {
      padding: .375rem .45rem;
    }
  </style>
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
       <?=form_open('',array("id"=>"clsform"));?>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Product Classification List</h3>

            </div>
            <div class="col-md-12 text-center pt-2">
              <button type="submit" id="2" class="btn edit-cat btn-info" title="Edit"> <i class="fa fa-edit"></i>Update</button>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body" id="product_tbl_div">
              
          </div>
        </div>
      </div>
    </div>
    <?=form_close();?>
  </section>

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

   <div class="modal" tabindex="-1" role="dialog" id="attrModal">
    <?=form_open('',array("id"=>"atrform"));?>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title main-modal-title text-info" id="attrlbl"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="catModalBody">
        <p align="center"><i class="fa fa-spin fa-spinner"></i></p>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="prdId" id="prdId" value="">
      <div class="card-footer">
                   <span id="spinner"><i class="fa fa-spin fa-spinner"></i></span>
                   <button type="submit" class="btn cat-btn btn-primary">Save</button>
      </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
    <?=form_close();?>
</div>

<?php $this->load->view('admin/inc/footer');?>
</div>



<?php $this->load->view('admin/inc/scripts');?>
<script src="<?=admin_custom_js();?>common.js"></script>
<script src="<?=admin_custom_js();?>product_classify.js"></script>
 
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
</body>

</html>
