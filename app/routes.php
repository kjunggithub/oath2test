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

// oauth
Route::post('oauth/access_token', 'OAuthController@accessToken');

// dummy api
Route::resource('api/v1/users', 'UserController', array('except' => array('create', 'edit')));