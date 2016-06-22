<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     //return view('welcome');
//     return view('index');
// });

//Registration
Route::any('/register', ['uses'=>'Auth\AuthController@getRegister'])->name('registration_form');
Route::post('/register', ['uses'=>'Auth\AuthController@postRegister'])->name('do_register');


// Authentication
Route::get('/', ['uses'=>'Admin\AdminController@index'])->name('admin_index');
Route::get('/login', ['uses'=>'Auth\AuthController@getLogin'])->name('login_form');
Route::post('/login', ['uses'=>'Auth\AuthController@postLogin'])->name('do_login');
Route::any('/logout', ['uses'=>'Auth\AuthController@logout'])->name('do_logout');


// Users crud
Route::any('/admin/users', ['uses'=>'Admin\UserController@users'])->name('admin_user_listing');
// Route::get('/admin/user/edit/{uid}', ['uses'=>'Admin\UserController@edit_user'])->name('admin_edit_user');
// Route::post('/admin/user/edit/{uid}', ['uses'=>'Admin\UserController@do_edit_user'])->name('admin_do_edit_user');
// Route::get('/admin/user/add', ['uses'=>'Admin\UserController@add_user'])->name('admin_add_user');
// Route::post('/admin/user/add', ['uses'=>'Admin\UserController@do_add_user'])->name('admin_do_add_user');
// Route::get('/admin/user/delete/{uid}', ['uses'=>'Admin\UserController@delete_user'])->name('admin_delete_user');
// Route::post('/admin/user/delete/{uid}', ['uses'=>'Admin\UserController@do_delete_user'])->name('admin_do_delete_user');

// Contests crud
Route::any('/admin/contests', ['uses'=>'Admin\ContestController@get_all_contest'])->name('admin_contest_listing');
Route::any('/admin/contest/add', ['uses'=>'Admin\ContestController@add_contest'])->name('admin_add_contest');
Route::post('/admin/contest/add', ['uses'=>'Admin\ContestController@do_add_contest'])->name('admin_do_add_contest');
Route::any('/admin/contestants', ['uses'=>'Admin\ContestController@get_all_contestant'])->name('admin_contestant_listing');

// Test
Route::get('/test', ['uses'=>'Admin\AdminController@test'])->name('test');
