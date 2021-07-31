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
    .badge
    {
        margin-left:5px;
    }
  .singlesearch td, .singlesearch th {
    padding: .5rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
.btn
{
  padding: .3rem .5rem;
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
            
              <h3 class="card-title">Contact
              
              </h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="menu_tbl_div">
              

            <table id="search_list" >  
       <thead>
        <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone no</th>
        <th>From</th>
        <th>action</th> 
        </tr>
    </thead>
    <tbody>
        <?php  $i=1; foreach($records as $r) {
          if($r->c_status == 1 || $r->c_status == 3) { ?>
        <tr id="tbodytr<?=$r->c_id;?>" style="font-weight: bold;color : blue;">
      
        <td><?php echo $i++;?></td>
       <?php  echo "<td>".$r->c_name."</td>";  ?>
       <?php  echo "<td>".$r->c_email ."</td>";  ?>
       <?php  echo "<td>".$r->c_phone."</td>";  ?>
       <?php if($r->c_type == 0) { ?>
          <?php  echo "<td>Contact Form</td>";  ?>
       <?php }
       else { ?>
         <?php  echo "<td>Home Enquiry</td>";  ?>
      <?php } ?>

    
     <td>
                         
     <a href="javascript:void(0)" id="<?=$r->c_id;?>" class="btn btn-small view-cat btn-success" title="View <?=$r->c_name;?>" > <i class="fa fa-eye"></i></a>
                          
                        </td>
        </tr>
        
        <?php }
      else{
        ?>
        <tr>
      
      <td><?php echo $i++;?></td>
     <?php  echo "<td>".$r->c_name."</td>";  ?>
     <?php  echo "<td>".$r->c_email ."</td>";  ?>
     <?php  echo "<td>".$r->c_phone."</td>";  ?>
     <?php if($r->c_type == 0) { ?>
          <?php  echo "<td>Contact Form</td>";  ?>
       <?php }
       else { ?>
         <?php  echo "<td>Home Enquiry</td>";  ?>
      <?php } ?>

    <td>
                         
      <a href="javascript:void(0)" id="<?=$r->c_id;?>" class="btn view-cat btn-small btn-success" title="View <?=$r->c_name;?>" > <i class="fa fa-eye"></i></a>
                                              
    </td>
    </tr>
   <?php

      } } ?>
        
      
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
        <h5 class="modal-title main-modal-title text-info">Search details</h5>
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
<script src="<?=admin_custom_js();?>contact.js"></script>
<!-- <script src="<?=admin_custom_js();?>menu_list.js"></script> -->
 
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>


<script type="text/javascript">
$(document).ready(function() {
    $('#search_list').DataTable();

  
});
</script> 

</body>

</html>
