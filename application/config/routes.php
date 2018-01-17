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
| This is not exactly a route, but allows you to automatically rouet
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Welcome';

$route['admin'] 		= 'admin/admin/index';
$route['cb-login'] 		= 'users/login';
$route['auth-user'] 	= 'users/auth_user';
$route['register'] 		= 'users/registration';
$route['profiles'] 		= 'users/profiles';

$route['404_override'] 	= '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/v1/auth']         			= 'api/v1/Authenticate_api/auth';
$route['api/v1/settings']         		= 'api/v1/Setting_api/setting';
$route['api/v1/settings/(:num)']        = 'api/v1/Setting_api/setting/id/$1';
$route['api/v1/users']         			= 'api/v1/User_api/user';
$route['api/v1/users/(:num)']        	= 'api/v1/User_api/user/user_id/$1';
$route['api/v1/plans']         			= 'api/v1/Plans_api/plans';
$route['api/v1/plans/(:num)']        	= 'api/v1/Plans_api/plans/id/$1';
$route['api/v1/subscriptions']         	= 'api/v1/Subscriptions_api/subscriptions';
$route['api/v1/subscriptions/(:num)']   = 'api/v1/Subscriptions_api/subscriptions/id/$1';
