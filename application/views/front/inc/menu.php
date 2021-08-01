<?php $contact = getcontact();
   $con=$contact[0]; 
   $cat = getcategory();
?>
     <section class="top-banner" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">
         <div class="container">
            <div class="row">
               <div class="col-12 d-block d-md-flex justify-content-between">
                  <ul class="d-flex d-md-flex info">
                     <li><a href="mailto:<?=$con->mc_email?>"></a><?=$con->mc_email?></li>
                     <li class="d-none d-sm-block">Sales : <a href="tel:<?=$con->mc_sales_phone?>"><?=$con->mc_sales_phone?></a></li>
                     <li class="m-right">Support : <a href="tel:<?=$con->mc_support_phone?>"><?=$con->mc_support_phone?></a></li>
                  </ul>
                    <ul class="d-none d-md-flex">

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
      </section>
<?php
$sss = $this->session->get_userdata("lg_user");
if(!empty($sss['lg_user']['user_id']))
{
   $user_id = enc($sss['lg_user']['user_id'] ,'d');
   $cond = array('o.o_r_id'=>$user_id);
   $chk_pr_cart = $this->Main->getDetailedData('c.*,o.*','tbl_order o',$cond,null,null,array('c.c_p_id','asc'),array(array('tbl_cart c','c.c_o_id=o.o_id','left')));
   if(!empty($chk_pr_cart))
   {
      $count_cart = count($chk_pr_cart);
   }
   else
   {
      $count_cart = 0;
   }
}
else if(!empty($this->session->get_userdata("guest_cart")['guest_cart']))
{
   $g_cart = $this->session->get_userdata("guest_cart")['guest_cart'];
   $count_cart = count($g_cart);
}
else
{
   $count_cart = 0;
}

$products = $this->Main->getDetailedData(array('p_title'),'tbl_products',null,null,null,array("p_id","desc"));
if(!empty($products))
{
      $pr_array= array();
      foreach($products as $pr)
      {
         array_push($pr_array,$pr->p_title);
      }

      $arr_prr= '';
      foreach ($pr_array as $key => $value) 
      {
         if ($key > 0) $arr_prr.=',';
         $arr_prr.=$value;
      }

}
?>
<input type="hidden" id="prds_all" value='<?=$arr_prr?>' />

      <header>
         <div class="col-12" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="1300">
            <div class="container">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <!-- Container wrapper -->
                  <div class="container-fluid">
                     <!-- Toggle button -->
                     <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=front_images();?>logo.svg" alt=""></a>
                     <!-- Collapsible wrapper -->
                      <form class="d-md-flex input-group w-50 form-search d-none" id="searchform" autocomplete="off">
                     <div class="autocomplete" style="width:92%;">
                        
                        <input type="text" name="searchinput" id="searchinput" name="myCountry" class="form-control" placeholder="Search Products" aria-label="Search">
                     </div>
                     <button class="btn btn-outline-primary search-btn" type="submit" data-mdb-ripple-color="dark"><i class="fas fa-search"></i></button>
                        <!-- <input type="search" class="form-control" name="searchinput" id="searchinput" placeholder="Search Products" aria-label="Search" /> -->
                        <!-- <button class="btn btn-outline-primary search-btn" type="submit" data-mdb-ripple-color="dark"><i class="fas fa-search"></i></button> -->
                     </form>
                     <div class="d-none d-md-flex">
                        <!-- Left links -->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
                           <li class="nav-item">
                              <?php
                              if(empty($user_id))
                              { ?>
                                 <a class="nav-link sign-in" href="<?=base_url();?>user-login"><i class="far fa-user mx-2"></i>Sign In / Sign Up</a>
                              <?php
  
}
                              else
                              { ?>
                                 <a class="nav-link sign-in" href="<?=base_url();?>user-profile"><i class="far fa-user mx-2"></i><?=!empty($sss['lg_user']['name'])?$sss['lg_user']['name']:""?></a>
                                 <li class="nav-item">
                                 <a class="nav-link sign-in" href="<?=base_url();?>user-logout"><i class="fas fa-sign-out-alt mx-2"></i>Sign Out</a>
                                 </li>
                                 <?php
                              }
                              ?>
                             
                           </li>
                           <li class="nav-item">
                           
                              <a href="" class="cart">
                              <i class="fas fa-cart-arrow-down"></i>
                               <span class="badge rounded-pill badge-notification bg-danger"><?=$count_cart?></span>
                              </a>
                           </li>
                        </ul>
                        <!-- Left links -->
                     </div>
                     <!-- Collapsible wrapper -->
                  </div>
                  <!-- Container wrapper -->
               </nav>
            </div>
         </div>
      </header>
      <div class="droopmenu-navbar custom-menu">
         <div class="droopmenu-inner container d-flex  justify-content-between" >
            <div class="d-flex align-items-center d-md-none">
               <form class="d-flex input-group w-50 form-search">
                  <input type="search" class="form-control" placeholder="Search Products" aria-label="Search" />
                  <button class="btn btn-outline-primary search-btn" type="button" data-mdb-ripple-color="dark"><i class="fas fa-search"></i></button>
               </form>
               <div>
                  <!-- Left links -->
                  <ul class="mb-2 mb-lg-0 d-flex align-items-center">
                     <li class="nav-item mx-3 mx-xl-5 mx-lg-3 mx-md-3">
                        <a class="nav-link sign-in" href="#"><i class="far fa-user mx-2"></i></a>
                     </li>
                     <li class="nav-item">
                        <a href="" class="cart">
                        <span class="badge rounded-pill badge-notification bg-danger">0</span>
                        <i class="fas fa-cart-arrow-down"></i>
                        </a>
                     </li>
                  </ul>
                  <!-- Left links -->
               </div>
            </div>
            <div class="droopmenu-header">
               <a href="#" class="droopmenu-toggle"></a>                
            </div>
            <!-- droopmenu-header -->
            <div class="droopmenu-nav">
               <ul class="droopmenu">
                  <li><a href="<?=base_url()?>listing">All Products</a></li>
                  
                  <?php 
                  foreach($cat as $index=>$ccc)
                     { 
                        if($index<8) {?>
                  <li>
                     <a href="<?=base_url()?>cat-detail/<?=$ccc['slug']?>"><?=$ccc['cat']?></a>
                     <?php
                        if(!empty($ccc['subcat']))
                        { ?>
                           <ul>                     
                              <?php
                                 foreach($ccc['subcat'] as $index=>$subc)
                                 { ?>
                              <li><a href="<?=base_url()?>cat-detail/<?=$subc['c_slug']?>"><?=$subc['c_category']?></a></li>
                              <?php } ?>
                           </ul>
                     <?php } ?>
                  </li>
                        <?php } } ?>
                  
               </ul>
            </div>
            <!-- droopmenu-nav -->
         </div>
         <!-- droopmenu-inner -->
      </div>
      <!-- droopmenu-navbar  -->
      <!-- Droopmenu js -->