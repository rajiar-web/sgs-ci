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
           
              <h3 class="card-title">Company Contact Details
              
              </h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="menu_tbl_div">
              

            <table id="index_list" >  
       <thead>
        <tr>
        <th>No</th>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th> 
        <th>Sales Phone No</th>
        <th>Support Phone No</th>
        <th>Action</th> 
        </tr>
    </thead>
    <tbody>
        
    <?php $i=1; foreach($records as $r) { ?>
        <tr>
      <td><?php echo $i++; ?></td>
  
       <?php  echo "<td>".$r->mc_name."</td>";  ?>
       <?php  echo "<td>".$r->mc_address."</td>";  ?>
       <?php  echo "<td>".$r->mc_email."</td>";  ?>
       <?php  echo "<td>".$r->mc_sales_phone."</td>";  ?>
       <?php  echo "<td>".$r->mc_support_phone."</td>";  ?>
       
    
     <td>
    
             
     <a href="javascript:void(0)" id="<?=$r->mc_id;?>" class="btn view-cat btn-success"  > <i class="fa fa-eye"></i></a>
     <a href="add-main/<?=$r->mc_id;?>"  class="btn edit-cat btn-info" title="Edit"> <i class="fa fa-edit"></i></a>      
                          </td>
        </tr>
        
        <?php } ?>
        
       

                                                  
                                                 

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

<div class="modal" tabindex="-1" role="dialog" id="catModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title main-modal-title text-info">Company Contact details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="catModalBody">
        <p align="center"><i class="fa fa-spin fa-spinner"></i></p>
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  </div>


<?php $this->load->view('admin/inc/scripts');?>
<script src="<?=admin_custom_js();?>common.js"></script>
<script src="<?=admin_custom_js();?>main_contact.js"></script>

 
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>


<script type="text/javascript">
$(document).ready(function() {
    $('#index_list').DataTable();
  
});
</script> 

</body>

</html>
