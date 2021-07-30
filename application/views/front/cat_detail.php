<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('front/inc/head');?>
    </head>


    
    <body>
        <?php $this->load->view('front/inc/menu');?>
        

      <!-- banner -->
      <section class="banner-detail-page">
         <div class="container">
            <div class="row">
               <h2 data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900"><?=$main_cat?>e</h2>
            </div>
         </div>
      </section>
      <section class="product-detailed">
         <div class="container">
            <div class="row">
               <div class="col-4 col-lg-3 detail-sidebar card d-flex px-2 px-lg-3">
                  <nav class="category d-flex align-content-between flex-wrap">
                     <ul class="ctgul p-0 p-lg-2" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">
                        <h2 class="pt-3 pb-2 pb-lg-3 pt-lg-5">Categories</h2>
                        

                        <?php 
                        foreach($categoryData as $ind=>$cd)
                        { ?>
                        <li class="ctgli">
                           <a href="<?=base_url()?>cat-detail/<?=$cd['slug']?>" class="ctga">
                              <div class="ok"></div>
                              <i class="ti-layout"></i>
                              <?=$cd['cat']?>
                              <?php if($cd['subcat'] !="")
                              { ?>
                              <i class="fas fa-chevron-down down"></i>
                              <?php } ?>
                           </a>
                           <?php if($cd['subcat'] !="")
                              { ?>
                           <ul class="ctgulChild">
                              <?php 
                              foreach($cd['subcat'] as $sc)
                              { ?>
                              <li class="ctgliChild">
                                 <a href="<?=base_url()?>cat-detail/<?=$sc['c_slug']?>" class="ctgaChild"><?=$sc['c_category']?></a>
                              </li>
                              <?php } ?>
                              
                              

                           </ul>
                           <?php } ?>
                        </li>
                        <?php } ?>
                        
                        
                        
                        
                      
                        
                        
                     </ul>
                     <ul class="w-100 mt-5" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">
                        <li class="">
                           <figure>
                              <img src="<?=front_images()?>/detail-side-banner.png" class="w-100" alt="">
                           </figure>
                        </li>
                     </ul>
                  </nav>
               </div>



               <div class="col-8 col-lg-9 d-flex product-sec px-3 px-lg-5">
                  <div class="row" id="prolist">
                     
                     <?php 
                     if(!empty($products))
                     {
                     foreach($products as $ind=>$p)
                     {
                        if($ind<9) { ?>
                     <div class="col-12 col-lg-4 col-md-12 my-3">
                        <a href="<?=base_url()?>product-detail/<?=$p->p_slug?>">
                           <div class="card w-100">
                              <div class="product-image d-flex">
                                 <img src="<?=front_images()?>/<?=$p->p_image?>" class="card-img-top" alt="...">
                              </div>
                              <div class="card-body">
                                 <h5 class="card-title"><?=$p->p_title?>
                                 </h5>
                                 <h3 class="d-flex align-items-center justify-content-center justify-content-lg-start">£<?=$p->p_original_price?><span class="ms-3">£<?=$p->p_discound_price?></span></h3>
                              </div>
                           </div>
                        </a>
                     </div>
                     <?php } } }
                     else{?>
                     <p>No products found </p>
                     <?php } ?>

                     
                  </div>
               </div>




               <?php 
                     if(!empty($products))
                     { ?>
               <div class="col-12 d-flex justify-content-end">
                  <nav aria-label="...">
                        <?=$this->pagination->create_links();?>
                  </nav>
               </div>

            <?php } ?>
            </div>
         </div>
      </section>


        <!-- footer Start -->
        <?php $this->load->view('front/inc/footer');?>


            <script>
         $(".ctgli:has(.ctgulChild)").click(function (e) {
          e.preventDefault();
          //li_HAVE_Child-hasShowed-hasSlideD
          if($(this).hasClass('showed')){
              //-x-hasShowed
              $('.ctgli').removeClass('showed');
              //-x-hasSlideD
              $(this).children('.ctgulChild').slideUp();
              
          }
          
          else{
              
              $('.ctgulChild').slideUp();
              $('.ctgli').removeClass('showed');
         
              $(this).addClass('showed');
              $(this).children('.ctgulChild').slideToggle();
            
          }
         });
         
         $('.ctgli').click(function(){
          $(this).toggleClass('wtok');
         });
      </script>        
        <?php $this->load->view('front/inc/scripts');?>

      <script>
          $( document ).ready(function() {
            $('.page-item a').each(function() {
              $(this).attr('class', 'page-link');
            });
            
            $('.pagination a').each(function() {
              $(this).attr('class', 'page-link');
            });

            
          });
        </script>
        
    </body>
</html>