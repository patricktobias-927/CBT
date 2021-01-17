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
$route['student_list'] = 'Pages/student_list';
$route['add_custom_assessment'] = 'Pages/add_custom_assessment';
$route['add_student'] = 'Pages/add_student';
$route['add_subject'] = 'Pages/add_subject';
$route['process_download'] = 'Download/process_download';
$route['bulk_upload_of_students'] = 'Pages/bulk_upload_of_students';
$route['school_and_section_list'] = 'Pages/school_and_section_list';
$route['delete_grade_level'] = 'Pages/delete_grade_level';
$route['delete_batch'] = 'Pages/delete_batch';
$route['delete_subject'] = 'Pages/delete_subject';
$route['delete_grade_level'] = 'Pages/delete_grade_level';
$route['delete_batch'] = 'Pages/delete_batch';
$route['delete_section_codes'] = 'Pages/delete_section_codes';
$route['add_grade_level'] = 'Pages/add_grade_level';
$route['add_section'] = 'Pages/add_section';
$route['add_batch'] = 'Pages/add_batch';
$route['add_section_codes'] = 'Pages/add_section_codes';
$route['addschedule'] = 'Pages/addschedule';
$route['login'] = 'Pages/login';
$route['logout'] = 'Pages/logout';
$route['delete'] = 'Pages/delete';
$route['add'] = 'Pages/add';
$route['edit/(:any)'] = 'Pages/edit/$1';
$route['delete/(:any)'] = 'Pages/delete/$1';
$route['default_controller'] = 'Pages/login';
$route['(:any)'] = 'Pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
