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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Migration
$route['update'] = 'Migrate';
// Home
$route['home'] = 'Home';
// Auth
$route['login'] = 'Auth';
$route['register'] = 'Auth/register';
$route['logout'] = 'Auth/logout';
// Profil User
$route['profil-user'] = 'Profiluser';
$route['update-foto'] = 'Profiluser/uploadPhoto';
$route['update-profil'] = 'Profiluser/updateProfil';
// Dashboard
$route['dashboard'] = 'Dashboard';
// Category
$route['category'] = 'Category';
$route['add-category'] = 'Category/add';
$route['edit-category/(:any)'] = 'Category/edit/$1';
$route['delete-category/(:any)'] = 'Category/delete/$1';
// Sub Category
$route['subcategory'] = 'Subcategory';
$route['add-subcategory'] = 'Subcategory/add';
$route['edit-subcategory/(:any)'] = 'Subcategory/edit/$1';
$route['delete-subcategory/(:any)'] = 'Subcategory/delete/$1';
// Course
$route['course'] = 'Course';
$route['add-course'] = 'Course/add';
$route['edit-course/(:any)'] = 'Course/edit/$1';
$route['delete-course/(:any)'] = 'Course/delete/$1';
// Section
$route['section/(:any)'] = 'Section/index/$1';
$route['add-section/(:any)'] = 'Section/add/$1';
$route['edit-section/(:any)'] = 'Section/edit/$1';
$route['delete-section/(:any)'] = 'Section/delete/$1';
// Lesson
$route['lesson/(:any)'] = 'Lesson/index/$1';
$route['add-lesson/(:any)'] = 'Lesson/add/$1';
$route['edit-lesson/(:any)'] = 'Lesson/edit/$1';
$route['delete-lesson/(:any)'] = 'Lesson/delete/$1';
// Course User
$route['all-course'] = 'Courseuser';
$route['my-course'] = 'Courseuser/my';
$route['detail-course/(:any)'] = 'Courseuser/detail/$1';
// Cart
$route['cart'] = 'Cart';
$route['add-cart/(:any)'] = 'Cart/add/$1';
$route['delete-cart/(:any)'] = 'Cart/delete/$1';
$route['checkout'] = 'Transaksi/checkout';
$route['success-checkout'] = 'Transaksi/success';
// Transaksi Admin
$route['transaksi'] = 'Transaksi';
$route['confirm/(:any)'] = 'Transaksi/confirm/$1';
