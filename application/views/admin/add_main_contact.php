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
          <h3 class="main-card-title card-title">Company contact</h3>



         
        </div>
              <?=form_open('',array("id"=>"cform"));?>
                <div class="card-body">
                  <div class="row">
                    <input type="hidden" id="cid" name="cid" value="<?php if (isset($contactdata)){ echo $contactdata->mc_id; } ?>">
                    


                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?php if (isset($contactdata)) echo $contactdata->mc_name; ?>">
                    <span id="name_error" class="validation-error"></span>
                    </div>
              
</div>  

                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Address</label>
                      <textarea class="form-control" id="address" name="address" placeholder="Enter Address"><?php if (isset($contactdata)) echo $contactdata->mc_address; ?></textarea>
                    <span id="address_error" class="validation-error"></span>
                    </div>
              
</div>  
                    
                    
                   
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Enter  Email" value="<?php if (isset($contactdata)){ echo $contactdata->mc_email; } ?>">
                    </div>
                    <span id="email_error" class="validation-error"></span>
                    </div>
                    




                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Sales Phone No</label>
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Sales Phone No" value="<?php if (isset($contactdata)){ echo $contactdata->mc_sales_phone; } ?>">
                    </div>
                    <span id="phone_error" class="validation-error"></span>
                    </div>

                
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Support Phone No</label>
                      <input type="text" class="form-control" id="s_phone" name="s_phone" placeholder="Enter Support Phone No" value="<?php if (isset($contactdata)){ echo $contactdata->mc_support_phone; } ?>">
                    </div>
                    <span id="s_phone_error" class="validation-error"></span>
                    </div>
                   

      



                   
                <!-- /.card-body -->

                <div class="card-footer">
                   <span id="spinner"><i class="fa fa-spin fa-spinner"></i></span>
                   <button type="submit" class="btn cat-btn btn-primary">Submit</button>
                </div>
             </form>
       
       
      </div>
      <!-- /.card -->


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
<script src="<?=admin_custom_js();?>common.js"></script>
<script src="<?=admin_custom_js();?>main_contact.js"></script>
 <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
 CKEDITOR.replace( 'address' );
   
</script>
</body>

</html>
