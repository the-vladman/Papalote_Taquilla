<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::post('/visitante','TaquillaController@visitante');



///API PAPALOTE
///

Route::post('/api/nuevo','PapaloteController@registrar_visitante');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|


*/
Route::group(['middleware' => ['web']], function () {
    //
    //
    Route::get('/','TaquillaController@home');
Route::get('/registro','TaquillaController@registro');
Route::post('/registro','TaquillaController@registrar');
Route::get('/preregistro','TaquillaController@preregistro');
Route::get('/visitantes','TaquillaController@visitantes');



});
