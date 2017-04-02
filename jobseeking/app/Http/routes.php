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

Route::get('/', 'TokenAuthController@home_page');

// APIs for login & register
Route::post('api/register', 'TokenAuthController@register');
Route::post('api/authenticate', 'TokenAuthController@authenticate');
Route::get('api/authenticate/user', 'TokenAuthController@getAuthenticatedUser');
Route::post('api/test', 'TokenAuthController@test');

// login page & register page
Route::get('register', 'TokenAuthController@register_page');
Route::get('login', 'TokenAuthController@login_page');


// post & show job
Route::get('postjob', 'JobController@postjob_page');
Route::post('api/postjob', 'JobController@postjob_api');
Route::get('showjob/{job}', 'JobController@showjob_page');



// CRUD
Route::resource('user','UserController');
Route::resource('location','LocationController');
Route::resource('type','TypeController');
Route::resource('classification','ClassificationController');
Route::resource('job','JobController');