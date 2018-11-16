<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group(['middleware'=>['cors']],function(){

  Route::post('/contactos', 'ContactController@store');
  Route::post('/registrarse', 'UserController@store');
  Route::post('/comprobar', 'UserController@comprobar');

});

Route::group([
    'middleware' => ['cors','api'],
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    //tranferencias
    Route::get('/transfer','TransferController@index');
    //bancos
    Route::get('/bank','BankController@index');

    //serivicios
    Route::get('/service','ServiceController@index');

});

//rutas del administrador
Route::group([
  'middleware'=>['cors','admin']
], function(){

  //contactos
    Route::get('/contactos', 'ContactController@index');

  //usuarios
    Route::get('/usuarios', 'UserController@index');
    Route::get('/usuarios/{id}','UserController@show');
    Route::put('/usuarios/{id}','UserController@update');
    Route::delete('/usuarios/{id}','UserController@destroy');

  //bancos
    Route::post('bank','BankController@store');
    Route::get('/bank/{id}','BankController@show');
    Route::put('bank/{id}','BankController@update');
    Route::delete('bank/{id}','BankController@destroy');

  //servicios
    Route::get('/service/{id}','ServiceController@show');
    Route::post('/service','ServiceController@store');
    Route::put('/service/{id}','ServiceController@update');
    Route::delete('/service/{id}','ServiceController@destroy');
    Route::post('/comprobar-sevicio','ServiceController@comprobar');


});
