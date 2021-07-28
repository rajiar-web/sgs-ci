<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('front/inc/head');?>

    </head>


    
    <body>
        <?php $this->load->view('front/inc/menu');?>
        

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
        <div class="breadcrumb-area breadcrumb-bg-about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-txt">
                            <h1>About Us</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="breadcrumb-links">
                            <ul>
                                <li><a href="<?=base_url()?>">Home</a></li>
                                <li><a href="javascript:void(0);">About Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-overlay"></div>
        </div>
        <!--  Breadcrumb Area End  -->


        <!--  Warranty Area Start  --> 
        <div class="warranty-section">
            <div class="container">
                <div class="row">
                    <?php
                    if(!empty($about)) 
                            {
                                foreach($about as $key => $a )
                                {  ?>
                    <div class="col-lg-6 col-xl-6">
                        <div class="about_bg" style="background-image: url('<?=front_images().'540_530_'.$a->a_image;?>');"></div>
                    </div>
                    <div class="col-lg-6 offset-xl-1 col-xl-5">
                        <div class="section-title">
                            <h2><?=$a->a_title;?></h2>
                        </div>
                        <div class="warranty-txt">
                            <?=$a->a_top_des;?>
                        </div>
                        <a href="<?=base_url()?>contact-us" class="warranty-btn">SCHEDULE A REPAIR</a>
                    </div>
                    <div class="col-12 warranty-txt" style="margin-top: 50px;">
                        <?=$a->a_bottom_des;?>
                    </div>
                    <?php   }
                    }?>
                </div>
            
                <div class="warranty-features">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-feature">
                                <div class="icon-wrapper">
                                    <img src="<?=front_images();?>info_icon_1.png" alt="">
                                </div>
                                <div class="txt">
                                    <p>Over 23 years of experience</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-feature">
                                <div class="icon-wrapper">
                                    <img src="<?=front_images();?>info_icon_2.png" alt="">
                                </div>
                                <div class="txt">
                                    <p>ASE Certified Master Technicians</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-feature">
                                <div class="icon-wrapper">
                                    <img src="<?=front_images();?>info_icon_3.png" alt="">
                                </div>
                                <div class="txt">
                                    <p>We offer Financing Options</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Warranty Area End  --> 



        <!-- footer Start -->
        <?php $this->load->view('front/inc/footer');?>

                    
        <?php $this->load->view('front/inc/scripts');?>
    </body>
</html>