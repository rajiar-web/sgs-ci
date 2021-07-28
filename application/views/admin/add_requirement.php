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
       <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="main-card-title card-title">Financial Requirements</h3>

         
        </div>
        
               
           <?=form_open('',array("id"=>"cform"));?>
                <div class="card-body">
                  <div class="row">
                    <input type="hidden" id="cid" name="cid" value="<?php if (isset($requirementdata)){ echo $requirementdata[0]->f_id; } ?>">
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Financial Requirements<span class="compulsory">*</span></label>
                      <input type="text" class="form-control" id="requirement" name="requirement" placeholder="Enter Requirements" value="<?php if (isset($requirementdata)){ echo $requirementdata[0]->f_requirement; } ?>" >
                    </div>
                    <span id="requirement_error" class="validation-error"></span>
                    </div>
                  


                <!-- <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea class="form-control" id="desc" name="desc" placeholder="Enter Description"><?php if (isset($reasonsdata)) echo $reasonsdata[0]->r_description; ?></textarea>
                    <span id="desc_error" class="validation-error"></span>
                    </div>
</div> -->
                    
                  

                  </div>
             
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                   <span id="spinner"><i class="fa fa-spin fa-spinner"></i></span>
                   <button type="submit" class="btn cat-btn btn-primary">Submit</button>
                </div>
              <?=form_close();?>
       
       
      </div>
      <!-- /.card -->


    </section>
   
    

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
<script src="<?=admin_custom_js();?>common.js"></script>
<script src="<?=admin_custom_js();?>requirement.js"></script>
 <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
//    CKEDITOR.replace( 'desc' );
</script>
</body>

</html>
