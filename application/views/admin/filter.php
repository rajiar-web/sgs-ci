<!DOCTYPE html>
<html lang="en">

<head>
  
<?php $this->load->view('admin/inc/head');?>
  <link rel="stylesheet" href="<?=admin_custom_css();?>custome.css"/>
    <link rel="stylesheet" href="<?=admin();?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

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
          <h3 class="main-card-title card-title">Filter Details</h3>

         
        </div>
        <!-- <?php print_r($res);?> -->



              <?=form_open('addFilter',array("id"=>"filter"));?>
                <div class="card-body">
                  <div class="row">
                 
                    <!-- <input type="hidden" id="fId" name="fId" value="<?php echo(!empty($res)?$res[0]->com_filter_id :''); ?>"> -->
                    <input type="hidden" id="company_id" name="company_id" value="<?php echo(!empty($com_filter_company_id)?$com_filter_company_id :''); ?>">

                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Choose Company Title<span class="compulsory">*</span></label>
                      <!-- <select class="form-control chngMenu" name="menu" id="menu"> -->
                      <select class="form-control" name="title" id="title">
                        <option value="">Select</option>
                       
                        <?php

                        if(!empty($filterdata))
                        {
                          foreach($filterdata as $c)
                     
                          {
                              print_r  ($c);
                        ?>
                        
                        
                         <option <?php if(!empty($res)){echo(($com_filter_company_id== $c->com_id)?'selected':'');}?>  value="<?php echo $c->com_id; ?>"><?php echo $c->com_titile; ?></option> 

                        
                        <?php } } ?> 
                      </select>
                    </div>
                    <span id="title_error" class="validation-error"></span>
                    </div>


                    <div class="col-md-12">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Choose Objective<span class="compulsory">*</span></label>
                     <div class="row">
                          
                      <?php
                      $flg="";
                      
                        if(!empty($objectivedata))
                        {
                          foreach($objectivedata as $index => $c)
                          {
                            if(!empty($res)){ $flg=(in_array($c->i_id,$res)?"checked":"");}
                              echo '<div class="col-md-4"> <input id="menu" type="checkbox" '.$flg.' name="menu[]" value="'.$c->i_id.'" />'.' '.$c->i_objective.' </div>';
                          
                           }
                        }
                        ?>
                    </div>
                      
                    </div>
                    <span id="menu_error" class="validation-error"></span>
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
<script src="<?=admin_custom_js();?>filter.js"></script>

 <!-- <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script> -->
 <!-- DataTables -->
<script src="<?=admin();?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=admin();?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
//    CKEDITOR.replace( 'desc' );

    // $(document).ready(function() {
    //     $('#menu').multiselect({
    //         buttonWidth: '400px'
    //     });
    // });
   
</script>
</body>

</html>
