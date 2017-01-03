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
  if (Auth::check()) {
    return view('app');
  } else {
    return view('auth/login');
  }
});

Route::auth();

Route::get('app', 'HomeController@index');
Route::get('api/user', 'HomeController@getCurrentUser')->middleware('auth');
Route::get('api/eggs', 'EggController@getEggs')->middleware('auth');
Route::post('api/eggs/create', 'EggController@createEgg')->middleware('auth');

# Vue
// Route::any('{all}', function () {
//   return view('app');
// })
// ->where(['all' => '.*']);
