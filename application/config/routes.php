<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
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

$route['search-in-menu'] = 'Home/searchinmenu';
















