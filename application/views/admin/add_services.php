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
          <h3 class="main-card-title card-title">New Service</h3>

         
        </div>
              <?=form_open('submit-services',array("id"=>"slider"));?>
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
                      <label for="exampleInputEmail1">Detail Main Title<span class="compulsory">*</span></label>
                      <input type="text" class="form-control" id="s_detail_main_heading" name="s_detail_main_heading" placeholder="Enter Detail Title" value="<?php echo (!empty($sliderdata->s_id)?$sliderdata->s_detail_main_heading:''); ?>">
                    </div>
                    <span id="s_detail_main_heading_error" class="validation-error"></span>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Shot Description<span class="compulsory">*</span></label>
                        <textarea class="form-control" id="desc" name="desc" placeholder="Enter Description"><?php if (!empty($sliderdata)) echo $sliderdata->s_shot_des; ?></textarea>
                        <span id="desc_error" class="validation-error"></span>
                      </div> 
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Full Description<span class="compulsory">*</span></label>
                        <textarea class="form-control" id="desc2" name="desc2" placeholder="Enter Description"><?php if (!empty($sliderdata)) echo $sliderdata->s_full_des; ?></textarea>
                        <span id="desc_error" class="validation-error"></span>
                      </div> 
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Service Image</label>
                       <div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <div  id="imgPath">
                                                  <?php
                                                  
                                                  if (!empty($sliderdata)){
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
                    
                    <div class="col-md-6">
                       <div class="form-group">
                            <label for="exampleInputEmail1">Service Icon</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                <div  id="imgPath2">
                                    <?php
                                    
                                    if (!empty($sliderdata)){
                                    $images2 = $sliderdata->s_icon;
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
                  


                 
                   
                    
                  



                  <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Detail Main Image</label>
                       <div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <div  id="imgPath3">
                                                  <?php
                                                  
                                                  if (!empty($sliderdata)){
                                                  $images3 = $sliderdata->s_detail_main_image;
                                                   if($images3!=''){  
                                                   echo '<div onclick="delbog('. $sliderdata->s_id .')"><img class="image-preview3" src="'.base_url('assets/front/assets/img/'.$images3). '"  class="upload-preview3" width="30%" /></div>';  } }
                                                  ?>
                                                  
                                                </div>
                                                <br>
                                                <input type="hidden"   id="imgname3" name="imgname3" value="<?php echo (!empty($sliderdata->s_id)?$images3:''); ?>">
                                                <button type="button" class="btn btn-warning uploadbtnlarge3 btn-xs "  style="width:120px !important;" ><i class="fa fa-upload"></i> &nbsp;&nbsp; Upload
                                                </button>
                                                &nbsp;<input id="txtImage" name="txtImage" tabindex="100"
                                                             style="width:0px;height:0px;opacity: 0;"
                                                             class="validate[required]" readonly="true"  
                                                             type="text" value="">
                                                <input type="file" class="validate[required]" name="inputlargefile3" id="inputlargefile3" class="chnglargefile3" name="inputlargefile3" style="display: none;" />
                                                <br/>  <span class="label label-default" style="font-size:67% !important;">Maximum Image Size: 200 KB,Width:1920px Height:976px </span>
                                            </div>
                    </div>
                    <span id="imgname3_error" class="validation-error"></span>
                    </div>
                  


                 
                   
                    <div class="col-md-6">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Detail Sub Image 1</label>
                       <div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <div  id="imgPath4">
                                                  <?php
                                                  
                                                  if (!empty($sliderdata)){
                                                  $images4 = $sliderdata->s_detail_sub_image1;
                                                   if($images4!=''){  
                                                   echo '<div onclick="delbog('. $sliderdata->s_id .')"><img class="image-preview4" src="'.base_url('assets/front/assets/img/'.$images4). '"  class="upload-preview4" width="30%" /></div>';  } }
                                                  ?>
                                                  
                                                </div>
                                                <br>
                                                <input type="hidden"   id="imgname4" name="imgname4" value="<?php echo (!empty($sliderdata->s_id)?$images4:''); ?>">
                                                <button type="button" class="btn btn-warning uploadbtnlarge4 btn-xs "  style="width:120px !important;" ><i class="fa fa-upload"></i> &nbsp;&nbsp; Upload
                                                </button>
                                                &nbsp;<input id="txtImage" name="txtImage" tabindex="100"
                                                             style="width:0px;height:0px;opacity: 0;"
                                                             class="validate[required]" readonly="true"  
                                                             type="text" value="">
                                                <input type="file" class="validate[required]" name="inputlargefile4" id="inputlargefile4" class="chnglargefile4" name="inputlargefile4" style="display: none;" />
                                                <br/>  <span class="label label-default" style="font-size:67% !important;">Maximum Image Size: 200 KB,Width:308px Height:531px </span>
                                            </div>
                    </div>
                    <span id="imgname4_error" class="validation-error"></span>
                    </div>
                  





                  <div class="col-md-6">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Detail Sub Image 2</label>
                       <div class="col-md-6 col-sm-6 col-xs-12"> 
                                                <div  id="imgPath5">
                                                  <?php
                                                  
                                                  if (!empty($sliderdata)){
                                                  $images5 = $sliderdata->s_detail_sub_image2;
                                                   if($images5!=''){  
                                                   echo '<div onclick="delbog('. $sliderdata->s_id .')"><img class="image-preview5" src="'.base_url('assets/front/assets/img/'.$images5). '"  class="upload-preview5" width="30%" /></div>';  } }
                                                  ?>
                                                  
                                                </div>
                                                <br>
                                                <input type="hidden"   id="imgname5" name="imgname5" value="<?php echo (!empty($sliderdata->s_id)?$images5:''); ?>">
                                                <button type="button" class="btn btn-warning uploadbtnlarge5 btn-xs "  style="width:120px !important;" ><i class="fa fa-upload"></i> &nbsp;&nbsp; Upload
                                                </button>
                                                &nbsp;<input id="txtImage" name="txtImage" tabindex="100"
                                                             style="width:0px;height:0px;opacity: 0;"
                                                             class="validate[required]" readonly="true"  
                                                             type="text" value="">
                                                <input type="file" class="validate[required]" name="inputlargefile5" id="inputlargefile5" class="chnglargefile5" name="inputlargefile5" style="display: none;" />
                                                <br/>  <span class="label label-default" style="font-size:67% !important;">Maximum Image Size: 200 KB,Width:1920px Height:976px </span>
                                            </div>
                    </div>
                    <span id="imgname5_error" class="validation-error"></span>
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
<script src="<?=admin_custom_js();?>services.js"></script>
 <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
   CKEDITOR.replace( 'desc' );
   CKEDITOR.replace( 'desc2' );

</script>
</body>

</html>
