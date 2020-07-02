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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

	Route::get('users', 			'UserController@index');
	Route::get('user/create', 		'UserController@create');
	Route::get('user/edit/{id}', 	'UserController@edit');
	Route::get('user/delete/{id}',  'UserController@delete');
	Route::post('user/store', 		'UserController@store');
	Route::post('user/update/{id}', 'UserController@update');

	Route::get('fetchAFLEmployees', 'UserController@fetchAFLEmployees');
	Route::get('updateEmployeeStatus/{id}','UserController@updateEmployeeStatus');

	Route::post('user/import','UserController@importEmployees');
	//employee dashboard list
	//Application list
	Route::get('employee-dashboard', 'EmployeeDashboardController@get_employee_application_list');
	Route::get('fetch-employee-application-data', 'EmployeeDashboardController@fetch_employee_app_data');
	Route::post('employee/import', 'EmployeeDashboardController@import');
	Route::get('employeeApp/delete/{id}',  'EmployeeDashboardController@delete');

	//Employee Helpdesk
	Route::get('employee-helpdesk','EmployeeHelpDeskController@index');
	Route::get('employee-helpdesk/create','EmployeeHelpDeskController@create');
	Route::post('employee-helpdesk/store','EmployeeHelpDeskController@store');
	Route::get('employee-helpdesk/edit/{id}','EmployeeHelpDeskController@edit');
	Route::get('employee-helpdesk/delete/{id}','EmployeeHelpDeskController@delete');
	Route::get('fetchHelpDeskData', 'EmployeeHelpDeskController@fetchHelpDeskData');
	Route::post('employee-helpdesk/update','EmployeeHelpDeskController@update');
	
	

	Route::get('referFriendRequests',      'ReferFriendController@index');
	Route::get('fetchReferFriendRequests', 'ReferFriendController@referFriendRequests');
	Route::get('referFriendexport', 	   'ReferFriendController@export');

	Route::get('applyNowRequests', 	'ApplyNowRequestController@index');
	Route::get('fetchHRLoans', 		'ApplyNowRequestController@fetchHRLoans');
	Route::get('fetchOtherLoans', 	'ApplyNowRequestController@fetchOtherLoans');

	Route::get('hrExport', 		'ApplyNowRequestController@HRexport');
	Route::get('otherExport', 	'ApplyNowRequestController@Otherexport');

	Route::get('links',		 		'LinkController@index');
	Route::get('fetchLinks', 		'LinkController@fetchLinks');
	Route::get('link/create', 		'LinkController@create');
	Route::get('link/edit/{id}', 	'LinkController@edit');
	Route::get('link/delete/{id}',  'LinkController@delete');
	Route::post('link/store', 		'LinkController@store');
	Route::post('link/update/{id}', 'LinkController@update');
});