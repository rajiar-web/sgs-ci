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
          <h3 class="main-card-title card-title">Featured Products</h3>

         
        </div>
              <?=form_open('',array("id"=>"cform"));?>
                <div class="card-body">
                  <div class="row">
                    <input type="hidden" id="cid" name="cid" value="<?php echo(!empty($records)?$records[0]->id:''); ?>">

                   
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Image</label>
                       <div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <div  id="imgPath">
                                                  <?php
                                                  
                                                  if (!empty($records)){
                                                  $images = $records[0]->image;
                                                 
                                                  
                                                   if(!empty($images[0])){  
                                                 
                                                  echo '<div ><img class="image-preview" src="'.base_url('assets/front/assets/img/'.$images). '"  class="upload-preview" width="30%" /><div style="width: 30%;text-align: right;cursor: pointer;"></div></div>'; 
                                                  } }
                                                 

                                                  ?>
                                                  
                                                </div>
                                                <br>
                                                <input type="hidden"   id="imgname" name="imgname" value="<?php echo (!empty($images[0])?$images:''); ?>">
                                                <button type="button" class="btn btn-warning uploadbtnlarge btn-xs "  style="width:120px !important;" ><i class="fa fa-upload"></i> &nbsp;&nbsp; Upload
                                                </button>
                                                &nbsp;<input id="txtImage" name="txtImage" tabindex="100"
                                                             style="width:0px;height:0px;opacity: 0;"
                                                             class="validate[required]" readonly="true"  
                                                             type="text" value="">
                                                <input type="file" class="validate[required]" name="inputlargefile" id="inputlargefile" class="chnglargefile" name="inputlargefile" style="display: none;" />
                                                <br/>  <span class="label label-default" style="font-size:67% !important;">Maximum Image Size: 200 KB,Width:492px Height:410px </span>
                                            </div>
                    </div>
                    <span id="imgname_error" class="validation-error"></span>
                    </div>

                  
          
               
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Title<span class="compulsory">*</span></label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="<?php if (isset($records)){ echo $records[0]->title; } ?>">
                    </div>
                    <span id="title_error" class="validation-error"></span>
                    </div>
                    
                    
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Original Price<span class="compulsory">*</span></label>
                      <input type="text" class="form-control" id="original" name="original" placeholder="Enter Original Price" value="<?php if (isset($records)){ echo $records[0]->org_rate; } ?>">
                    </div>
                    <span id="original_error" class="validation-error"></span>
                    </div>

                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Discount Price<span class="compulsory">*</span></label>
                      <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter Discount Price" value="<?php if (isset($records)){ echo $records[0]->dis_rate; } ?>">
                    </div>
                    <span id="discount_error" class="validation-error"></span>
                    </div>

                   
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">URL<span class="compulsory">*</span></label>
                      <input type="text" class="form-control" id="link" name="link" placeholder="Enter URL" value="<?php if (isset($records)){ echo $records[0]->link; } ?>">
                    </div>
                    <span id="link_error" class="validation-error"></span>
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
<script src="<?=admin_custom_js();?>featured_products.js"></script>
 <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
   //CKEDITOR.replace( 'desc' );
   
</script>
</body>

</html>
