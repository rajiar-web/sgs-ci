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
        <div class="breadcrumb-area breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-txt">
                            <h1>Our Services</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="breadcrumb-links">
                            <ul>
                                <li><a href="<?=base_url()?>">Home</a></li>
                                <li><a href="javascript:void(0);">Services</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-overlay"></div>
        </div>
        <!--  Breadcrumb Area End  -->


        <!--  Service Area Start  --> 
        <div class="service-area service-page">
            <div class="container">
                <div class="services-tab">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="battery" role="tabpanel" aria-labelledby="battery-tab">
                            <div class="row">
                            <?php 
                            if(!empty($service)) 
                                {
                                    foreach($service as $key1 => $s1 )
                                    {  ?>
                                
                                <div class="col-lg-4 col-md-6 mb-5 p-0 single-card blog-lists">
                                    <a href="<?=base_url()?>service-detail/<?=$s1->s_slug?>">
                                        <div class="col-12 single-service-custom single-blog">
                                            <div class="col-12 p-0 service-overflow blog-img-wrapper"><img src="<?=front_images().'350_233_'.$s1->s_image;?>" class="w-100" alt=""></div> 
                                            <div class="service-card">
                                                <h3><?=$s1->s_title?></h3>
                                                <p><?=$s1->s_shot_des?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div> 
                            <?php } } ?> 
                            <div class="col-lg-4 col-md-6 mb-5 p-0 single-card blog-lists d-flex">
                                <div class="col-12 single-service-custom single-blog d-flex">
                                    <div class="service-card ">
                                        <div class="text-center mb-5">
                                            <i class="flaticon flaticon-headphones"></i>
                                        </div>
                                        <h3 class="mb-4">WE ARE HERE TO HELP WITH YOUR TRANSPORTATION ALL REPAIR NEEDS</h3>
                                        <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                                        <a href="<?=base_url()?>contact-us" class="cta-btn custon-cat text-center"><span>Contact Us</span></a>
                                    </div>
                                </div>
                            </div>                       
                                
                                
                                
                
                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="breaks" role="tabpanel" aria-labelledby="breaks-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-battery"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-electric-car"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-settings"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-break"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-seat-belt"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-steering-wheel"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="belts" role="tabpanel" aria-labelledby="belts-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-battery"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-electric-car"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-settings"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-break"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-seat-belt"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-steering-wheel"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="diagnostics" role="tabpanel" aria-labelledby="diagnostics-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-battery"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-electric-car"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-settings"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-break"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-seat-belt"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-service">
                                        <i class="flaticon-steering-wheel"></i>
                                        <h3>Battery change</h3>
                                        <p>Tell us what your car needs or ask for a diagnostic. Receive a free, fast, fair & transparent price quote.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Service Area End  --> 



        <!-- footer Start -->
        <?php $this->load->view('front/inc/footer');?>

                    
        <?php $this->load->view('front/inc/scripts');?>
    </body>
</html>