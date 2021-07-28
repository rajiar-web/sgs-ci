<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('front/inc/head');?>
        <style>
        .mycolornew
        {
            color:#000;
        }
        </style>
    </head>


    
    <body>
        <?php $this->load->view('front/inc/menu');?>
        <?php $contact = getcontact();
	$con=$contact[0]; ?>
        

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
        <div class="breadcrumb-area breadcrumb-bg-contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-txt">
                            <h1>Contact us</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="breadcrumb-links">
                            <ul>
                                <li><a href="<?=base_url()?>">Home</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-overlay"></div>
        </div>
        <!--  Breadcrumb Area End  -->


        <!--   contact section start    -->
        <div class="contact-section">
            <div class="container">
                <!--  contact infos start  -->
                <div class="contact-infos">
                    <div class="row no-gutters">
                        <div class="col-lg-4 single-info-col">
                            <div class="single-info wow fadeInRight" data-wow-duration="1s">
                                <div class="icon-wrapper"><i class="fas fa-home"></i></div>
                                <div class="info-txt">
                                    <p class="mycolornew"><?=$con->c_address?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 single-info-col">
                            <div class="single-info wow fadeInRight" data-wow-duration="1s" data-wow-delay=".2s">
                                <div class="icon-wrapper"><i class="fas fa-phone"></i></div>
                                <div class="info-txt">
                                    <p><a class="mycolornew" href="tel:+<?=$con->c_phone?>"><?=$con->c_email?></a></p>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 single-info-col">
                            <div class="single-info wow fadeInRight" data-wow-duration="1s" data-wow-delay=".4s">
                                <div class="icon-wrapper"><i class="far fa-envelope"></i></div>
                                <div class="info-txt">
                                    <p><a class="mycolornew" href="mailto:<?=$con->c_email?>"><?=$con->c_email?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  contact infos end  -->
                <!--  contact form and map start  -->
                <div class="contact-form-section">
                    <div class="row">
                        <div class="col-lg-6">
                            <span class="title">Contact</span>
                            <h2 class="subtitle">KEEP IN TOUCH</h2>
                            <?=form_open('',array("class"=>"contact-form","id"=>"contactForm"));?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-element"><input type="text" name="name" placeholder="Name"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-element"><input type="text" name="email" placeholder="Email"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-element"><input type="text" name="phone" placeholder="Phone"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-element"><input type="text" name="subject" placeholder="Subject"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-element">
                                            <textarea name="message" cols="30" rows="10" placeholder="Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-element">
                                            <button type="submit"><span>Submit</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <div class="map-wrapper">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2480.3294036439256!2d-0.3566287842280165!3d51.562194579644114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876132204566515%3A0xe38a2e48a1f7a9e4!2s28%20Wargrave%20Rd%2C%20Harrow%20HA2%208LN%2C%20UK!5e0!3m2!1sen!2sin!4v1607080730049!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  contact form and map end  -->
            </div>
        </div>
        <!--   contact section end    -->



        <!-- footer Start -->
        <?php $this->load->view('front/inc/footer');?>

                    
        <?php $this->load->view('front/inc/scripts');?>
        <script src="<?=front_js();?>contact.js"></script>
    </body>
</html>