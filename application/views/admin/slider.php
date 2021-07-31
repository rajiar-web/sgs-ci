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
          <h3 class="main-card-title card-title">New Slider</h3>

         
        </div>
              <?=form_open('submit-slider',array("id"=>"slider"));?>
                <div class="card-body">
                  <div class="row">
                    <input type="hidden" id="sId" name="sId" value="<?php echo(!empty($sliderdata->s_id)?$sliderdata->s_id:''); ?>">
                  
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Title<span class="compulsory">*</span></label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="<?php echo (!empty($sliderdata->s_id)?$sliderdata->s_title:''); ?>">
                    </div>
                    <span id="title_error" class="validation-error"></span>
                    </div>
                    
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Background Slider Image</label>
                       <div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <div  id="imgPath2">
                                                  <?php
                                                  
                                                  if (isset($sliderdata)){
                                                  $images2 = $sliderdata->s_bag_img;
                                                   if($images2!=''){  
                                                   echo '<div onclick="delbog('. $sliderdata->s_id .')"><img class="image-preview2" src="'.base_url('assets/front/assets/img/'.$images2). '"  class="upload-preview2" width="30%" /></div>';  } }
                                                  ?>
                                                  
                                                </div>
                                                <br>
                                                <input type="hidden"   id="imgname2" name="imgname2" value="<?php echo (!empty($sliderdata->s_id)?$images2:''); ?>">
                                                <button type="button" class="btn btn-warning uploadbtnlarge2 btn-xs "  style="width:120px !important;" ><i class="fa fa-upload"></i> &nbsp;&nbsp; Upload
                                                </button>
                                                &nbsp;<input id="txtImage" name="txtImage" tabindex="100"
                                                             style="width:0px;height:0px;opacity: 0;"
                                                             class="validate[required]" readonly="true"  
                                                             type="text" value="">
                                                <input type="file" class="validate[required]" name="inputlargefile2" id="inputlargefile2" class="chnglargefile2" name="inputlargefile2" style="display: none;" />
                                                <br/>  <span class="label label-default" style="font-size:67% !important;">Maximum Image Size: 200 KB,Width:1920px Height:976px </span>
                                            </div>
                    </div>
                    <span id="imgname2_error" class="validation-error"></span>
                    </div>
                  </div>


                 
                   
                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Slider Image</label>
                       <div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <div  id="imgPath">
                                                  <?php
                                                  
                                                  if (isset($sliderdata)){
                                                  $images = $sliderdata->s_image;
                                                   if($images!=''){  
                                                   echo '<div onclick="delbog('. $sliderdata->s_id .')"><img class="image-preview" src="'.base_url('assets/front/assets/img/'.$images). '"  class="upload-preview" width="30%" /></div>';  } }
                                                  ?>
                                                  
                                                </div>
                                                <br>
                                                <input type="hidden"   id="imgname" name="imgname" value="<?php echo (!empty($sliderdata->s_id)?$images:''); ?>">
                                                <button type="button" class="btn btn-warning uploadbtnlarge btn-xs "  style="width:120px !important;" ><i class="fa fa-upload"></i> &nbsp;&nbsp; Upload
                                                </button>
                                                &nbsp;<input id="txtImage" name="txtImage" tabindex="100"
                                                             style="width:0px;height:0px;opacity: 0;"
                                                             class="validate[required]" readonly="true"  
                                                             type="text" value="">
                                                <input type="file" class="validate[required]" name="inputlargefile" id="inputlargefile" class="chnglargefile" name="inputlargefile" style="display: none;" />
                                                <br/>  <span class="label label-default" style="font-size:67% !important;">Maximum Image Size: 200 KB,Width:308px Height:531px </span>
                                            </div>
                    </div>
                    <span id="imgname_error" class="validation-error"></span>
                    </div>
                  </div>
             
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
<script src="<?=admin_custom_js();?>slider.js"></script>
 <!-- <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script> -->
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
//    CKEDITOR.replace( 'desc' );
</script>
</body>

</html>
