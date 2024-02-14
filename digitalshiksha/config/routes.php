<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

$route['default_controller'] = "guest";
$route['home'] = "guest/home";
$route['about-us'] = "guest/about_us";
$route['terms-and-condition'] = "guest/terms";
$route['disclaimer'] = "guest/disclaimer";
$route['privacy-policy'] = "guest/privacy";
$route['faq'] = "guest/view_faqs";

$route['user_control/(:num)'] = "user_control/index/$1";
$route['message_control/(:num)'] = "message_control/index/$1";

$route['mock-test'] = "exam_control/view_all_mocks";
$route['mock-test/(:num)'] = "exam_control/view_all_mocks/$1";
$route['mock-test-details/(:any)'] = "exam_control/view_exam_summery/$1";
$route['mock-test-details/instructions/(:any)'] = "exam_control/view_exam_instructions/$1";
$route['mock-test-details/start-exam/(:any)'] = "exam_control/start_exam/$1";

$route['study-material'] = "exam_control/view_all_syllabus";
$route['study-material/long-answer-details/(:num)'] = "syllabus_control/long_answer_details/$1";
$route['study-material/video-details/(:num)'] = "syllabus_control/video_details/$1";
$route['study-material/pdf-details/(:num)'] = "syllabus_control/pdf_details/$1";
$route['study-material/mcq/(:num)'] = "syllabus_control/mcq/$1";

$route['digital-shiksha-search-engine'] = "blog";
$route['digital-shiksha-search-engine/(:any)'] = "blog/post/$1";
$route['logout'] = "login_control/logout";
$route['login'] = "login_control";
$route['login_access'] = "login_control/login_access"; // new route
$route['register'] = "login_control/register";
$route['forgot-password'] = "login_control/password_recovery_form";
$route['forgot-password-submit'] = "login_control/forgot_password";

$route['category/(:num)'] = "exam_control/view_mocks_by_category/$1";
$route['mock_detail/(:num)'] = "admin_control/view_my_mock_detail/$1";
$route['mocks/(:any)'] = "admin_control/view_my_mocks/$1";
$route['create_mock'] = "admin_control/mock_form";
$route['create_category'] = "admin_control/category_form";
$route['category/all'] = "exam_control/view_all_mocks";
$route['dashboard/(:num)'] = "login_control/dashboard_control/$1";
$route['superadmin'] = 'login_control/superadmin_login';
$route['admin'] = 'login_control/admin_login';
$route['teacher'] = 'login_control/teacher_login';
$route['search/(:any)'] = 'syllabus_control/category_url/$1';
$route['search-details/(:any)'] = 'syllabus_control/sub_category_url/$1';
$route['search-more-details/(:any)'] = 'syllabus_control/sub_sub_category_url/$1';
$route['long-answer-details/(:any)'] = 'syllabus_control/long_answer_details/$1';
$route['pdf-details/(:any)'] = 'syllabus_control/pdf_details/$1';
$route['pdf-single-details/(:any)'] = 'syllabus_control/pdf_single_details/$1';
$route['video-details/(:any)'] = 'syllabus_control/video_details/$1';
$route['video-single-details/(:any)'] = 'syllabus_control/video_single_details/$1';
$route['mcq-details/(:any)'] = 'syllabus_control/mcq/$1';
$route['create_syllabus_questions'] = 'syllabus_control/create_syllabus_questions';
$route['view_syllabus_questions'] = 'syllabus_control/view_syllabus_questions';
$route['batches'] = "admin_control/view_all_batches";
// $route['faq'] = 'Faq';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
