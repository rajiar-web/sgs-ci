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
            <div class="row col-12">
               <div class="col-12 mt-3 mt-lg-5 mb-2 mb-lg-3" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="600">
                  <nav class="arrow-devider" aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                     </ol>
                  </nav>
               </div>
            </div>
            
            <div class="row d-flex justify-content-center checkout-page">
               
               <div class="col-12 col-lg-8 login-customer">
                  <h2 class="text-center">Returning customers?</h2>

                  <div class="accordion mt-3 mb-5 mt-lg-4" id="accordionExample">
                     <?php echo form_open('',array('id'=>'login2')) ?>


                     <div class="accordion-item">
                       <h2 class="accordion-header" id="headingOne">
                         <button class="accordion-button border-0 collapsed ps-0" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                           <div class="col-12 text-center"><span class="me-3">Returning customer? </span> Click here to login</div>
                         </button>
                       </h2>
                       <div id="collapseOne" class="accordion-collapse collapse border-0 " aria-labelledby="headingOne" data-mdb-parent="#accordionExample">
                        <div class="accordion-body  py-2 py-lg-0">
                          <div class="d-flex justify-content-center">


                        

                         <div class="accordion-body col-10" >
                            <div  id="key-pwd">
                           <div class="col">
                              <label for="username" class="form-label">Username </label>
                              <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                           </div>
                           <div class="col mt-3">
                              <label for="pwd" class="form-label">Password</label>
                              <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
                           </div>
                           <div class="form-check d-flex justify-content-center mt-4">
                              <input class="form-check-input me-2" type="checkbox" value="" id="remember-pwd">
                              <label class="form-check-label" for="remember-pwd">
                                 Remember me
                              </label>
                            </div>
                           <div class="col-12 text-center mt-3">
                              <button type="submit" class="btn btn-login login2btn">Login</button>
                              <div class="login2spinner"></div>
                           </div>
<!--                            <div class="col-12 text-center mt-3">
                              <a href="#" id="forget-pwd">Lost your password?</a>
                           </div> -->
                           </div>
<!--                            <div  id="find-pwd" style="display: none;">
                              <div class="col">
                                 <label for="forget-pwd" class="form-label">Enter Email Address </label>
                                 <input type="text" class="form-control" id="forget-pwd" placeholder="Email address">
                              </div>
                              <div class="col-12 text-center mt-4 mb-4">
                                 <button class="btn btn-login login-signup">Email me password</button>
                              </div>
                           </div> -->
                         </div>                

                        </div>
                        </div>
                       </div>
                     </div>
                     <?php echo form_close(); ?>

                     
                     <div class="accordion-item">
                       <h2 class="accordion-header" id="headingTwo">
                         <button class="accordion-button border-top collapsed ps-0" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" >
                          <div class="col-12 text-center"><span class="me-3"> New customer?</span> Sign Up</div> 
                         </button>
                       </h2>
                       <div id="collapseTwo" class="accordion-collapse collapse border-0" aria-labelledby="headingTwo" data-mdb-parent="#accordionExample" >
                         <div class="accordion-body bg-loginpage py-2 py-lg-4">
                           <div class="d-flex justify-content-center mb-lg-4">
                              <div class="accordion-body col-10">

                                <?php echo form_open('',array('id'=>'reg2')) ?>
                                 <div id="register-otp">
                                 <div class="row row-cols-1 row-cols-lg-2">
                                    <div class="col">
                                       <label for="fname" class="form-label">First Name  </label>
                                       <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name:">
                                    </div>
                                    <div class="col">
                                       <label for="lname" class="form-label">Last Name  </label>
                                       <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name:">
                                    </div>
                                    <div class="col">
                                       <label for="ph_no" class="form-label  mt-3">Phone Number  </label>
                                       <input type="text" class="form-control" name="ph_no" id="ph_no" placeholder="Phone Number:">
                                    </div>
                                    <div class="col">
                                       <label for="r_email" class="form-label mt-3">Email address  </label>
                                       <input type="text" class="form-control" name="r_email" id="r_email" placeholder="Email:">
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col">
                                       <label for="address_one" class="form-label">Address</label>
                                       <input type="text" class="form-control" name="address_one"  id="address_one" placeholder="Address line 1:">
                                       <input type="text" class="form-control mt-3" name="address_two" id="address_two" placeholder="Address line 2:">
                                       <input type="text" class="form-control mt-3" name="city" id="city" placeholder="City:">
                                       <input type="text" class="form-control mt-3" name="state" id="state" placeholder="State/Province/Region:">
                                       <input type="text" class="form-control mt-3" name="zip" id="zip" placeholder="ZIP:">
                                       <input type="text" class="form-control mt-3 disable" name="r_country" id="r_country" value="United Kingdom" placeholder="United Kingdom:" disabled readonly>
                                       <input type="password" class="form-control mt-3" name="password" id="password" placeholder="Create Password:">
                                    </div>
                                    <div class="col-12 text-center mt-3 mt-lg-4">
                                       <button type="submit" class="btn btn-login ripple-surface" id="register-btn">Next</button>
                                       <div class="register-spinner"></div>
                                    </div>
                                 </div>
                                 </div>
                                <?php echo form_close(); ?>
                                <!--   -->
                                 <div class="col-12" id="register-otp-fld" style="display: none;">
                                    <div class="row mt-3">
                                      <?php echo form_open('',array('id'=>'otp2form')) ?>
                                      <input type="hidden" id="r_id" name="r_id" value="">
                                       <div class="col">
                                          <label for="otp" class="form-label">Enter OTP</label>
                                          <input type="text" name="r_otp" id="r_otp" class="form-control" placeholder="OTP send to mail">
                                       </div>
                                       <div class="col-12 text-center mt-3 mt-lg-4">
                                          <button type="submit" class="btn btn-login login-signup otpbutton">SIGN UP</button>
                                          <div class="otp-spinner"></div>
                                       </div>
                                        <?php echo form_close(); ?>

                                          <!-- Modal -->
                                          <div class="modal fade confirm-msg" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
                                             <div class="modal-dialog modal-dialog-centered">
                                             <div class="modal-content">
                                                <div class="modal-body">
                                                   <h4>Your account has been Created, Please login</h4>
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
            <div class="row delivery-add">
               <div class="col mb-3 mb-lg-5">                  
               <div class="card address-checkout p-2">
                  <div class="card-body d-block d-lg-flex align-items-center">
                     <div class="col">
                        <h5 class="card-title mb-3">Delivery Address</h5>
                        <p class="card-text"><i class="fas fa-location-arrow me-2"></i> 75 Malcolm Rd, LLANFROTHEN, LL48 0TQ, 078 3865 8009</p>
                     </div>
                     <div class="col d-flex justify-content-end">
                        <a href="#" class="btn btn-changeadd" data-mdb-toggle="modal" data-mdb-target="#exampleModal2">Change</a>
                     </div>
                  </div>
                </div>
               </div>
            </div>





<!-- modal -->
<div class="modal fade" id="exampleModal2" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl  modal-dialog-centered">
    <div class="modal-content delivery-new-sec">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delivery Address</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pt-4 pb-5 px-3 px-lg-5">
         <div class="deliv-add" id="deliv-add">
            <div class="row">
            <div class="col-12 m-center">
               <p>Please Seect delivery address:</p>
            <div class="personal-address btn active">
               <h4 class=" mt-3">John Dio</h4>  
               <p>75 Malcolm Rd</p>
               <p>LLANFROTHEN</p>
               <p>LL48 0TQ</p>
               <p>078 3865 8009</p>
            </div>
            <div class="personal-address btn">
               <h4 class=" mt-3">John Dio</h4>  
               <p>75 Malcolm Rd</p>
               <p>LLANFROTHEN</p>
               <p>LL48 0TQ</p>
               <p>078 3865 8009</p>
            </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12 m-center">
               <hr />
               <div class="personal-address btn new-address-add" id="add-deliaddress">
                  <i class="fas fa-plus"></i>
                  <p>Add New Address</p>
               </div>
            </div>
         </div>
      </div>
      <div class="add-deliv-add" id="add-deliv-add" style="display: none;">
         <div class="row row-cols-1 row-cols-lg-2">
            <div class="col mt-3 mt-lg-4">
               <input type="text" class="form-control" placeholder="Full Name:">
            </div>
            <div class="col mt-3 mt-lg-4">
               <input type="text" class="form-control" placeholder="Phone:">
            </div>
            <div class="col mt-3 mt-lg-4">
               <input type="text" class="form-control" placeholder="Address Line 1:">
            </div>
            <div class="col mt-3 mt-lg-4">
               <input type="text" class="form-control" placeholder="Address Line 2:">
            </div>
            <div class="col mt-3 mt-lg-4">
               <input type="text" class="form-control" placeholder="City:">
            </div>
            <div class="col mt-3 mt-lg-4">
               <input type="text" class="form-control" placeholder="State/Province/Region:">
            </div>
            <div class="col mt-3 mt-lg-4">
               <input type="text" class="form-control" placeholder="ZIP:">
            </div>
            <div class="col mt-3 mt-lg-4">
               <input type="text" class="form-control disable" placeholder="United Kingdom" disabled="" readonly="">
            </div>
         </div>
      </div>
      </div>
      <div class="modal-footer p-0" id="add-delivery" style="display: none;">
        <button type="button" class="btn btn-primary new-deliv-btn m-0 w-100" id="added-address" data-mdb-toggle="modal" data-mdb-target="#confirm-box1" id="your-link">Update</button>
      </div>
    </div>
  </div>
</div>
<!--  -->


<!-- Modal -->
<div class="modal fade confirm-msg" id="confirm-box1" tabindex="-1" aria-labelledby="confirm-box1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
         <h4>Address added</h4>
      </div>
    </div>
  </div>
</div>



            <div class="row row-cols-1 row-cols-md-2 checkout-page">
               <div class="col coupen-box mb-4">
                  <div class="row row-cols-1">

<?php if(!empty($cart_list)){ 
foreach ($cart_list as $cart_item) {

  ?>
                  <div class="col px-4 py-2 ">
                  <div class="row p-3 card-white">
                     <div class="col-12 col-lg-3 d-flex justify-content-center">
                        <img src="<?=front_images().$cart_item['p_image']?>" class="img-thumbnail" alt="">
                     </div>
                     <div class="col-12 col-lg-9">
                  <div class="row row-cols-2 py-3">
                     <p class="coupen-title"><?= $cart_item['p_title'] ?></p>
                     <p class="d-flex expect-date justify-content-end">Delivery in 2 days, Sun</p>
                     <p class="mt-3 price-product-checkout d-flex align-items-center">£<?= $cart_item['p_discound_price'] ?><span class="ms-2">£<?= $cart_item['p_original_price'] ?></span></p>
                     <p class="d-flex justify-content-end mt-3"> <a href="#" class="t-c"> </a></p>
                  </div>
                     </div>
                  </div>
               </div>

<?php } } ?>

               </div>
               </div>

<?php if(!empty($cart_list)){ ?>
               <div class="col">
                  <h2 class="mb-3 mb-lg-4">Your order</h2>
                  <table class="table table-striped border">
                     <thead>
                       <tr>
                         <th scope="col">Product</th>
                         <th scope="col">Subtotal</th>
                       </tr>
                     </thead>
                     <tbody>

<?php foreach ($cart_list as $cart_item) {

  ?>
                       <tr>
                         <th scope="row"><?= $cart_item['p_title'] ?></th>
                         <td>£<?= $cart_item['p_discound_price'] ?></td>
                       </tr>
    <?php } ?>               

                       <tr>
                         <th scope="row" class=" txt-bold">Total</th>
                         <td class=" txt-bold">£<?= $cart_list[0]['o_subtotal'] ?></td>
                       </tr>

                     </tbody>
                   </table>
                   <div class="col d-flex justify-content-lg-end justify-content-center">
        <?php if(!empty($this->session->userdata('lg_user'))) { ?>
                    <a class="btn btn-dark text-right mt-3 mt-lg-3 place-ordr" id="place-order" href="javascript:void(0)">Place order</a>
                    <div class="place-order-spinner"></div>
        <?php }else{ echo '<p>Please login for checkout</p>'; } ?>
                  </div>
               </div>
<?php } ?>

            </div>
         </div>
      </section>

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
               <div class="col mb-3 d-flex justify-content-between align-items-center">
               <h2 class="mb-0">Change Password</h2>
               <span><a href="#"> Resend OTP</a></span>
               </div>
               <input type="password" class="form-control my-3" placeholder="Type Current Password">
               <input type="password" class="form-control my-3" placeholder="Type New Password">
               <input type="password" class="form-control my-3" placeholder="Retype New Password">
               <input type="text" class="form-control my-3" placeholder="OTP">
               <button type="button" class="btn btn-primary pwd-change-btn w-100">Change Password</button>
            </div>
         </div>
      </div>
    </div>
  </div>
</div>
      


<?php $this->load->view('front/inc/scripts');?>
<script type="text/javascript">
    
$(document).on('submit','#login2',function(){
  $(".login2btn").hide();
  $(".login2spinner").html('<span class="spinner-border"></span>');
  
  var baseurl = $("#base").val();
  var form_data = $('#login2').serialize();

               $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'login2-action',
                data:form_data,
                success:function(data)
                { 
                  $(".login2btn").show();
                  $(".login2spinner").html('');  

                  console.log(data);
            
                    if(data.res == 1)
                    {
                      alertify.success(data.msg);
                      setTimeout(function(){ window.location.reload(); }, 700);
                
                    }
                    else
                    {
                        if($.isEmptyObject(data.errors))
                        {
                            alertify.error(data.msg);
                        }
                        else
                        {
                            for(var key in data.errors)
                            {
                                var v = data.errors[key];
                                alertify.error(v);
    
                            }
                        }
                    }
                }
            });

  return false;
});


$(document).on('submit','#reg2',function(){
  $("#register-btn").hide();
  $(".register-spinner").html('<span class="spinner-border"></span>');
  
  var baseurl = $("#base").val();
  var r_country = $("#r_country").val()
  var form_data = $('#reg2').serializeArray();
  form_data.push({'name':'r_country','value':r_country});

               $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'reg2-action',
                data:form_data,
                success:function(data)
                {  
                  $("#register-btn").show();
                  $(".register-spinner").html('');  
            
                    if(data.res == 1)
                    {
                      alertify.success(data.msg);
                      $("#r_id").val(data.l_id);
                      $("#reg2").hide();
                      $("#register-otp-fld").show();
                
                    }
                    else
                    {
                        if($.isEmptyObject(data.errors))
                        {
                            alertify.error(data.msg);
                        }
                        else
                        {
                            for(var key in data.errors)
                            {
                                var v = data.errors[key];
                                alertify.error(v);
    
                            }
                        }
                    }
                }
            });

  return false;
});

$(document).on('submit','#otp2form',function(){
  $(".otpbutton").hide();
  $(".otp-spinner").html('<span class="spinner-border"></span>');
  
  var baseurl = $("#base").val();
  var form_data = $('#otp2form').serializeArray();


               $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'otp2-action',
                data:form_data,
                success:function(data)
                {   
                  $(".otpbutton").show();
                  $(".otp-spinner").html('');  
            
                    if(data.res == 1)
                    {
                      alertify.success(data.msg);
                      setTimeout(function(){ window.location.reload(); }, 700);
                    }
                    else
                    {
                        if($.isEmptyObject(data.errors))
                        {
                            alertify.error(data.msg);
                        }
                        else
                        {
                            for(var key in data.errors)
                            {
                                var v = data.errors[key];
                                alertify.error(v);
    
                            }
                        }
                    }
                }
            });

  return false;
});


$(document).on('click','#place-order',function(){
  $("#place-order").hide();
  $(".place-order-spinner").html('<span class="spinner-border"></span>');
  
  var baseurl = $("#base").val();

               $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'place-order-action',
                success:function(data)
                {   
                    if(data.res == 1)
                    {
                      alertify.success(data.msg);
                      setTimeout(function(){ window.location.href=baseurl+"user-profile"; }, 700);
                    }
                    else
                    {  
                      alertify.error(data.msg);
                    }
                }
            });

  return false;
});



</script>
     
   </body>
</html>
