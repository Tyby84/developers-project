<?php
use App\Developer;

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

Route::get('developers', function(){
		return Developer::orderBy('name', 'asc')->get();
	});

Route::get('developer/{id}', function($id){
		$developer = Developer::findOrFail($id);
		return view('/developer')->with('developer', $developer);
	});
