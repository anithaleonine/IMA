<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admin','DemoController@Createpage')->name('admin');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::post('/save_user', 'DemoController@save_user')->name('save_user');


Route::get('web-register', 'DemoController@webRegister');
Route::post('web-register', 'DemoController@webRegisterPost')->name('web-register');


// ponarasu start //

 Route::get('/createpage','DemoController@Createpage')->name('home');

// email test //

Route::get('/reset','DemoController@test')->name('email');

//Change Password //

Route::get('/confirmpassword','ChangePasswordController@Confirmpassword')->name('confirmpassword');

