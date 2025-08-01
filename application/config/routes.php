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
$route['default_controller'] = 'home';
$route['user-login'] = 'login';
$route['user-registration'] = 'registration';
$route['product-view/(:any)'] = 'product/product_details/$1';
$route['seller-registration'] = 'seller';
$route['cart'] = 'cart';
$route['shop'] = 'shop';
$route['checkout'] = 'checkout';
$route['place-order'] = 'checkout/place-order';
$route['orders'] = 'order';
$route['order-details/(:any)'] = 'order/orderDetails/$1';
$route['profile'] = 'profile';
$route['profile-edit'] = 'profile/profile-edit';


// admin
$route['admin'] = 'admin/login';
$route['admin-logout'] = 'admin/login/logout';
$route['dashboard'] = 'admin/dashboard';
$route['users'] = 'admin/users';
$route['user-details/(:any)'] = 'admin/users/user_details/$1';
$route['sellers'] = 'admin/sellers';
$route['admin-seller-add'] = 'admin/sellers/add';
$route['seller-details/(:any)'] = 'admin/sellers/seller_details/$1';
$route['menu'] = 'admin/menu';
$route['admin-menu-add'] = 'admin/menu/add';
$route['admin-menu-edit/(:any)'] = 'admin/menu/edit/$1';


//seller
$route['404_override'] = '';
$route['seller-login'] = 'sellers/login';
$route['seller-logout'] = 'sellers/login/logout';
$route['seller-dashboard'] = 'sellers/dashboard';
$route['seller-profile'] = 'sellers/profile';
$route['seller-product'] = 'sellers/product';
$route['seller-product-add'] = 'sellers/product/add';
$route['product-details/(:any)'] = 'sellers/product/product_details/$1';
$route['product-delete/(:any)'] = 'sellers/product/product_delete/$1';
$route['seller-order'] = 'sellers/order';
$route['seller-order-details/(:any)'] = 'sellers/order/orderDetails/$1';



$route['translate_uri_dashes'] = TRUE;
