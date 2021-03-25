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

Route::group(['middleware' => 'authentic'], function(){
	
	Route::get('home', 'AdminController@dashboard')
	     ->name('admin.dashboard');
});

Route::group(['middleware' => 'authentic'], function(){
	
    Route::get('home', 'HomeController@dashboard')
	     ->name('user.dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('home', 'AdminController@dashboard')
	     ->name('admin.dashboard');
	     
	//admin profile
	Route::get('profile', 'AdminController@profile')
		 ->name('admin.profile');

	//for Employee
	Route::get('employee/table', 'AdminController@employeeTable')
	     ->name('table.employee');
	Route::get('employee/add', 'AdminController@employeeAdd')
	     ->name('employee.add');
	Route::post('employee/store', 'AdminController@employeeStore')
	     ->name('employee.store');
	Route::get('employee/edit/{id}', 'AdminController@employeeEdit')
	     ->name('employee.edit');
	Route::post('employee/update/{id}', 'AdminController@employeeUpdate')
	     ->name('employee.edit');
	Route::get('employee/view/{id}', 'AdminController@employeeView')
		 ->name('employee.view');
	Route::get('employee/delete/{id}', 'AdminController@employeeDelete');

	//for account
	Route::get('account/table', 'AdminController@accountTable')
	     ->name('table.account');
	Route::get('account/add/{id}', 'AdminController@accountAdd')
	     ->name('account.add');
	Route::post('account/store', 'AdminController@accountStore');
	Route::get('account/edit/{id}', 'AdminController@accountEdit')
	     ->name('account.edit');
	Route::get('account/record', 'AdminController@accountRecord')
	     ->name('account.records');
	Route::get('account/record/edit/{id}', 'AdminController@accountRecordEdit');
	Route::post('account/record/update/{id}', 'AdminController@accountRecordUpdate');
	Route::get('account/record/view/{id}', 'AdminController@accountRecordView');

	//for history
	Route::get('history', 'AdminController@history')
	     ->name('history');

	//for parameters
	Route::get('parameter/water', 'AdminController@parameterWater')
	     ->name('parameter.water');
	Route::get('parameter/temperature', 'AdminController@parameterTemperature')
		 ->name('parameter.temperature');
	Route::get('parameter/ph', 'AdminController@parameterPh')
		 ->name('parameter.ph');
	Route::get('parameter/turbidity', 'AdminController@parameterTurbidity')
		 ->name('parameter.turbidity');

	//for logout user
	Route::get('/logout', 'AdminController@logout')
		 ->name('logout.user');

	//for user activities
	Route::get('user/activities', 'AdminController@userActivities')
		  ->name('user.activities');
});

Route::prefix('user')->group(function () {
    Route::get('home', 'HomeController@dashboard')
	     ->name('user.dashboard');
	Route::get('profile', 'HomeController@profile')
		 ->name('user.profile');
	Route::get('activities', 'HomeController@userActivities')
		  ->name('user.activities');
	Route::get('/logout', 'HomeController@logout');
});