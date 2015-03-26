<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = 'user/index';
$route['404_override'] = '';

/*admin*/
$route['admin'] = 'user/index';
$route['admin/signup'] = 'user/signup';
$route['admin/create_member'] = 'user/create_member';
$route['admin/login'] = 'user/index';
$route['admin/logout'] = 'user/logout';
$route['admin/login/validate_credentials'] = 'user/validate_credentials';

$route['admin/post'] = 'admin_post/index';
$route['admin/post/add'] = 'admin_post/add';
$route['admin/post/update'] = 'admin_post/update';
$route['admin/post/update/(:any)'] = 'admin_post/update/$1';
$route['admin/post/delete/(:any)'] = 'admin_post/delete/$1';
//$route['admin/post/index/(:any)'] = 'admin_post/index/$1'; //$1 = page number
$route['admin/post/postview'] = 'admin_post/postview';
$route['admin/post/postview/(:any)'] = 'admin_post/postview/$1';
$route['admin/post/(:any)'] = 'admin_post/index/$1'; //$1 = page number

$route['admin/users'] = 'admin_users/index';
$route['admin/users/add'] = 'admin_users/add';
$route['admin/users/update'] = 'admin_users/update';
$route['admin/users/update/(:any)'] = 'admin_users/update/$1';
$route['admin/users/delete/(:any)'] = 'admin_users/delete/$1';
$route['admin/users/(:any)'] = 'admin_users/index/$1'; //$1 = page number

$route['admin/brands'] = 'admin_brands/index';
$route['admin/brands/add'] = 'admin_brands/add';
$route['admin/brands/update'] = 'admin_brands/update';
$route['admin/brands/update/(:any)'] = 'admin_brands/update/$1';
$route['admin/brands/delete/(:any)'] = 'admin_brands/delete/$1';
$route['admin/brands/(:any)'] = 'admin_brands/index/$1'; //$1 = page number

$route['admin/generics'] = 'admin_generics/index';
$route['admin/generics/add'] = 'admin_generics/add';
$route['admin/generics/update'] = 'admin_generics/update';
$route['admin/generics/update/(:any)'] = 'admin_generics/update/$1';
$route['admin/generics/delete/(:any)'] = 'admin_generics/delete/$1';
$route['admin/generics/(:any)'] = 'admin_generics/index/$1'; //$1 = page number

$route['admin/forms'] = 'admin_forms/index';
$route['admin/forms/add'] = 'admin_forms/add';
$route['admin/forms/update'] = 'admin_forms/update';
$route['admin/forms/update/(:any)'] = 'admin_forms/update/$1';
$route['admin/forms/delete/(:any)'] = 'admin_forms/delete/$1';
$route['admin/forms/(:any)'] = 'admin_forms/index/$1'; //$1 = page number
/* End of file routes.php */
/* Location: ./application/config/routes.php */