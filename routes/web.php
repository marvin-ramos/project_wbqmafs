<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login-page', 'WbqmafsController@loginView')->name('view.login');
Route::post('/login', 'WbqmafsController@customlogin')->name('custom.login');

Route::group(['middleware' => 'CheckLoginMiddleware'], function(){
	
	Route::get('/admin/home', 'AdminController@dashboard')
	     ->name('admin.dashboard')
	     ->middleware('authentic');

	Route::get('/user/home', 'HomeController@dashboard')
	     ->name('user.dashboard');
});



Route::get('/logout', 'AdminController@logout');
Route::get('/logout', 'HomeController@logout');