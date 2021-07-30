<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('front/inc/head');?>
    </head>


    
    <body>
        <?php $this->load->view('front/inc/menu');?>
        

            <!-- banner -->
            <section class="login">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 col-lg-7">
                            <h2 class="title-h2" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">Login Now</h2>
                            <p class="mt-4 title-p" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="1200">Get access to your Orders, Wishlist and Recommendations</p>
                        </div>
                        <div class="col-11 col-lg-5" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="1500">
                            <div class="form-sec p-3 p-lg-5 ">
                                <!-- Tabs navs -->
                                <ul class="nav nav-tabs nav-fill mb-3 mb-lg-4" id="ex1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="ex2-tab-1" data-mdb-toggle="tab" href="#ex2-tabs-1" role="tab" aria-controls="ex2-tabs-1" aria-selected="true" >Login</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="ex2-tab-2" data-mdb-toggle="tab" href="#ex2-tabs-2" role="tab" aria-controls="ex2-tabs-2" aria-selected="false">Register</a>
                                    </li>
                                </ul>
                                <!-- Tabs navs -->
                                
                                <!-- Tabs content -->
                                <div class="tab-content" id="ex2-content">
                                    <div class="tab-pane fade show active" id="ex2-tabs-1" role="tabpanel" aria-labelledby="ex2-tab-1" >
                                        <div class="col-12" id="key-pwd">
                                            <?=form_open('',array("class"=>"login-form","id"=>"loginForm"));?>
                                                <div class="col">
                                                    <label for="username" class="form-label mt-3">Username </label>
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                                </div>
                                                <div class="col">
                                                    <label for="pwd" class="form-label mt-3">Password</label>
                                                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
                                                </div>
                                                <div class="form-check d-flex justify-content-center mt-4">
                                                    <input class="form-check-input me-2" type="checkbox" value="" id="remember-pwd">
                                                    <label class="form-check-label" for="remember-pwd">
                                                        Remember me
                                                    </label>
                                                </div>
                                                <div class="col-12 text-center mt-3">
                                                    <button class="btn btn-login login-signup">Login</button>
                                                </div>
                                            </form>
                                            <div class="col-12 text-center mt-3">
                                                <a href="#" id="forget-pwd">Lost your password?</a>
                                            </div>
                                        </div>



                                        <div class="col-12" id="find-pwd" style="display: none;">
                                            <?=form_open('',array("class"=>"forget-form","id"=>"forgetForm"));?>
                                                <div class="col">
                                                    <label for="forget-pwd" class="form-label">Enter Email Address </label>
                                                    <input type="text" class="form-control" name="forget_pwd" id="forget_pwd" placeholder="Email address">
                                                </div>
                                                <div class="col-12 text-center mt-3">
                                                    <button class="btn btn-login login-signup">Email me password</button>
                                                </div>
                                            </form>	
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="ex2-tabs-2" role="tabpanel" aria-labelledby="ex2-tab-2" >
                                        <div class="col-12" id="register-otp">
                                            <?=form_open('',array("class"=>"register-form","id"=>"registerForm"));?>
                                                <div class="row row-cols-1 row-cols-lg-2">
                                                    <div class="col">
                                                        <label for="fname" class="form-label mt-3">First Name  </label>
                                                        <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name:">
                                                    </div>
                                                    <div class="col">
                                                        <label for="lname" class="form-label mt-3">Last Name  </label>
                                                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name:">
                                                    </div>
                                                    <div class="col">
                                                        <label for="ph-no" class="form-label  mt-3">Phone Number  </label>
                                                        <input type="text" class="form-control" name="ph_no" id="ph_no" placeholder="Phone Number:">
                                                    </div>
                                                    <div class="col">
                                                        <label for="email" class="form-label mt-3">Email address  </label>
                                                        <input type="text" class="form-control" name="r_email" id="r_email" placeholder="Email:">
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text" class="form-control" name="address_one" placeholder="Address line 1:">
                                                        <input type="text" class="form-control mt-3" name="address_two" placeholder="Address line 2:">
                                                        <input type="text" class="form-control mt-3" name="city" placeholder="City:">
                                                        <input type="text" class="form-control mt-3" name="state" placeholder="State/Province/Region:">
                                                        <input type="text" class="form-control mt-3" name="zip" placeholder="ZIP:">
                                                        <input type="text" class="form-control mt-3" value="United Kingdom" name="r_country" placeholder="United Kingdom:" readonly="">
                                                        <input type="password" class="form-control mt-3" name="password" placeholder="Create password:">
                                                    </div>
                                                    <div class="col-12 text-center mt-3 mt-lg-4">
                                                        <button class="btn btn-login login-signup" id="register-btn">Next</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-12" id="register-otp-fld" style="display: none;">
                                            <?=form_open('',array("class"=>"otp-form","id"=>"otpForm"));?>
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <label for="otp" class="form-label">Enter OTP</label>
                                                            <input type="text" class="form-control" name="r_otp" placeholder="OTP send to mail">
												            <input type="hidden" className="form-control"  value="" name="r_id" id="r_id"  />
                                                    </div>
                                                    <div class="col-12 text-center mt-3 mt-lg-4">
                                                        <button class="btn btn-login login-signup">SIGN UP</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabs content -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <!-- footer Start -->
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
        <script type="text/javascript" src="<?=front_js();?>register.js"></script>
    </body>
</html>