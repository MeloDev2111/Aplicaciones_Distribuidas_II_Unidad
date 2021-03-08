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

Route::resource('empleados', 'EmpleadosController')->middleware(['auth']);

Route::resource('expedientes', 'ExpedientesController')->middleware(['auth']);
Route::get('expedientes/crear/{empleado_id}', 'ExpedientesController@create')->middleware(['auth']);
Route::get('expedientes/{empleado_id}/{estado}', 'ExpedientesController@show')->middleware(['auth']);
Route::get('expedientes/atender/{empleado_id}/{expediente_id}', 'ExpedientesController@atender')->middleware(['auth']);
/*
Route::post();
Route::put();
Route::patch();
Route::delete();
*/

//Auth::routes(['register'=>false]);
Auth::routes();

