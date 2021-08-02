<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('front/inc/head');?>
    </head>
    <link rel="stylesheet" type="text/css" href="<?=front_css();?>slick-theme.css" />
 <link rel="stylesheet" type="text/css" href="<?=front_css();?>slick.css" />

    
    <body>
        <?php $this->load->view('front/inc/menu');?>
        <!-- sliders -->
      <section class="slides">
         <div id="carouselBasicExample" class="carousel slide carousel-fade"data-mdb-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
            <?php 
            $ii =1;
            foreach($slider as $index=>$s)
            { ?>
               <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="<?=$index?>" <?=($index==0)?'class="active" aria-current="true"':""?>  aria-label="Slide <?=$ii?>" ></button>
            <?php
            $ii=$ii+1;
            } ?>
            </div>
            <!-- Inner -->
            <div class="carousel-inner">
                <?php 
                
                foreach($slider as $index=>$s)
                { ?>
                <!-- Single item -->
                <div class="carousel-item <?=($index==0)?'active':''?>">
                    <img src="<?=front_images()?>banner-bg-img1.png" class="d-block w-100" alt="..." />
                    <div class="carousel-caption vdo-carousel-caption mb-5">
                        <div class="animated fadeInDown position-absolute carousel-custome">
                            <div class="container">
                            <div class="row">
                                <div class="col-6" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">
                                    <h2><?=$s->s_title?>       </h2>
                                    <p class="mt-3"><?=$s->s_desc?> </p>
                                    <h3 class="d-flex align-items-center">£<?=$s->s_discount_price?><span class="ms-4">£<?=$s->s_original_price?></span></h3>
                                    <a href="<?=$s->s_url?>"><button class="btn btn-slider mt-3">Buy now</button></a>
                                </div>
                                <div class="col-6 d-flex align-items-end justify-content-center" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="1300">
                                    <figure class="position-relative">                           
                                        <img src="<?=front_images()?><?=$s->s_image?>" class="img-fluid" alt="">
                                        <span class="badge bg-danger badge-dot"><?=$s->s_offer?> <br>Off</span>
                                    </figure>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single item -->

               <?php } ?>


            </div>
            <!-- Inner -->
         </div>
      </section>
      <section class="py-0 sec1-product">
         <div class="container-fluid">
            <div class="row row-cols-1 row-cols-md-2 g-3">
                
               <?php               
               foreach ($top_product as $index1=>$tp)
               { ?>
                  <div class="d-flex mt-0">
                     <div class="card mb-3 p-3 <?=($index1 == 0 || $index1==3)?'vialot-card':'pinkbg-card'?> p-lg-5 d-flex" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">
                           <div class="row g-0">
                              <div class="col-md-8">
                              <div class="card-body">
                                 <h5 class="card-title"> <?=$tp->title?>
                                 </h5>
                                 <p class="card-text py-3"> <?=$tp->des?></p>
                                 <a href="<?=$tp->link?>" class="btn btn-primary">Buy now</a>
                              </div>
                              </div>
                              <div class="col-md-4 d-flex align-items-center">
                              <img src="<?=front_images()?><?=$tp->image?>" alt="..." class="img-fluid" />
                              </div>
                           </div>
                     </div>
                  </div>
         <?php } ?>
               
               
            </div>
         </div>
      </section>
      <section class="featured-products" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">
         <div class="container">
            <div class="row">
               <h2 class="py-3 py-md-4">Featured Products</h2>
               <!-- Carousel wrapper -->
               <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel" >
                  <!-- Inner -->
                  <div class="carousel-inner py-4">
                     
                     <?php 
                     $ll = 0;                   
                     for($k=0;$k<$count_featured_limit;$k++)
                     {  ?>
                        <div class="carousel-item <?=($k == 0)?'active':''?>">
                           <div class="container">
                              <div class="row">
                                    <?php foreach($featured_products as $ind=>$fp)
                                    { 
                                       if($ind>=$ll && $ind<$ll+4) 
                                       {
                                       ?>
                                          <div class="col-12 col-lg-3 col-md-12 my-3 d-flex">
                                             <a href="<?=$fp->link?>">
                                                <div class="card w-100">
                                                   <div class="product-image d-flex">
                                                      <img src="<?=front_images()?><?=$fp->image?>" class="card-img-top" alt="..." />
                                                   </div>
                                                   <div class="card-body" style="height: 150px;">
                                                      <h5 class="card-title"><?=$fp->title?>
                                                      </h5>
                                                      <h3 class="d-flex align-items-center justify-content-center justify-content-lg-start">£<?=$fp->dis_rate?><span class="ms-3">£<?=$fp->org_rate?></span></h3>
                                                   </div>
                                                </div>
                                             </a>
                                          </div>
                                 <?php } 
                                    
                                    } 
                                    $ll= $ll+4;
                                    ?>
                                    
                              </div>
                           </div>
                        </div>
               <?php } ?>

                     

                  </div>
                  <!-- Inner -->
                  <!-- Controls -->
                  <div class="d-flex justify-content-center mb-4">
                     <button class="carousel-control-prev position-relative" type="button" data-mdb-target="#carouselMultiItemExample" data-mdb-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="visually-hidden">Previous</span>
                     </button>
                     <button class="carousel-control-next position-relative" type="button" data-mdb-target="#carouselMultiItemExample" data-mdb-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="visually-hidden">Next</span>
                     </button>
                  </div>
               </div>
               <!-- Carousel wrapper --> 
            </div>
         </div>
      </section>
      <section class="info-sec">
         <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-0 g-lg-5">
               <div class="d-flex" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="1200">
                  <div class="card w-100">
                     <img src="<?=front_images()?>delivery-truck.svg" class="card-img-top" alt="..." />
                     <div class="card-body">
                        <h5 class="card-title">FREE SHIPPING</h5>
                        <p>Orders over £50</p>
                     </div>
                  </div>
               </div>
               <div class="d-flex" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">
                  <div class="card w-100">
                     <img src="<?=front_images()?>Layer_1.svg" class="card-img-top" alt="..." />
                     <div class="card-body">
                        <h5 class="card-title">BEST PRICE</h5>
                        <p>Guaranteed</p>
                     </div>
                  </div>
               </div>
               <div class="d-flex" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="1800">
                  <div class="card w-100">
                     <img src="<?=front_images()?>padlock.svg" class="card-img-top" alt="..." />
                     <div class="card-body">
                        <h5 class="card-title">100% SECURE</h5>
                        <p class="card-text">Online Shopping</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="best-sellers">
         <div class="container">
            <h2 class="text-center my-3 my-md-5" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">BEST SELLERS</h2>
            <div class="row row-cols-1 row-cols-md-2 g-1 g-lg-5">
               <div class="col d-flex" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">
                  <div class="card bg-dark text-white w-100 single-product">
                     <img src="<?=front_images()?>best-seller.jpg" class="card-img" alt="..." />
                     <div class="card-img-overlay p-4 p-lg-5">
                        <h5 class="card-title">Dispensers</h5>
                        <p class="card-text">Works by pushing on base of
                           front face plate.
                        </p>
                        <a href="#" class="btn btn-primary btn-collections">View  collections</a>
                     </div>
                  </div>
               </div>
               <div class="col d-flex">
                  <div class="row g-3 g-md-4">
                  <?php foreach($best_seller as $ind1=>$bs)
                                    { ?>
                        <div class="col-12 d-flex card-shadow" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">
                            <div class="col-md-4 d-flex align-items-center">
                            <img src="<?=front_images()?><?=$bs->image?>" alt="..." class="img-fluid">
                            </div>
                            <div class="card mb-3 pinkbg-card p-3 d-flex w-100">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"> <?=$bs->title?>
                                        </h5>
                                        <h3 class="d-flex align-items-center">£<?=$bs->dis_rate?><span class="ms-3">£<?=$bs->org_rate?></span></h3>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <?php } ?>
                     
                     
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="mail-sec" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">
         <div class="container">
            <div class="email-img">
               <h2 class="my-2 my-lg-5 text-center">Join our newsletter and get <br />
                  £5 discount for your first order
               </h2>
               <form class="input-group w-50 m-auto">
                  <input type="email" class="form-control" placeholder="Your-Email" aria-label="email" id="email" name="email">
                  <span id="email_error" class="validation-error"></span>
                  <button class="btn btn-outline-primary email-btn" type="button" data-mdb-ripple-color="dark"> <img src="<?=front_images()?>email.png" alt=""> </button>
               </form>
            </div>
         </div>
      </section>



        <!-- footer Start -->
        <?php $this->load->view('front/inc/footer');?>

                    
        <?php $this->load->view('front/inc/scripts');?>


    </body>
</html>