<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('front/inc/head');?>
    </head>


    
    <body>
        <?php $this->load->view('front/inc/menu');?>
        <?php $contact = getcontact();
	$con=$contact[0]; ?>
        

        <!--   search bar popup start   -->
        <div class="search-popup">
            <form class="search-form" action="#">
                <div class="form-element"><input type="text" placeholder="Type your search keyword"></div>
            </form>
            <div class="search-popup-overlay" id="searchOverlay"></div>
            <button class="search-close-btn" id="searchCloseBtn"><i class="fas fa-times"></i></button>
        </div>
        <!--   search bar popup end   -->  


        <!--  Breadcrumb Area Start  -->  
        <div class="breadcrumb-area breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-txt">
                            <h1>Service Details</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="breadcrumb-links">
                            <ul>
                                <li><a href="<?=base_url()?>">Home</a></li>
                                <li><a href="javascript:void(0);">Service Details</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-overlay"></div>
        </div>
        <!--  Breadcrumb Area End  -->


        <!--  Service Details Area Start  --> 
        <div class="service-details-area">
            <div class="container">
                <div class="row">
                <?php
                if(!empty($service_dtl)) 
                                {
                                    foreach($service_dtl as $key => $s )
                                    {  ?>
                    <div class="col-lg-8">
                        <div class="body">
                            <div class="main-img">
                                <img src="<?=front_images().$s->s_detail_main_image;?>" alt="">
                            </div>
                            <div class="description-first">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="title"><?=$s->s_detail_main_heading;?></h2>
                                        <div class="small-imgs">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="single-small-img">
                                                        <img src="<?=front_images().'350_233_'.$s->s_detail_sub_image1;?>" alt="" class="main">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mb-4">
                                                    <div class="single-small-img">
                                                        <img src="<?=front_images().'350_233_'.$s->s_detail_sub_image2;?>" alt="" class="main">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?=$s->s_full_des;?>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                <?php } } ?> 
                    <div class="col-lg-4">
                        <div class="service-sidebar">
                            <div class="categories">
                                <div class="accordion" id="accordionExample">
                                <?php
                                if(!empty($service)) 
                                {
                                    foreach($service as $key1 => $s1 )
                                    {  ?> 
                                    
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <a href="<?=base_url()?>service-detail/<?=$s1->s_slug?>">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="<?php if($c_slug == $s1->s_slug) { echo 'true'; } else { echo 'false'; }?>" aria-controls="collapseOne">
                                                    <?=$s1->s_title?>
                                                </button>
                                            </h2>
                                            </a>
                                        </div>
                                    </div>
                                
                                <?php } } ?> 
                                   
                                    
                                    
                                   
                                </div>
                            </div>
                            <div class="sidebar-support">
                                <div class="icon-wrapper">
                                    <i class="flaticon flaticon-headphones"></i>
                                </div>
                                <h3>Call us for any help</h3>
                                <h2><a href="tel:<?=$con->c_phone?>"> <?=$con->c_phone?></a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Service Details Area End  -->



        <!-- footer Start -->
        <?php $this->load->view('front/inc/footer');?>

                    
        <?php $this->load->view('front/inc/scripts');?>
    </body>
</html>