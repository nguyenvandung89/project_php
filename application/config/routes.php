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
| in the URL cannot be matched to a valid route
.|
*/

$route['default_controller'] = "welcome";
$route['users/add_user'] = "users/add_user";
$route['users/edit_user/(:num)'] = "users/edit_user/$1";
$route['users/del_user/(:num)'] = "users/del_user/$1";
$route['users/(:num)'] = "users/show/$1";
$route['users/(:any)'] = "users/index/$1";
$route['login'] = "login";
$route['authen'] = "login/authen";
$route['logout'] = "login/logout";
$route['migrate'] = "migrate/index";
$route['articles/(:num)'] = "articles/show/$1";
$route['articles/create'] = "articles/create";
$route['articles/edit/(:num)'] = "articles/edit/$1";
$route['articles/del_article/(:num)'] = "articles/del_article/$1";
$route['articles/get_category'] = "articles/get_category";
$route['articles/(:any)'] = "articles/index/$1";
$route['rankings/index'] = "rankings/index";
$route['articles/upload'] = "rankings/upload";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */