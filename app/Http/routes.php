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

Route::get('/login', ['uses' => 'AuthController@login']);
Route::post('/login', ['uses' => 'AuthController@postLogin']);
Route::get('/logout', ['uses' => 'AuthController@logout']);

Route::group(['middleware' => ['auth']], function() {

	Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home.index']);
	
	Route::resource('/client', 'ClientController');
	Route::resource('/provider', 'ProviderController');
	Route::resource('/plan_category', 'PlanCategoryController');
	Route::resource('/plan', 'PlanController');
	Route::resource('/policy', 'PolicyController');
	Route::resource('/split', 'SplitController');
	Route::resource('/band', 'BandController');
	Route::resource('/consultant', 'ConsultantController');
	
});