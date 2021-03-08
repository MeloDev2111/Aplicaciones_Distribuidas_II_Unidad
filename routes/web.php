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

Route::view('/','inicio')->name('Index');
Route::view('/acerca','acerca')->name('Acerca');

Route::resource('oficinas', 'OficinasController')->middleware(['auth']);

Route::resource('empleados', 'EmpleadosController');

Route::resource('expedientes', 'ExpedientesController');
Route::get('expedientes/crear/{empleado_id}', 'ExpedientesController@create');
Route::get('expedientes/{empleado_id}/{estado}', 'ExpedientesController@show');
Route::get('expedientes/atender/{empleado_id}/{expediente_id}', 'ExpedientesController@atender');
/*
Route::post();
Route::put();
Route::patch();
Route::delete();
*/

//Auth::routes(['register'=>false]);
Auth::routes();

