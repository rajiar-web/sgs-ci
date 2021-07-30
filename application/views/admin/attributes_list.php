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
            <a href="add-attributes">
            <button type="button" class="btn-md cat-btn btn-primary pull-right" style="float: right"><i class="fa fa-plus-circle" aria-hidden="true"></i>
Add</button></a>
              <h3 class="card-title">Attributes
              
              </h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="menu_tbl_div">
              

            <table id="attributes_list" >  
       <thead>
        <tr>
        <th>No</th>
        <th>Product Attributes</th> 
        <th>Status</th> 
        <th>Action</th> 
        </tr>
    </thead>
    <tbody>
        
   
        
         <?php if(!empty($records))
                  {
                    
                     $i=1;
                    foreach($records as $index=>$r)
                    {
                    
                 
                      ?>


                                                  
                                                 

                      <tr>
                      <td><?=$i++;?></td>
                      <td><?=$r->a_attribute; ?></td>
                      <td><?=($r->a_status=='1'?'active':'inactive');?></td>
                        
                       
                        
                       
                        <td>  <a href="add-attributes/<?=$r->a_id;?>"  class="btn edit-cat btn-info" title="Edit"> <i class="fa fa-edit"></i></a>
                         
                     <a href="javascript:void(0)" id="<?=$r->a_id;?>" class="btn del-attributes  btn-danger" title="Delete"> <i class="fa fa-trash"></i></a></td>
                           
                      
                        
                      </tr>
                      <?php
                     
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
<script src="<?=admin_custom_js();?>attributes.js"></script>

 
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>


<script type="text/javascript">
$(document).ready(function() {
    $('#attributes_list').DataTable();
  
});
</script> 

</body>

</html>
