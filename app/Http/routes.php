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



Route::post('/nuevo','PapaloteController@registrar');

Route::get('/v0/visitante/{id}','PapaloteController@visitante');


Route::post('/visitante','TaquillaController@visitante');



///API PAPALOTE
///


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
   // Route::get('/','TaquillaController@home');
Route::get('/registro','TaquillaController@registro');
Route::post('/registro','TaquillaController@registrar');
Route::get('/preregistro','TaquillaController@preregistro');
Route::get('/visitantes','TaquillaController@visitantes');
Route::get('/v0/fotos','PapaloteController@mostrar_fotos');



});
