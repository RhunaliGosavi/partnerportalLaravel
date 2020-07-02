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
	Route::get('referFriendExport', 	   'ReferFriendController@export');

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

	// Loan Products CRUD
	Route::get('loanProduct', 			'LoanProductController@index');
	Route::get('loanProduct/create', 		'LoanProductController@create');
	Route::get('loanProduct/edit/{id}', 	'LoanProductController@edit');
	Route::get('loanProduct/delete/{id}',  'LoanProductController@destroy');
	Route::post('loanProduct/store', 		'LoanProductController@store');
	Route::post('loanProduct/update/{id}', 'LoanProductController@update');
	Route::get('loanProduct/all', 'LoanProductController@fetchAllLoanProducts');

	// Sales Kit Products CRUD
	Route::get('salesProduct', 			'SalesKitProductController@index');
	Route::get('salesProduct/create', 		'SalesKitProductController@create');
	Route::get('salesProduct/edit/{id}', 	'SalesKitProductController@edit');
	Route::get('salesProduct/delete/{id}',  'SalesKitProductController@destroy');
	Route::post('salesProduct/store', 		'SalesKitProductController@store');
	Route::post('salesProduct/update/{id}', 'SalesKitProductController@update');
	Route::get('salesProduct/all', 'SalesKitProductController@fetchAllSalesProducts');

	// Sales Kit Products
	// Document Checklist Category
	Route::get('docCheckCategory', 			'DocumentChecklistController@index');
	Route::get('docCheckCategory/create', 		'DocumentChecklistController@create');
	Route::get('docCheckCategory/edit/{id}', 	'DocumentChecklistController@edit');
	Route::get('docCheckCategory/delete/{id}',  'DocumentChecklistController@destroy');
	Route::post('docCheckCategory/store', 		'DocumentChecklistController@store');
	Route::post('docCheckCategory/update/{id}', 'DocumentChecklistController@update');
	Route::get('docCheckCategory/all', 'DocumentChecklistController@fetchAllCategories');

	// Document Checklist Category
	Route::get('docCheckProduct', 			'DocumentChecklistProductController@index');
	Route::get('docCheckProduct/create', 		'DocumentChecklistProductController@create');
	Route::get('docCheckProduct/edit/{id}', 	'DocumentChecklistProductController@edit');
	Route::get('docCheckProduct/delete/{id}',  'DocumentChecklistProductController@destroy');
	Route::post('docCheckProduct/store', 		'DocumentChecklistProductController@store');
	Route::post('docCheckProduct/update/{id}', 'DocumentChecklistProductController@update');
	Route::get('docCheckProduct/all', 'DocumentChecklistProductController@fetchAllProducts');

	Route::get('dsaList',		   'DsaController@index');
	Route::get('fetchDsaList',	   'DsaController@fetchDsaList');
	Route::get('dsa/create', 	   'DsaController@create');
	Route::post('dsa/store',       'DsaController@store');
	Route::get('dsa/edit/{id}',    'DsaController@edit');
	Route::post('dsa/update/{id}', 'DsaController@update');
	Route::get('dsa/delete/{id}',  'DsaController@delete');


	Route::get('corporateList',		    	'CorporatePptController@index');
	Route::get('fetchcorporatePptList',	    'CorporatePptController@fetchcorporatePptList');
	Route::get('corporatePpt/create', 	    'CorporatePptController@create');
	Route::post('corporatePpt/store',       'CorporatePptController@store');
	Route::get('corporatePpt/edit/{id}',    'CorporatePptController@edit');
	Route::post('corporatePpt/update/{id}', 'CorporatePptController@update');
	Route::get('corporatePpt/delete/{id}',  'CorporatePptController@delete');
});