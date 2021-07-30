<!DOCTYPE html>
<html lang="en">

<head>
  
<?php $this->load->view('admin/inc/head');?>
  <link rel="stylesheet" href="<?=admin_custom_css();?>custome.css"/>
    <link rel="stylesheet" href="<?=admin();?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?=admin();?>plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="<?=admin();?>plugins/bootstrap-tagsinput-latest/examples/assets/app.css">
    




    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
          <h3 class="main-card-title card-title">Social Media Info</h3>

         
        </div>
        
               
           <?=form_open('',array("id"=>"smform"));?>
                <div class="card-body">
                
                  <div class="row">
                    <input type="hidden" id="cid" name="cid" value="<?php if (!empty($cinfo)){ echo ($cinfo[0]->mc_id); } ?>">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="row">
                        <table class="table" width="100%" id="smTbl">
                        <?php if(!empty($sm))
                        {
                            
                            $i=0;
                            foreach($sm as $ii=>$s)
                            {
                                ?>
                                <tr id="row_<?=$i;?>" class="fields-row">
                                <input type="hidden" id="row_hidden<?=$i;?>" name="row_hidden[]" value="<?=$i;?>">
                                    <td>
                                    <div class="btn-group">
                                    
                                            <button type="button" class="btn btn-success icon-btn<?=$i;?>"><i class="<?=empty($s->icon)?'fa fa-ban': $s->icon;?>"></i></button>

                                            <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" x-out-of-boundaries="" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                            <?php
                                            foreach($icons as $ic=>$c)
                                            {
                                                echo '<a class="dropdown-item icon-item" href="#" no="'.$i.'" index="'.$ic.'" cval="'.$c.'"><i class="'.$c.'"></i> '.$ic.'</a>';
                                            }
                                            ?>
                                                
                                                
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="hidden"  id="icon<?=$i;?>" name="icon[]"  value="<?=$s->icon;?>"> 
                                        <input type="text" class="form-control" id="title<?=$i;?>" name="title[]" placeholder="Enter Title" value="<?=$ii;?>">
                                        <span id="title<?=$i;?>_error" class="validation-error"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="link<?=$i;?>" name="link[]" placeholder="Enter URL" value="<?php if (isset($s)){ echo $s->link; } ?>">
                                        <span id="link<?=$i;?>_error" class="validation-error"></span>   
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" row="<?=$i;?>" class="del-sm btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                
                                </tr>
                                <?php
                                $i++;
                            }
                        }
                        else
                        {
                            $this->load->view('admin/inc/socialMediaRow');
                        }
                        ?>
                        
                        </table>
                        <span id="email_error" class="validation-error"></span>
                    </div>
                   


                  </div>
             
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <div align="center">
                   <span id="spinner"><i class="fa fa-spin fa-spinner"></i></span>
                   <a href="javascript:void(0)" class="btn cat-btn btn-warning add-more-sm"><i class="fa fa-plus"></i> Add New</a>
                 
                   <button type="submit" class="btn cat-btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                
                   
                   </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
 <script src="<?=admin();?>plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>
 <script src="<?=admin();?>plugins/bootstrap-tagsinput-latest/examples/assets/app.js"></script>
<script src="<?=admin_custom_js();?>common.js"></script>
<script src="<?=admin_custom_js();?>socialmedia.js"></script>
 <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

</body>

</html>
