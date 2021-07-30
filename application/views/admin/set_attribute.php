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
            
              <h3 class="card-title">Set Attribute
              
              </h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="menu_tbl_div">
            <?=form_open('',array("id"=>"aform"));?>  
            <input type="hidden" id="cid" name="cid" value="<?php echo $id; ?>">
            <button type="submit" class="btn cat-btn btn-primary" style="float: right">Update</button>  


            <!-- <table id="attribute_list" >   -->
            <table class="table table-bordered">  
       <thead>
        <tr>
        <th>No</th>
        <th></th>
        <th>Item</th>
        <th>Answer</th>
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
                        <td><input type="checkbox" name="attribute[]" <?php if(array_key_exists($r->a_id,$prcateg) && ($prcateg[$r->a_id]!='') ) {echo 'checked'; } else { echo '';} ?>  value="<?=$r->a_id;?>"></td>
                        <td><?=$r->a_attribute;?></td>
                       
                        <td>  <input type="text" class="form-control" id="answer[]" name="answer[<?=$r->a_id;?>]" placeholder="Enter Answer" value="<?php if(array_key_exists($r->a_id,$prcateg)) {echo $prcateg[$r->a_id]; } else { echo '';} ?>"></td>
                       
                     
                         
                      
                        
                      </tr>
                      <?php
                    }
                    }
                  
                ?>
    </tbody>
</table> 

</form>
          


   



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
<script src="<?=admin_custom_js();?>products.js"></script>

 
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>


<!-- <script type="text/javascript">
$(document).ready(function() {
    //$('#attribute_list').DataTable();
  
});
</script>  -->

</body>

</html>
