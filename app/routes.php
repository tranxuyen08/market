<?php

use App\Controllers\AdminController;

$router->get('admin', 'AdminController@index');
$router->get('admin/home', 'AdminController@home');
$router->post('admin/login', 'AdminController@login');
$router->get('admin/logout', 'AdminController@logout');
$router->get('admin/user', 'AdminController@list_users');
$router->get('admin/user/detail', 'AdminController@detail');
$router->post('admin/user/update', 'AdminController@update');
$router->get('admin/user/delete', 'AdminController@delete');
$router->get('admin/user/insert', 'AdminController@insert');
$router->post('admin/user/insert_sql', 'AdminController@insert_sql');
////////
$router->get('', 'HomeController@index');

