<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('front/inc/head');?>
    </head>


    
    <body>
        <?php $this->load->view('front/inc/menu');?>
        

 <!-- banner -->
 <section class="single-product-sec pt-4 mt-0">
         <div class="container">
            <div class="row col-12">
               <div class="col-12 mb-2 mb-lg-3" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="600">
                  <nav class="arrow-devider" aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>user-profile">Home</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url();?>checkout">Checkout</a></li> -->
                     </ol>
                  </nav>
               </div>
            </div>
            <div class="row">

                <?php $this->load->view('front/inc/profile-sidebar');?>

               <div class="col-8 col-lg-9 d-flex profile-box px-3 p-lg-4 ">
                  <div class="col-12">
                     <div class="row">
                     <div id="slide-1">
                        <h3>Personal Information <span class="ms-2"> <a href="javascript:void(0);" id="edit-personal-info"> Edit </a></span></h3>
                        <hr />
                        <div id="personal-info">
                           <h4><?=$r_array->r_first_name?> <?=$r_array->r_last_name?></h4>
                           <p><?=$r_array->r_email?></p>
                           <p><?=$r_array->r_phone?></p>
                        </div>
                        <div id="personal-info-fld" style="display: none;">
                           <?=form_open('',array("class"=>"profile-update-form","id"=>"profileupdateForm"));?>
                              <div class="row row-cols-1 row-cols-lg-2">
                                 <div class="col mt-3 mt-lg-4">
                                    <label for="fname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="<?=$r_array->r_first_name?>" name="fname" id="fname" placeholder="John">
                                 </div>
                                 <div class="col mt-3 mt-lg-4">
                                    <label for="lname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="<?=$r_array->r_last_name?>"  name="lname"  id="lname" placeholder="Dio">
                                 </div>
                                 <div class="col mt-3 mt-lg-4">
                                    <label for="email" class="form-label">Email address( NB: username can't change)</label>
                                    <input type="email" class="form-control" value="<?=$r_array->r_email?>"  name="email" id="email" readonly placeholder="user@email.com">
                                 </div>
                                 <div class="col mt-3 mt-lg-4">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" value="<?=$r_array->r_phone?>"  name="phone" id="phone" placeholder="99 999 9999">
                                 </div>
                                 <div class="col mt-3 mt-lg-4">
                                    <a href="javascript:void(0);" data-mdb-toggle="modal" class="change-pwd-txt" data-mdb-target="#exampleModal"> Change Password</a>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col mt-3 mt-lg-4 mb-4">
                                    <button class="btn btn-info " style="font-size: 16px;">Update</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div id="slide-2" style="display: none;">
                        <h3>Manage Addresses</h3>
                        <hr />
                        <div id="edit-personal-address">
                           <div class="col edit-add mb-3">
                              <a href="javascript:void(0);" class="address_edit"><span class="ms-2" style="color:#2020e3;"> <i class="far fa-edit me-1"></i> Edit </span></a>
                              <a href="javascript:void(0);" class="address_add"><span class="ms-2" style="color:#027d23;"> <i class="fa fa-plus me-1" ></i> Add New </span></a>
                              <a href="javascript:void(0);" class="address_delete"><span class="ms-2" style="color:#b81d2f;"> <i class="fa fa-trash me-1" ></i> Delete </span></a>
                           </div>
                        </div>
                        

                        <?php
                        if(!empty($address_array)) 
                           {
                              foreach($address_array as $key => $al )
                              {  ?>
                                 <div class="personal-address btn <?=($al->add_status == '1'?'active':'')?>" id="active-<?=$al->add_id ?>">
                                 <!-- active -->
                                    <h4 class=" mt-3"><?=$al->add_name?></h4>  
                                    <p><?=$al->add_line1?></p>
                                    <p><?=$al->add_line2?></p>
                                    <p><?=$al->add_city?></p>
                                    <p><?=$al->add_state?></p>
                                    <p><?=$al->add_zip?></p>
                                    <p><?=$al->add_country?></p>
                                    <p><?=$al->add_phone?></p>
                                 </div>
                        <?php 
                           } 
                              } ?> 

                        
                        <div id="personal-address-fld" class="personal-address-fld" style="display: none;">
                           <?=form_open('',array("class"=>"address-update-form","id"=>"addressupdateForm"));?>
                              <div class="row row-cols-1 row-cols-lg-2">
                                 <input type="hidden" class="form-control" name="a_id" id="a_id" value="<?= !empty($active_address_array->add_id)?$active_address_array->add_id:'' ?>" >
                                 <div class="col mt-3 mt-lg-4">
                                    <input type="text" class="form-control" name="a_fullname" id="a_fullname" placeholder="Full Name:" value="<?= !empty($active_address_array->add_name)?$active_address_array->add_name:'' ?>" >
                                 </div>
                                 <div class="col mt-3 mt-lg-4">
                                    <input type="text" class="form-control" name="a_phone" id="a_phone" placeholder="Phone:" value="<?= !empty($active_address_array->add_phone)?$active_address_array->add_phone:'' ?>" >
                                 </div>
                                 <div class="col mt-3 mt-lg-4">
                                    <input type="text" class="form-control" name="a_address_one" id="a_address_one" placeholder="Address Line 1:" value="<?= !empty($active_address_array->add_line1)?$active_address_array->add_line1:'' ?>" >
                                 </div>
                                 <div class="col mt-3 mt-lg-4">
                                    <input type="text" class="form-control" name="a_address_two" id="a_address_two" placeholder="Address Line 2:" value="<?= !empty($active_address_array->add_line2)?$active_address_array->add_line2:'' ?>" >
                                 </div>
                                 <div class="col mt-3 mt-lg-4">
                                    <input type="text" class="form-control" name="a_city" id="a_city" placeholder="City:" value="<?= !empty($active_address_array->add_city)?$active_address_array->add_city:'' ?>" >
                                 </div>
                                 <div class="col mt-3 mt-lg-4">
                                    <input type="text" class="form-control" name="a_state" id="a_state" placeholder="State/Province/Region:" value="<?= !empty($active_address_array->add_state)?$active_address_array->add_state:'' ?>" >
                                 </div>
                                 <div class="col mt-3 mt-lg-4">
                                    <input type="text" class="form-control" name="a_zip" id="a_zip" placeholder="ZIP:" value="<?= !empty($active_address_array->add_zip)?$active_address_array->add_zip:'' ?>" >
                                 </div>
                                 <div class="col mt-3 mt-lg-4">
                                    <input type="text" class="form-control" name="a_country" id="a_country" placeholder="United Kingdom" readonly value="<?= !empty($active_address_array->add_country)?$active_address_array->add_country:'' ?>" >
                                 </div>
                              </div>
                              <div class="row">                              
                                 <!-- <div class="my-3">
                                    <textarea class="form-control" placeholder="Address" rows="5"></textarea>
                                 </div> -->
                                 <div class="col mt-3 mb-4 mt-lg-4">
                                 <button class="btn btn-info " style="font-size: 16px;">Update</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div id="slide-3" style="display: none;">
                        <div class="row">
                           <div class="col-12">
                              <h3>Available Coupons</h3>
                              <hr />
                           </div>
                           <div class="col-12">
                              <div class="col p-4 coupen-box">
                                 <div class="row row-cols-2">
                                    <p class="coupen-title">Special Offer for New Customer</p>
                                    <p class="d-flex justify-content-end"></p>
                                    <p class="mt-3">Apply Coupon <b>GETI20</b> to get extra £10 off</p>
                                    <p class="d-flex justify-content-end mt-3"> <a href="#" class="t-c" data-mdb-toggle="modal" data-mdb-target="#tearms-c"> View T&C</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>



                     <!-- Modal -->
                     <div class="modal fade tearms-condition" id="tearms-c" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Terms and Conditions</h5>
                           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">...</div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary tc-btn" data-mdb-dismiss="modal"> Close</button>
                        </div>
                     </div>
                     </div>
                     </div>
                     <div id="slide-4" style="display: none;">
                        <div class="row my-order-sec">
                           <div class="col-12">
                              <h3>My Orders</h3>
                              <hr />
                           </div>
                           <div class="col-12">
                              <div class="row">
                                 <div class="card mb-3 p-3 card-oredr-items">
                                    <div class="row g-0">
                                      <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="<?=front_images()?>single-img-3.jpg" alt="..." class="img-fluid img-thumbnail order-product-img" />
                                      </div>
                                      <div class="col-md-10 d-flex align-items-center">
                                        <div class="card-body">
                                           <div class="row row-cols-1 row-cols-lg-2">
                                          <div>
                                             <h5 class="card-title mb-3">10D - Atlas Green Detergent 10%</h5>
                                             <div class="row row-cols-1 row-cols-sm-1 d-flex justify-content-center justify-content-md-between align-items-center">
                                                <p class="card-text order-price mb-3"> £9.55 </p>
                                                <a href="#" class="btn mb-4 cancel-btn"><i class="fas fa-redo me-2"></i> Cancel Order </a>
                                             </div>
                                          </div>
                                             <div class="status">
                                                <p class="status-order mb-0 dispatched d-flex justify-content-start justify-content-lg-end">Dispatched on Aug 28, 2020</p>
                                                <p class="status-order d-flex justify-content-start justify-content-lg-end tracking-title">Your package arrived at the courier facility</p>
                                                <p class="status-order d-flex justify-content-start justify-content-lg-end tracking-msg pb-3">Expected delivery: &nbsp;<span>Fri, 02 June 2021</span></p>

                                             <div class="position-relative mx-4 mx-xl-5 d-none d-sm-block">
                                                <div class="progress" style="height: 1px;">
                                                  <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill">Ordered</button>
                                                <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill">Shipped</button>
                                                <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill">Shipped</button>
                                                <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill">Delivered</button>
                                             </div>
                                             </div>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                 <div class="card mb-3 p-3 card-oredr-items">
                                    <div class="row g-0">
                                      <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="<?=front_images()?>single-img-3.jpg" alt="..." class="img-fluid img-thumbnail order-product-img" />
                                      </div>
                                      <div class="col-md-10 d-flex align-items-center">
                                        <div class="card-body">
                                           <div class="row row-cols-1 row-cols-lg-2">
                                              <div>
                                             <h5 class="card-title mb-3">10D - Atlas Green Detergent 10%</h5>
                                             <div class="row row-cols-1 row-cols-sm-1 d-flex justify-content-center justify-content-md-between align-items-center">
                                                <p class="card-text order-price mb-3"> £9.55 </p>
                                                <a href="#" class="btn mb-4 return-btn"><i class="fas fa-redo me-2"></i> Return </a>
                                             </div>
                                          </div>
                                             <div class="status">
                                                <p class="status-order delivered d-flex justify-content-start justify-content-lg-end">Delivered on Aug 28, 2020</p>
                                                <p class="status-order-dic d-flex justify-content-start justify-content-lg-end">Your item has been delivered</p>
                                             </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                 <div class="card mb-3 p-3 card-oredr-items">
                                    <div class="row g-0">
                                      <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="<?=front_images()?>single-img-2.jpg" alt="..." class="img-fluid img-thumbnail order-product-img" />
                                      </div>
                                      <div class="col-md-10 d-flex align-items-center">
                                        <div class="card-body">
                                           <div class="row row-cols-1 row-cols-lg-2">
                                              <div>
                                             <h5 class="card-title mb-3">10D - Atlas Green Detergent 10%</h5>
                                             <div class="row row-cols-1 row-cols-sm-1 d-flex justify-content-center justify-content-md-between align-items-center">
                                                <p class="card-text order-price mb-3"> £9.55 </p>
                                             </div>
                                          </div>
                                             <div class="status">
                                                <p class="status-order cancelled d-flex justify-content-start justify-content-lg-end">Cancelled on Aug 28, 2020</p>
                                             </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                 <div class="card mb-3 p-3 card-oredr-items">
                                    <div class="row g-0">
                                      <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <img src="<?=front_images()?>single-img-2.jpg" alt="..." class="img-fluid img-thumbnail order-product-img" />
                                      </div>
                                      <div class="col-md-10 d-flex align-items-center">
                                        <div class="card-body">
                                           <div class="row row-cols-1 row-cols-lg-2">
                                              <div>
                                             <h5 class="card-title mb-3">10D - Atlas Green Detergent 10%</h5>
                                             <p class="card-text order-price mb-3"> £9.55 </p>
                                          </div>
                                             <div class="status">
                                                <p class="status-order returned d-flex justify-content-start justify-content-lg-end">Returned</p>
                                                <p class="status-order-dic d-flex justify-content-start justify-content-lg-end">You returned this order because you received a different product.</p>
                                             </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                           </div>
                        </div>
                     </div>

                  </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

		<!--Footer : Begin-->
		<?php $this->load->view('front/inc/footer');?>
      <!-- Modal -->
      <div class="modal fade change-password" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
         <div class="modal-content px-3 px-lg-5 pb-5">
            <div class="modal-header border-0">
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-12 col-lg-5 mb-3 mb-lg-0">
                     <h3>Your new password must:</h3>
                     <ul>
                        <li>Be at least 4 characters in length</li>
                        <li>Not be same as your current password</li>
                        <li>Not contain common passwords.</li>
                     </ul>
                  </div>
                  <div class="col-12 col-lg-7">
                     <div id="new-pwd">
                        <div class="col mb-3 d-flex justify-content-between align-items-center">
                           <h2 class="mb-0">Change Password</h2>
                        </div>
                        <?=form_open('',array("class"=>"change-password-form","id"=>"changepasswordForm"));?>
                           <input type="password" name="cpass" id="cpass" class="form-control my-3" placeholder="Type Current Password">
                           <input type="password" name="npass" id="npass" class="form-control my-3" placeholder="Type New Password">
                           <input type="password" name="conpass" id="conpass" class="form-control my-3" placeholder="Retype New Password">
                           <button class="btn btn-primary pwd-change-btn w-100" id="chage-pwd-next">Next</button>
                        </form>
                     </div>

                     <!-- otp hide in costom.js first function -->
                     <!-- <div id="opt-pwd" style="display: none;"> 
                        <h2 class="mb-3 mb-lg-4">Enter OTP</h2>
                        <input type="text" class="form-control mt-3 mb-2" placeholder="OTP send to mail">
                        <span><a href="#"> Resend OTP</a></span>
                        <button type="button" class="btn btn-primary my-3 pwd-change-btn w-100" id="chage-pwd-next">Submit</button>
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>

                    
        <?php $this->load->view('front/inc/scripts');?>
        <script type="text/javascript" src="<?=front_js();?>user_profile.js"></script>
    </body>
</html>