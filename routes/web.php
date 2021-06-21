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

Route::get('/time', function() {
	return date('h:i A');
});

Route::get('/frontendtestget', 'Login@frontendtestget');
Route::post('/frontendtestpost', 'Login@frontendtestpost');

Route::get('/clear-cache', function() {
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('config:cache');
	Artisan::call('view:clear');
	return "Cache is cleared";
});
Route::get('/passwordreset/{token}', 'PasswordReset@passwordResetView');
Route::post('/passwordreset', 'PasswordReset@passwordReset');

Route::get('/', 'Login@index');
Route::get('/login', 'Login@index');

Route::post('/loginCheck', 'Login@loginCheck');
Route::post('/sendemail', 'Login@sendEmail'); 


Route::group(['middleware' => 'admin'], function () {

	Route::get('/logout', 'Login@logout');
	Route::get('/welcome', 'HomeController@index');

	// Common controller
	Route::get('/districtlist', 'CommonController@getDistrictList');
	Route::get('/thanalist/{id}', 'CommonController@getThanaList');
	Route::get('/categorylist', 'CommonController@getCategoryList');
	Route::get('/grouplist', 'CommonController@getGroupList');
	Route::get('/referrallist', 'CommonController@getReferralList');

	
	// User
	Route::get('/user', 'User@index');
	Route::post('/changePass', 'User@changePass');
	Route::post('/addNewUser', 'User@addNewUser');
	Route::get('/userListDataTable', 'User@userListDataTable');
	Route::get('/getUserDepratment', 'User@getUserDepratment');
	Route::post('/userDelete', 'User@userDelete');
	





	
	//booking 
	Route::get('/booking', 'Booking@booking');
	

	//travelers
	Route::get('/travelers', 'Travelers@travelers');
	
    //touragency
	Route::get('/touragency', 'Touragency@touragency');
	
	
	//Dashboard
	Route::get('/dashboard','Dashboard@dashboardView');
	


	// tourpackages
	Route::get('/tourpackages','TourPackages@tourpackagesView');

	// createpackages
	Route::get('/createpackages','CreatePackages@createpackagesView');
	
	
	// hotels
	Route::get('/hotels','Hotels@Hotel');

	// restaurants
	Route::get('/restaurants','Restaurants@restaurant');
	
	

});


