<!DOCTYPE html>
<html lang="en">

<head>
  
<?php $this->load->view('admin/inc/head');?>
  <link rel="stylesheet" href="<?=admin_custom_css();?>custome.css"/>
    <!-- <link rel="stylesheet" href="<?=admin();?>plugins/datatables-bs4/css/dataTables.bootstrap4.css"> -->
    <style>
    #cat_list td .btn
    {
      padding: .375rem .45rem;
    }
        .zoom:hover {
      -ms-transform: scale(4.5); /* IE 9 */
      -webkit-transform: scale(4.5); /* Safari 3-8 */
      transform: scale(3); 
    }
  </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <!-- <a href="add-slider">
            <button type="button" class="btn-md cat-btn btn-primary pull-right" style="float: right"><i class="fa fa-plus-circle" aria-hidden="true" action="admin/add_slider"></i>
Add</button></a> -->
              <h3 class="card-title">Home
              
              </h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="menu_tbl_div">
              

            <table id="slider_list" >  
       <thead>
        <tr>
        <th>No</th>
        <th>Title</th>
        <th>Background  Image</th>
        <th>Front Image</th> 
        <th>Status</th> 
        <th>Action</th> 
        </tr>
    </thead>
    <tbody>
        
        
        
        <?php if(!empty($plist))
                  {
                    
                     $i=1;
                    foreach($plist as $index=>$l)
                    {
                     $img = '';
                      $images = $l->s_image;
                      $images2 = $l->s_bag_img;
                      if(!empty($images))
                      {
                        $pathinfo = pathinfo($images);
                        if(file_exists('.assets/front/assets/img/'.$pathinfo['dirname'].'/60_60_'.$pathinfo['basename']))
                        {
                          $pp = base_url('assets/front/assets/img/'.$pathinfo['dirname'].'/60_60_'.$pathinfo['basename']);
                          $img = '<img src="'.$pp.'">';
                        }
                        else
                        {
                          $pp = base_url('assets/front/assets/img/'.$images);
                          $img = '<img class="zoom" src="'.$pp.'" width="60" height="60">';
                        }

                      }
                      if(!empty($images2))
                      {
                        $pathinfo = pathinfo($images2);
                        if(file_exists('.assets/front/assets/img/'.$pathinfo['dirname'].'/60_60_'.$pathinfo['basename']))
                        {
                          $pp2 = base_url('assets/front/assets/img/'.$pathinfo['dirname'].'/60_60_'.$pathinfo['basename']);
                          $img2 = '<img src="'.$pp2.'">';
                        }
                        else
                        {
                          $pp2 = base_url('assets/front/assets/img/'.$images2);
                          $img2 = '<img class="zoom" src="'.$pp2.'" width="60" height="60">';
                        }

                      }
                 
                      ?>
                      <tr>
                        <td><?=$index+1;?></td>
                        <td><?=$l->s_title;?></td>
                        <td>
                          <?php
                          echo $img2;
                          ?>
                        
                        </td>
                        <td>
                          <?php
                          echo $img;
                          ?>
                        
                        </td>
                        <td><?=($l->s_status=='1'?'active':'inactive');?></td>
                      
                       <td>
                       <a href="<?=base_url()?>add-slider/<?=$l->s_id;?>" id="<?=$l->s_id;?>" class="btn edit-slider  btn-primary" title="Delete <?=$l->s_title;?>"> <i class="fa fa-edit"></i></a>
                       <a href="javascript:void(0)" id="<?=$l->s_id;?>" class="btn del-slider  btn-danger" title="Delete <?=$l->s_title;?>"> <i class="fa fa-trash"></i></a>
                       
                       </td>
                           
                      
                        
                      </tr>
                      <?php
                      ++$i;
                    }
                  }
                ?>
    </tbody>
</table> 


          


   



          </div>
        </div>
      </div>
    </div>
  </section>

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


<?php $this->load->view('admin/inc/footer');?>
</div>



<?php $this->load->view('admin/inc/scripts');?>
<script src="<?=admin_custom_js();?>common.js"></script>
<script src="<?=admin_custom_js();?>slider.js"></script>

 
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>


<script type="text/javascript">
$(document).ready(function() {
    $('#slider_list').DataTable();
  
});
</script> 

</body>

</html>
