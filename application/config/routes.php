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


//products
$route['products']= 'admin/Products_controller/products';
$route['add-products'] = 'admin/Products_controller/add_products';
$route['add-products/(:num)'] = 'admin/Products_controller/add_products/$1';
$route['products-action']= 'admin/Products_controller/products_action';
$route['delete-products']='admin/Products_controller/products_delete';
$route['products-image']='admin/Products_controller/image';

$route['set-attribute/(:num)']='admin/Products_controller/set_attribute/$1';
$route['attribute-action']='admin/Products_controller/attribute_action';

//products attributes
$route['attributes']= 'admin/Attributes_controller/attributes';
$route['add-attributes'] = 'admin/Attributes_controller/add_attributes';
$route['add-attributes/(:num)'] = 'admin/Attributes_controller/add_attributes/$1';
$route['attributes-action']= 'admin/Attributes_controller/attributes_action';
$route['delete-attributes']='admin/Attributes_controller/attributes_delete';

//product classification
$route['pr-classification']= 'admin/Product_classification/product_classification';
$route['add-classification'] = 'admin/Product_classification/add_classification';
$route['add-classification/(:num)'] = 'admin/Product_classification/add_classification/$1';
$route['classification-action']= 'admin/Product_classification/classification_action';
$route['delete-classification']='admin/Product_classification/classification_delete';


$route['product-classify'] = 'admin/Product_classification/Classifications';
$route['product-classify-load'] = 'admin/Product_classification/product_classify_list';
$route['set-classification'] = 'admin/Product_classification/setClassification';


//best sellers
$route['best-sellers']= 'admin/Best_sellers/best_sellers';
$route['add-best-sellers'] = 'admin/Best_sellers/add_best_sellers';
$route['add-best-sellers/(:num)'] = 'admin/Best_sellers/add_best_sellers/$1';
$route['best-sellers-action']= 'admin/Best_sellers/best_sellers_action';
$route['delete-best-sellers']='admin/Best_sellers/best_sellers_delete';
$route['best-sellers-image']='admin/Best_sellers/image';


//featured products
$route['featured-products']= 'admin/Featured_products/featured_products';
$route['add-featured-products'] = 'admin/Featured_products/add_featured_products';
$route['add-featured-products/(:num)'] = 'admin/Featured_products/add_featured_products/$1';
$route['featured-products-action']= 'admin/Featured_products/featured_products_action';
$route['delete-featured-products']='admin/Featured_products/featured_products_delete';
$route['featured-products-image']='admin/Featured_products/image';


//home page top products
$route['top-products']= 'admin/Top_products/top_products';
$route['add-top-products'] = 'admin/Top_products/add_top_products';
$route['add-top-products/(:num)'] = 'admin/Top_products/add_top_products/$1';
$route['top-products-action']= 'admin/Top_products/top_products_action';
$route['delete-top-products']='admin/Top_products/top_products_delete';
$route['top-products-image']='admin/Top_products/image';




$route['category']= 'admin/Category_controller/category';
$route['add-category'] = 'admin/Category_controller/add_category';
$route['add-category/(:num)'] = 'admin/Category_controller/add_category/$1';
$route['category-action']= 'admin/Category_controller/category_action';
$route['delete-category']='admin/Category_controller/category_delete';

//register
$route['register']= 'admin/Register_controller/register';
$route['delete-register']='admin/Register_controller/register_delete';
$route['view-register']='admin/Register_controller/view_register';

$route['social-media'] = 'admin/Main_contact_controller/socialmedia_info';
$route['social-media-action'] = 'admin/Main_contact_controller/social_media_action';


//main contact
$route['main_contact'] = 'admin/Main_contact_controller/main_contact';
$route['add-main/(:num)'] = 'admin/Main_contact_controller/add_main/$1';
$route['mainaction']='admin/Main_contact_controller/main_action';
$route['view-main']='admin/Main_contact_controller/view_main';

//slider
$route['slider']= 'admin/Slider_controller/slider';
$route['add-slider'] = 'admin/Slider_controller/add_slider';
$route['add-slider/(:num)'] = 'admin/Slider_controller/add_slider/$1';
$route['slider-action']= 'admin/Slider_controller/slider_action';
$route['delete-slider']='admin/Slider_controller/slider_delete';
$route['slider-image']='admin/Slider_controller/image';



//contact us
$route['contact'] = 'admin/Contact_controller/contact';
$route['contact_list']='admin/Contact_controller/contact_list';

//slider
// $route['add-slider'] = 'admin/Slider_controller/add_slider';
// $route['add-slider/(:num)'] = 'admin/Slider_controller/add_slider/$1';
// $route['submit-slider']= 'admin/Slider_controller/addSlider';
// $route['image']='admin/Slider_controller/image';
// $route['slider_list']= 'admin/Slider_controller/slider_list';
// $route['deleteslider']='admin/Slider_controller/slider_delete';


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

$route['Terms-of-use'] = 'home/Terms_of_use';
$route['Privacy-policy'] = 'home/Privacy_policy';

$route['newsletter-action'] ='Home/news_act';














