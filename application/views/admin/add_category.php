<!DOCTYPE html>
<html lang="en">

<head>
  
<?php $this->load->view('admin/inc/head');?>
  <link rel="stylesheet" href="<?=admin_custom_css();?>custome.css"/>
    <link rel="stylesheet" href="<?=admin();?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
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
          <h3 class="main-card-title card-title">Category</h3>

         
        </div>
              <?=form_open('',array("id"=>"cform"));?>
                <div class="card-body">
                  <div class="row">
                    <input type="hidden" id="cid" name="cid" value="<?php echo(!empty($records)?$records[0]->c_id:''); ?>">

                   


                  
          
               
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Category<span class="compulsory">*</span></label>
                      <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category" value="<?php if (isset($records)){ echo $records[0]->c_category; } ?>">
                    </div>
                    <span id="category_error" class="validation-error"></span>
                    </div>
                    
                   
                  

                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Parent Category<span class="compulsory">*</span></label>
                      <input type="hidden" name="category_id" id="category_id" value="<?=(!empty($records[0]->c_category))?$records[0]->c_category:''?>">
                                    <select data-live-search="true" class="form-control selectpicker" id="parent_category" name="parent_category">
                                      <option value=''>Select Category</option>
                                      <?php if(!empty($category)) {  
                                        foreach ($category as $ct) {
                                            echo "<option ".( $records[0]->c_parent_id==$ct->c_id?'selected':'')." value='".$ct->c_id."'>".$ct->c_category."</option>";  
                                          // echo "<option value='".$ct->c_id."'>".$ct->c_category."</option>";
                                       } }  ?>
                                   </select>
                    </div>
                    <span id="parent_category_error" class="validation-error"></span>
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
<script src="<?=admin_custom_js();?>category.js"></script>
 <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
  // CKEDITOR.replace( 'desc' );
   $('#parent_category').selectpicker();   
</script>
</body>

</html>
