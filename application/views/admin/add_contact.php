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
          <h3 class="main-card-title card-title">Contact</h3>

         
        </div>
        
               
        <?=form_open('',array("id"=>"cform"));?>
                <div class="card-body">
                  <div class="row">
                   
                    <input type="hidden" id="cid" name="cid" value="<?php if (!empty($cinfo)){ echo ($cinfo[0]->c_id); } ?>">
                    <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number<span class="compulsory">*</span></label>
                                <input type="text" class="form-control" id="sales_no" name="sales_no" placeholder="Enter sales number" value="<?php if (isset($cinfo)){ echo $cinfo[0]->c_phone; } ?>">
                              </div>
                              <span id="sales_no_error" class="validation-error"></span>
                          </div>

                              
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="slug">Sales Email<span class="compulsory">*</span></label>
                              <input type="email" class="form-control" id="sales_email" name="sales_email" placeholder="Enter sales email" value="<?php if (isset($cinfo)){ echo $cinfo[0]->c_email; } ?>">
                            </div>
                            <span id="sales_email_error" class="validation-error"></span>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Address<span class="compulsory">*</span></label>
                
                              <textarea class="form-control" id="address" name="address" placeholder="Enter Address" ><?php if (!empty($cinfo)) {echo $cinfo[0]->c_address; } ?></textarea>
                            </div>
                            <span id="address_error" class="validation-error"></span>
                          </div>

                        </div>
                              
                    </div>
                    
                  
                   
                    <div class="col-md-6">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="slug">Open Time<span class="compulsory">*</span></label>
                              <input type="text" class="form-control" id="open_time" name="open_time" placeholder="Enter open time" value="<?php if (isset($cinfo)){ echo $cinfo[0]->c_open_time; } ?>">
                            </div>
                            <span id="sales_email_error" class="validation-error"></span>
                          </div>
                       <div class="form-group">
                      <label for="exampleInputEmail1">Footter About<span class="compulsory">*</span></label>
               
                      <textarea class="form-control" id="ftr_abt" name="ftr_abt" placeholder="Enter About" ><?php if (!empty($cinfo)) {echo $cinfo[0]->c_footter_about; } ?></textarea>
                    </div>
                    <span id="address_error" class="validation-error"></span>
                    </div> <!-- /.col-md-6 -->

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
<script src="<?=admin_custom_js();?>contacts.js"></script>
 <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
   CKEDITOR.replace( 'address' );
   CKEDITOR.replace( 'ftr_abt' );
</script>
</body>

</html>
