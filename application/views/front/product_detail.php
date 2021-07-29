<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('front/inc/head');?>
    </head>


    
    <body>
        <?php $this->load->view('front/inc/menu');?>

            <!-- banner -->
            <section class="single-product-sec">
                <div class="container">
                    <div class="row">
                    <div class="col-12 mt-3 mt-lg-5 mb-2 mb-lg-3" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="600">
                        <nav class="arrow-devider" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>listing">All Products </a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?=$products->p_title?> </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-12 col-lg-5 single-product-prev" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">
                        <figure class="w-100" style="height: 525px;">
                            <img src="<?=front_images().$products->p_image?>" alt="" class="img-fluid" style="height: 460px;">
                            <span class="badge bg-danger badge-dot"><?=$products->p_offer?>% <br>Off</span>
                        </figure>
                    </div>
                    <div class="col-12 col-lg-7 mt-4 mt-lg-1 single-product-disc ps-3 ps-lg-5"  data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="1200">
                        <h2 data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="1200"><?=$products->p_title?></h2>
                        <h3 class="d-flex align-items-center justify-content-start justify-content-lg-start mb-1 mb-lg-4">£<?=$products->p_discound_price?><span class="ms-3">£<?=$products->p_original_price?></span></h3>
                        <form class="mb-3 mb-lg-5">
                            <div class="row">
                                <div class="col-12 d-block d-md-flex align-items-center">
                                <label for="qtynumber" class="me-0 me-md-4">QTY</label>
                                <div class="">
                                    <div class="value-button border-end-0" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                    <input type="number" id="number" name="qtynumber" value="0" />
                                    <div class="value-button border-start-0" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                                </div>
                                <button type="button" class="btn btn-primary qty-btn ms-0 ms-md-4 mt-3 mt-lg-0">Buy now</button>
                                </div>
                            </div>
                        </form>
                       <?=$products->p_desc?>
                    </div>
                    </div>
                </div>
            </section>
            <section class="info-sec detail-info">
                <div class="container">
                    <div class="detail-product-info">
                    <div class="row row-cols-1 row-cols-md-3 g-0 g-lg-5 p-5 p-lg-3">
                    <div class="d-flex aos-init aos-animate" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="1200">
                        <div class="card w-100">
                            <img src="<?=front_images()?>/delivery-truck.svg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">FREE SHIPPING</h5>
                                <p>Orders over £50</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex aos-init aos-animate" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">
                        <div class="card w-100">
                            <img src="<?=front_images()?>/Layer_1.svg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">BEST PRICE</h5>
                                <p>Guaranteed</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex aos-init aos-animate" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="1800">
                        <div class="card w-100">
                            <img src="<?=front_images()?>/padlock.svg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">100% SECURE</h5>
                                <p class="card-text">Online Shopping</p>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </section>
            <section class="related-product">
                <div class="container">
                    <div class="row">
                        <h2 class="my-2 mb-lg-5"  data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="800">Related Products</h2>
                        <?php 
                        foreach($catproductData as $cat_prs)
                        { ?>
                        <div class="col-12 col-lg-3 col-md-12 my-3 d-flex aos-init aos-animate" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">
                            <a href="<?=base_url()?>product-detail/<?=$cat_prs->p_slug?>">
                            <div class="card w-100">
                                <div class="product-image d-flex">
                                    <img src="<?=front_images().$cat_prs->p_image?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?=$cat_prs->p_title?>
                                    </h5>
                                    <h3 class="d-flex align-items-center justify-content-center justify-content-lg-start">£<?=$cat_prs->p_original_price?><span class="ms-3">£<?=$cat_prs->p_discound_price?></span></h3>
                                </div>
                            </div>
                            </a>
                        </div>
                        <?php } ?>

                    

                    

                    

                    </div>
                </div>
            </section>
        

      


        <!-- footer Start -->
        <?php $this->load->view('front/inc/footer');?>   
        <?php $this->load->view('front/inc/scripts');?>
        
    </body>
</html>