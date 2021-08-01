<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'home';
$route['index'] = 'home';
$route['about-us'] = 'Home/aboutus';
$route['contact-us'] = 'Home/contactus';
$route['contact-action'] ='Home/contact_act'; 
$route['services'] = 'Home/services';
$route['service-detail/(:any)'] = 'Home/service_detail/$1';

$route['index-form-action'] ='Home/index_contact_act';
$route['contact-form-action'] ='Home/contact_act';


//start

//registration 

$route['user-login'] ='Home/register';

$route['reg-action'] = 'Home/registeraction';
$route['otp-action'] = 'Home/register_otp_confirm';

$route['user-login-action'] = 'Login/log_action';
$route['forget-password-action'] = 'Login/forget_password';

$route['user-logout'] = 'Login/user_logout';
$route['change-password'] = 'Login/chagepass_action';


$route['user-profile'] = 'Home/user_profile';
$route['address-get'] = 'Home/addressget';
$route['address-add'] = 'Home/add_address';
$route['address-delete'] = 'Home/add_delete';
$route['profile-update-action'] = 'Home/profileupdateaction';

$route['listing'] = 'Home/listing';
$route['product-detail/(:any)'] = 'Home/product_detail/$1';
$route['cat-detail/(:any)'] = 'Home/cat_detail/$1';

$route['cart-page'] = 'Cart/index';
$route['add-to-cart'] = 'Cart/add_to_cart';
$route['remove-cart-product'] = 'Cart/remove_from_cart';
$route['add-to-cart-from-cart'] = 'Cart/add_to_cart_from_cart';

$route['checkout'] = 'Checkout/index';
$route['login2-action'] = 'Checkout/log2Action';
$route['reg2-action'] = 'Checkout/reg2action';
$route['otp2-action'] = 'Checkout/register_otp_confirm2';
$route['place-order-action'] = 'Checkout/placeorderAction';








//admin section
//Admin 
//***************************************
$route['login'] = 'admin/Login';
$route['login-action'] = 'admin/Login/laction';
$route['dashboard'] = 'admin/Dashboard';
$route['logout'] = 'admin/Login/admin_logout';
$route['changepassword'] = 'admin/Login/change_password';
$route['passwordaction'] = 'admin/Login/password_action';

//contact us
$route['contact'] = 'admin/Contact_controller/contact';
$route['contact_list']='admin/Contact_controller/contact_list';

//slider
$route['add-slider'] = 'admin/Slider_controller/add_slider';
$route['add-slider/(:num)'] = 'admin/Slider_controller/add_slider/$1';
$route['submit-slider']= 'admin/Slider_controller/addSlider';
$route['image']='admin/Slider_controller/image';
$route['slider_list']= 'admin/Slider_controller/slider_list';
$route['deleteslider']='admin/Slider_controller/slider_delete';


//about
$route['about_list']= 'admin/About_controller/about_list';
$route['add-about'] = 'admin/About_controller/add_about';
$route['add-about/(:num)'] = 'admin/About_controller/add_about/$1';//
$route['logo']='admin/About_controller/logo';
$route['addabout']= 'admin/About_controller/addabout';



//settings
$route['settings'] = 'admin/Settings/contact_info';
$route['contact_action'] = 'admin/Settings/contact_info_action';
$route['social-media'] = 'admin/Settings/socialmedia_info';
$route['social-media-action'] = 'admin/Settings/social_media_action';




//recent_work
$route['recent_work']= 'admin/Recent_controller/recent_work';
$route['add-recent_work'] = 'admin/Recent_controller/add_recent_work';
$route['add-recent_work/(:num)'] = 'admin/Recent_controller/add_recent_work/$1';//
$route['logorecent_work']='admin/Recent_controller/logorecent_work';
$route['addrecent_work']= 'admin/Recent_controller/addrecent_work';
$route['deleterecent_work']='admin/Recent_controller/deleterecent_work';


//services
$route['add-services'] = 'admin/Services_controller/add_services';
$route['add-services/(:num)'] = 'admin/Services_controller/add_services/$1';
$route['submit-services']= 'admin/Services_controller/addservices';
$route['imageservices']='admin/Services_controller/image';
$route['services_list']= 'admin/Services_controller/services_list';
$route['deleteservices']='admin/Services_controller/services_delete';
















