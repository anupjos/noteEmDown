<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'LoginController@getLogin');
Route::get('/login', 'LoginController@getLogin')->name('login');
Route::post('/login', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@getLogout');

Route::get('/register', 'RegistrationController@getRegister');
Route::post('register', 'RegistrationController@postRegister');

Route::post('/password/reset', 'LoginController@postResetPassword');

//Authenticate the user before going to these routes
Route::group( ['middleware' => ['auth'] ], function()
{
	Route::get('/dashboard', 'HomeController@getDashboard');
	Route::get('/account/delete', 'HomeController@getAccountDelete');

	Route::get('/settings', 'HomeController@getSettings');
	Route::post('/settings', 'HomeController@postSettings');
	Route::get('/task/create', 'HomeController@getCreateTask');
	Route::post('/task/create', 'HomeController@postCreateTask');
	Route::get('/stage/create', 'HomeController@getCreateStage');
	Route::post('/stage/create', 'HomeController@postCreateStage');
	Route::post('/ajax/task/delete', 'HomeController@postDeleteTask');
	Route::post('/ajax/stage/change', 'HomeController@postChangeStage');

});