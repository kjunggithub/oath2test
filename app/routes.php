<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// login user manually
// $user = User::find(1);
// Auth::login($user);

// api endpoint open to the public
Route::post('api/v1/register', 'HomeController@postRegister');

// oauth access token generation
Route::post('oauth/access_token', 'OAuthController@accessToken');

// api endpoints that requires the access token
Route::group(array('before' => 'oauth'), function() {
	Route::resource('api/v1/users', 'UserController', array(
		'except' => array('create', 'edit')
		)
	);

});

