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
            <a href="add-recent_work">
            <button type="button" class="btn-md cat-btn btn-primary pull-right" style="float: right"><i class="fa fa-plus-circle" aria-hidden="true" action="admin/add-recent_work"></i>
Add</button></a>
              <h3 class="card-title">About
              
              </h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="menu_tbl_div">
              

            <table id="company_list" >  
       <thead>
        <tr>
        <th>No</th>
        <th>Image</th> 
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
                      $images = $l->image;
                      if(!empty($images))
                      {
                       
                          $pp = base_url('assets/front/assets/img/'.$images);
                          $img = '<img class="zoom" src="'.$pp.'" width="60" height="60">';
                        

                      }
                 
                      ?>
                      <tr>
                        <td><?=$index+1;?></td>
                         <td>
                          <?php
                          echo $img;
                          ?>
                        
                        </td>
                        <td><?=($l->status=='1'?'active':'inactive');?></td>

                       <td> 

                       <a href="add-recent_work/<?=$l->id;?>"  class="btn edit-cat btn-info" title="Edit <?=$l->id;?>"> <i class="fa fa-edit"></i></a>
                       <a href="javascript:void(0)" id="<?=$l->id;?>" class="btn del-recent_work  btn-danger" title="Delete <?=$l->id;?>"> <i class="fa fa-trash"></i></a>
              

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
<script src="<?=admin_custom_js();?>recent_work.js"></script>

 
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>


<script type="text/javascript">
$(document).ready(function() {
    $('#company_list').DataTable();
  
});
</script> 

</body>

</html>
