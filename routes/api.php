<?php

use Illuminate\Http\Request;
use App\Developer;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware'=>'api'], function(){
	
	//Getting the all of the developers
	
	
	Route::get('developers', 'DeveloperController@get');
	Route::get('projects/{id}', 'ProjectController@get');
	Route::post('developers', 'DeveloperController@store');
	Route::delete('developers/{id}', 'DeveloperController@delete');
	
	
});