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

// Test
Route::get('/test', ['uses'=>'Admin\AdminController@test'])->name('test');
