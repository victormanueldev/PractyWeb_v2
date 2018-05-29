<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', function(){
//     return view('layouts.app');
// });
Route::get('load', function(){
    return view('loading');
});
Route::group(['prefix' => 'api'], function(){
    Route::resource('/cajas', 'CajaController');
    Route::resource('/facturas', 'FacturasController', [
        'except' => ['show']
    ]);
    Route::resource('lineas', 'LineasController' ,[
        'except' => ['show']
    ]);
});

Route::post('/api/facturas', 'FacturasController@show')->name('facturas.show');
Route::post('/api/lineas', 'LineasController@show')->name('lineas.show');
Route::get('/ventas/linea', function(){
    return redirect()->to('/ventas/linea');
});