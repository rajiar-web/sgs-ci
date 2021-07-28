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
          <h3 class="main-card-title card-title">New Category</h3>

         
        </div>
        
           <?=form_open('',array("id"=>"cform"));?>
                <div class="card-body">
                  <div class="row">
                    <input type="hidden" id="cid" name="cid" value="">
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Category<span class="compulsory">*</span></label>
                      <input type="text" class="form-control" id="catgeory" name="catgeory" placeholder="Enter Category">
                    </div>
                    <span id="catgeory_error" class="validation-error"></span>
                    </div>
                     <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Short Description</label>
                      <textarea class="form-control" id="shortdesc" name="shortdesc" placeholder="Short Description"></textarea>
                    </div>
                    <span id="desc_error" class="validation-error"></span>
                    </div>
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea class="form-control" id="desc" name="desc" placeholder="Enter Category"></textarea>
                    </div>
                    <span id="desc_error" class="validation-error"></span>
                    </div>
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Category Image</label>
                       <div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <div  id="imgPath">
                                                 
                                                </div>
                                                <br>
                                                <input type="hidden"   id="imgname" name="imgname" value="">
                                                <button type="button" class="btn btn-warning uploadbtnlarge btn-xs "  style="width:120px !important;" ><i class="fa fa-upload"></i> &nbsp;&nbsp; Upload
                                                </button>
                                                &nbsp;<input id="txtImage" name="txtImage" tabindex="100"
                                                             style="width:0px;height:0px;opacity: 0;"
                                                             class="validate[required]" readonly="true"  
                                                             type="text" value="">
                                                <input type="file" class="validate[required]" name="inputlargefile" id="inputlargefile" class="chnglargefile" name="inputlargefile" style="display: none;" />
                                                <br/>  <span class="label label-default" style="font-size:67% !important;">Maximum Image Size: 200 KB,Width:360px Height:236px </span>
                                            </div>
                    </div>
                    <span id="desc_error" class="validation-error"></span>
                    </div>
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Banner Image</label>
                       <div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <div  id="imgBanPath">
                                                 
                                                </div>
                                                <br>
                                                <input type="hidden"   id="banimgname" name="banimgname" value="">
                                                <button type="button" class="btn btn-info uploadbtnbanner btn-xs "  style="width:120px !important;" ><i class="fa fa-upload"></i> &nbsp;&nbsp; Upload
                                                </button>
                                                &nbsp;<input id="txtImage" name="txtImage" tabindex="100"
                                                             style="width:0px;height:0px;opacity: 0;"
                                                             class="validate[required]" readonly="true"  
                                                             type="text" value="">
                                                <input type="file" class="validate[required]" name="inputlargefile" id="inputbannerfile" class="chnglargefile" name="inputbannerfile" style="display: none;" />
                                                <br/>  <span class="label label-default" style="font-size:67% !important;">Maximum Image Size: 200 KB,Width:1600px Height:457px </span>
                                            </div>
                    </div>
                    <span id="desc_error" class="validation-error"></span>
                    </div>
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
    <!-- /.content -->

      <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="cat_tbl_div">
              
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="modal" tabindex="-1" role="dialog" id="catModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title main-modal-title text-info">Category Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id=catModalBody">
        <p align="center"><i class="fa fa-spin fa-spinner"></i></p>
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
<script type="text/javascript">
   CKEDITOR.replace( 'desc' );
</script>
</body>

</html>
