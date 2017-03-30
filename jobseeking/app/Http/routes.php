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

Route::get('/', function () {
    return view('home');
});

// APIs for login & register
Route::post('api/register', 'TokenAuthController@register');
Route::post('api/authenticate', 'TokenAuthController@authenticate');
Route::get('api/authenticate/user', 'TokenAuthController@getAuthenticatedUser');
Route::post('api/test', 'TokenAuthController@test');

// login & register
Route::get('register', function () { return view('login.register'); });
Route::get('login', function () { return view('login.login'); });


// post job
Route::get('postjob', 'JobController@postjob_page');
Route::post('api/postjob', 'JobController@postjob_api');


// CRUD
Route::resource('user','UserController');
Route::resource('location','LocationController');
Route::resource('type','TypeController');
Route::resource('classification','ClassificationController');
Route::resource('job','JobController');