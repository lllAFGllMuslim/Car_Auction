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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/about/edit'] = 'PageController/about_edit';
$route['admin/about/uploadImage'] = 'PageController/uploadImage'; // Add this route
$route['admin/about/update'] = 'PageController/update_about'; // Add this route

$route['admin/privacy_policy/edit'] = 'PageController/privacy_policy_edit';
$route['admin/privacy_policy/update'] = 'PageController/update_privacy_policy'; // Add this route

$route['admin/terms_and_conditions/edit'] = 'PageController/terms_and_conditions_edit';
$route['admin/terms_and_conditions/update'] = 'PageController/update_terms_and_conditions'; // Add this route


$route['admin/header_footer/edit'] = 'PageController/header_footer_edit';
$route['admin/header_footer/update'] = 'PageController/update_header_footer';

$route['admin/home/edit'] = 'PageController/home_edit';
$route['admin/home/update'] = 'PageController/update_home';

$route['admin/contact/edit'] = 'PageController/contact_edit';
$route['admin/contact/update'] = 'PageController/update_contact';
$route['contact/send'] = 'PageController/send_contact_email';

$route['admin/faq/edit'] = 'PageController/faq_edit';
$route['admin/faq/update'] = 'PageController/update_faq';


$route['admin/reviews/add'] = 'PageController/reviews_add';
$route['admin/reviews/delete'] = 'PageController/delete_reviews';
$route['admin/reviews/update'] = 'PageController/reviews_update';

$route['admin/faqs/add'] = 'PageController/faqs_add';
$route['admin/faqs/update'] = 'PageController/faqs_update';
$route['admin/faqs/delete'] = 'PageController/delete_faqs';


$route['admin/market_price'] = 'PageController/market_price';
$route['admin/market_price/(:num)'] = 'PageController/market_price/$1';
$route['admin/market_price/added'] = 'PageController/market_price_added';




$route['admin/blog/categories'] = 'AdminBlogsController';
$route['admin/blog/get_categories'] = 'AdminBlogsController/get_categories';
$route['admin/blog/add_category'] = 'AdminBlogsController/add_category';
$route['admin/blog/update_category'] = 'AdminBlogsController/update_category';
$route['admin/blog/delete_category'] = 'AdminBlogsController/delete_category';


$route['admin/blog/add'] = 'AdminBlogsController/blog_add';
$route['admin/blog/added'] = 'AdminBlogsController/blog_added';

$route['admin/blog/edit/(:num)'] = 'AdminBlogsController/blog_edit/$1';
$route['admin/blog/update'] = 'AdminBlogsController/update_blog';

$route['admin/blogs'] = 'AdminBlogsController/blog_list';
$route['admin/blogs/(:num)'] = 'AdminBlogsController/blog_list/$1';

$route['admin/blog/delete'] = 'AdminBlogsController/delete_blog';

$route['admin/blog/page_update'] = 'AdminBlogsController/update_blog_page';

$route['admin/car/categories'] = 'AdminBlogsController/car_categorys';

$route['admin/car/brand_add'] = 'AdminBlogsController/brand_add';
$route['admin/car/get_brand_categories'] = 'AdminBlogsController/get_brand_categories';
$route['admin/car/update_brand_category'] = 'AdminBlogsController/update_brand_category';
$route['admin/car/delete_brand_category'] = 'AdminBlogsController/delete_brand_category';

$route['admin/car/want_to_delete_car'] = 'AdminBlogsController/want_to_delete_car';
$route['admin/car/admin_aution_cars'] = 'AdminBlogsController/admin_aution_cars';
$route['admin/car/admin_aution_completed'] = 'AdminBlogsController/admin_aution_completed';



$route['getdealermessage'] = 'AdminBlogsController/get_dealer_message_by_brand_id';

$route['admin/car/delete'] = 'AdminBlogsController/admin_car_delete';

$route['admin/user/list'] = 'AdminBlogsController/admin_user_list';
$route['admin/dealer/list'] = 'AdminBlogsController/admin_dealer_list';
$route['admin/user/delete'] = 'AdminBlogsController/admin_user_delete';

$route['admin/user/list/(:num)'] = 'AdminBlogsController/admin_user_list/$1';
$route['admin/dealer/list/(:num)'] = 'AdminBlogsController/admin_dealer_list/$1';

$route['admin/car/sellyourcarlist'] = 'AdminBlogsController/sellyourcar_list';
$route['admin/car/sellyourcarlist_sold'] = 'AdminBlogsController/sellyourcar_list_sold';
$route['admin/car/sellyourcarlist_vendor'] = 'AdminBlogsController/sellyourcar_list_vendor';
$route['admin/car/sellyourcarlist_profile'] = 'AdminBlogsController/sellyourcar_list_profile';
$route['admin/car/sellyourcar_profileupdate'] = 'AdminBlogsController/sellyourcar_profileupdate';
$route['admin/car/delete_sellyourcar'] = 'AdminBlogsController/delete_sellyourcar'; // ADD THIS LINE

$route['admin/car/fuel_add'] = 'AdminBlogsController/fuel_add';
$route['admin/car/get_fuel_categories'] = 'AdminBlogsController/get_fuel_categories';
$route['admin/car/update_fuel_category'] = 'AdminBlogsController/update_fuel_category';
$route['admin/car/delete_fuel_category'] = 'AdminBlogsController/delete_fuel_category';


$route['admin/car/model_year_add'] = 'AdminBlogsController/model_year_add';
$route['admin/car/get_model_year_categories'] = 'AdminBlogsController/get_model_year_categories';
$route['admin/car/update_model_year_category'] = 'AdminBlogsController/update_model_year_category';
$route['admin/car/delete_model_year_category'] = 'AdminBlogsController/delete_model_year_category';


$route['admin/car/buy_method_add'] = 'AdminBlogsController/buy_method_add';
$route['admin/car/get_buy_method_categories'] = 'AdminBlogsController/get_buy_method_categories';
$route['admin/car/update_buy_method_category'] = 'AdminBlogsController/update_buy_method_category';
$route['admin/car/delete_buy_method_category'] = 'AdminBlogsController/delete_buy_method_category';


$route['admin/car/body_add'] = 'AdminBlogsController/body_add';
$route['admin/car/get_body_categories'] = 'AdminBlogsController/get_body_categories';
$route['admin/car/update_body_category'] = 'AdminBlogsController/update_body_category';
$route['admin/car/delete_body_category'] = 'AdminBlogsController/delete_body_category';


$route['admin/car/engine_add'] = 'AdminBlogsController/engine_add';
$route['admin/car/get_engine_categories'] = 'AdminBlogsController/get_engine_categories';
$route['admin/car/update_engine_category'] = 'AdminBlogsController/update_engine_category';
$route['admin/car/delete_engine_category'] = 'AdminBlogsController/delete_engine_category';


$route['admin/car/equipment_add'] = 'AdminBlogsController/equipment_add';
$route['admin/car/get_equipment_categories'] = 'AdminBlogsController/get_equipment_categories';
$route['admin/car/update_equipment_category'] = 'AdminBlogsController/update_equipment_category';
$route['admin/car/delete_equipment_category'] = 'AdminBlogsController/delete_equipment_category';

$route['admin/car/model_add'] = 'AdminBlogsController/model_add';
$route['admin/car/get_model_categories'] = 'AdminBlogsController/get_model_categories';
$route['admin/car/update_model_category'] = 'AdminBlogsController/update_model_category';
$route['admin/car/delete_model_category'] = 'AdminBlogsController/delete_model_category';



$route['admin/login'] = 'Auth/admin_login';
$route['admin/loginprocess'] = 'Auth/admin_login_process';
$route['admin/logout'] = 'Auth/logout';

$route['admin/profile'] = 'Auth/profile';
$route['admin/profileprocess'] = 'Auth/profile_update';

$route['forget'] = 'Auth/forgot_password_process';
$route['reset_password'] = 'Auth/reset_password';

$route['reset_password_process'] = 'Auth/reset_password_process';

$route['admin/forgetpassword'] = 'Auth/forgetpassword';

$route['account_activation'] = 'Auth/account_activation';


/** Pages **/
$route['about-us'] = 'Welcome/aboutus';
$route['contact-us'] = 'Welcome/contactus';
$route['faq'] = 'Welcome/faq';

$route['privacy-policy'] = 'Welcome/privacy_policy';
$route['terms-and-conditions'] = 'Welcome/terms_and_conditions';


$route['blogs'] = 'Welcome/blogs';
$route['blogs/(:num)'] = 'Welcome/blogs/$1';
$route['blog/(:any)'] = 'Welcome/blog_view/$1';

$route['category/(:any)'] = 'Welcome/blog_by_category_slug/$1';
$route['category/(:any)/(:num)'] = 'Welcome/blog_by_category_slug/$1/$2';


$route['signup'] = 'Auth/signup';
$route['login'] = 'Auth/loginprocess';
$route['profile'] = 'Auth/us_de_profile';


$route['post-car'] = 'Auth/post_car';
$route['car-added'] = 'Auth/car_added';
$route['car-list'] = 'Auth/car_list';
$route['car-list/(:num)'] = 'Auth/car_list/$1';
$route['car/edit/(:num)'] = 'Auth/car_edit/$1';
$route['car/update'] = 'Auth/update_car';

$route['car/delete'] = 'Auth/car_delete';

$route['auctionover'] = 'Auth/auction_over';

$route['sellyourcar'] = 'Auth/sellyourcar';

$route['cars'] = 'Auth/cars';
$route['cars/(:num)'] = 'Auth/cars/$1';
$route['car/(:any)'] = 'Auth/car_view/$1';



$route['car/bid/added'] = 'Auth/bid_added';

$route['car/bid/get'] = 'Auth/get_bid';
$route['car/bid/gets'] = 'Auth/get_bid_with_name';

$route['car/bid/count'] = 'Auth/get_total_bid_count';
$route['car/bid/reservation'] = 'Auth/check_reservation';
$route['car/bid/highestbid'] = 'Auth/get_highest_bid';

$route['car/bid/emi'] = 'Auth/get_emi_price';


$route['car/bid/winner'] = 'Auth/winner';
$route['car/bid/mybid'] = 'Auth/my_bidding';
$route['car/bid/dealercars'] = 'Auth/dealercars';



$route['logout'] = 'Auth/user_logout';
$route['getmodelbybrands'] = 'Auth/get_model_categories_by_brands';
$route['getmodelbybrandsslug'] = 'Auth/get_model_categories_by_brands_slug';


$route['favourite'] = 'Auth/favourite';
$route['favourite-add'] = 'Auth/favourite_add';



// routes.php

$route['search'] = 'search/index'; // Maps 'search' URL to Search controller's index method
$route['search/(:num)'] = 'search/index/$1'; 

$route['auctions'] = 'search/get_auction_cars';

$route['contactprocess'] = 'Auth/contactprocess';









