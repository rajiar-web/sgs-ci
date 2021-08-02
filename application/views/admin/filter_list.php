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
            <a href="add-filter">
            <button type="button" class="btn-md cat-btn btn-primary pull-right" style="float: right"><i class="fa fa-plus-circle" aria-hidden="true" action="admin/add_company"></i>
Add</button></a>
              <h3 class="card-title">Company Filter Details
              
              </h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="menu_tbl_div">
              

            <table id="company_list" >  
       <thead>
        <tr>
        <th>No</th>
        <th>Company</th>
        <th>Objective</th>
    
        <th>Status</th> 
        <th>Action</th> 
        </tr>
    </thead>
    <tbody>
        
     
        
    <?php  $i=1; foreach($records as $r) { ?>
                 
                      
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$r->com_titile;?></td>
                       
                        <td><?=$r->i_objective;?></td>
                       
                        <td><?=($r->com_filter_status=='1'?'active':'inactive');?></td>
                        
                     <td>  
                     <a href="add-filter/<?=$r->com_filter_company_id;?>"  class="btn edit-cat btn-info" title="Edit <?=$r->com_titile;?>"> <i class="fa fa-edit"></i></a>
                     <a href="javascript:void(0)" id="<?=$r->com_filter_id;?>" class="btn del-filter  btn-danger" title="Delete <?=$r->com_titile;?>"> <i class="fa fa-trash"></i></a></td>
                           
                    </tr>
                      <?php
                     
                    }
                  
                ?>
                </td> 
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
<script src="<?=admin_custom_js();?>filter.js"></script>

 
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
