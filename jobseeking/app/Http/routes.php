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
Route::post('api/authenticate', 'TokenAuthController@authenticate'); // login
Route::post('api/logout', 'TokenAuthController@logout'); // logout
Route::get('api/get_login_user_id', 'TokenAuthController@get_login_user_id'); // get_login_user_id
Route::get('api/authenticate/user', 'TokenAuthController@getAuthenticatedUser'); // get user by token
Route::post('api/test', 'TokenAuthController@test');

// login page & register & edit user page
Route::get('register', 'TokenAuthController@register_page');
Route::get('login', 'TokenAuthController@login_page');
Route::get('edit_user', 'TokenAuthController@edit_user_page');
Route::post('update_user', 'TokenAuthController@update_user');

// contact us & about us
Route::get('contactus', 'TokenAuthController@contactus_page');
Route::get('aboutus', 'TokenAuthController@aboutus_page');

// post job & show job & find job
Route::get('postjob', 'JobController@postjob_page');
Route::post('api/postjob', 'JobController@postjob_api');
Route::get('editjob/{job}', 'JobController@editjob_page');
Route::post('api/updatejob/{job}', 'JobController@updatejob_api');
Route::get('showjob/{job}', 'JobController@showjob_page');
Route::get('findjob', 'JobController@findjob_page')->name('findjob');


// CRUD
Route::resource('user','UserController');
Route::resource('location','LocationController');
Route::resource('type','TypeController');
Route::resource('classification','ClassificationController');
Route::resource('job','JobController');
Route::resource('education','EducationController');
Route::resource('classification-skill','ClassificationSkillController');
Route::resource('job-skill-experience','JobSkillExperienceController');
Route::resource('user-skill-experience','UserSkillExperienceController');