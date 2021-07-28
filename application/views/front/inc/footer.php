<?php $contact = getcontact();
	$con=$contact[0]; 
    ?>

<!--    Footer Area Start    -->
<footer>
         <div class="container">
            <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2">
               <div class="col" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="700">
                  <h2>Information</h2>
                  <ul>
                     <li><a href="#"> Delivery information </a></li>
                     <li><a href="#"> Privacy Policy</a></li>
                     <li><a href="#"> Terms & Conditions</a></li>
                  </ul>
               </div>
               <div class="col" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="1200">
                  <h2>Account</h2>
                  <ul>
                     <li><a href="#"> My account </a></li>
                     <li><a href="#"> My orders</a></li>
                     <li><a href="#"> Returns</a></li>
                     <li><a href="#"> Shipping</a></li>
                     <li><a href="#"> Wishlist</a></li>
                  </ul>
               </div>
               <div class="col" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="1600">
                  <h2>Store</h2>
                  <ul>
                     <li><a href="#"> Bestsellers </a></li>
                     <li><a href="#"> Discount</a></li>
                     <li><a href="#"> Latest products</a></li>
                  </ul>
               </div>
               <div class="col" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="2000">
                  <h2>Need help</h2>
                  <ul class="mb-2">
                     <li class="phn"><a href="tel:<?=$con->mc_support_phone?>"> <?=$con->mc_support_phone?> </a></li>
                     <li>Monday - Friday : 9AM - 5PM</li>
                     <li>Saturday :  10 AM - 4 AM</li>
                  </ul>
                  <ul class="d-flex justify-content-center justify-content-sm-start">
                     <?php
                        if(!empty($con->mc_social_media))
                           {
                              $social = !empty($con->mc_social_media)?json_decode($con->mc_social_media):null;
                              if(!empty($social))
                              {
                                    $j = 1000;
                                    foreach($social as $c)
                                    {
                                    
                                       echo ' <li><a href="'.$c->link.'"  class="px-2" target="_blank"><i class="'.$c->icon.'"></i></a></li>';
                                       $j+=1000;
                                    }
                              }
                           }
                     ?>
                  </ul>
               </div>
            </div>
         </div>
      </footer>
      <section class="payment-foot">
         <div class="container">
            <div class="row">
               <div class="col-12 col-md-8 d-flex align-items-center">
                  <p>Copyright © 2021 Specialist Global Systems. All Rights Reserved. | Powered By Hintt</p>
               </div>
               <div class="col-12 col-md-4 payment-footer">
                  <img src="<?=front_images();?>payment-ico.svg" class="img-fluid" alt="">
               </div>
            </div>
         </div>
      </section>
      <a class="scroll-top-arrow wave" style="display: inline;">
      <i class="fa fa-angle-up">
      </i>
      </a>

        <input type="hidden" value="<?=base_url()?>" id="base_url">
        <input type="hidden" id="base" value="<?=base_url();?>">
        <!-- preloader end --> 