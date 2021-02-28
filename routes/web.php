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

/*
Route::get('/antiguo',function(){
    echo "<a href='".route('inicioPropio')."'>Inicio Propio</a><br>";
    echo "<a href='".route('inicioLaravel')."'>Inicio Laravel</a><br>";
    //echo "<a href='".route('Saludo')."'>Saludo default</a><br>";
    //echo "<a href='".route('Saludo')."'>Saludo Banana</a><br>";

    echo "<a href='".route('Forma1')."'>Usando with</a><br>";
    echo "<a href='".route('Forma2')."'>Usando ['nombre'=>Dolar Nombre] dentro de la vista</a><br>";
    echo "<a href='".route('Forma3')."'>Usando compact</a><br>";
    echo "<a href='".route('Forma4')."'>Usando Route View</a><br>";

    echo "<a href='".route('Acerca')."'>Acerca</a><br>";
    echo "<a href='".route('Portafolio')."'>Portafolio</a><br>";
    echo "<a href='".route('Contactos')."'>Contactos</a><br>";
});

Route::get('inicioProp', function () {
    return view('home');
})->name('inicioPropio');

Route::get('inicioLar', function () {
    return view('welcome');
})->name('inicioLaravel');

Route::get('/Saludos/{nombre?}',function($nombre="Default"){
    return "Bienvenido $nombre";
})->name('Saludo'); //AVERIGUAR COMO NAME CON PARAMETROS

Route::get('1f',function(){
    $nombre = "en Forma 1";
    return view('saludo')->with(['nombre'=>$nombre]);
})->name('Forma1');

Route::get('2f',function(){
    $nombre = "en Forma 2";
    return view('saludo',['nombre'=>$nombre]);
})->name('Forma2');

Route::get('3f',function(){
    $nombre = "en Forma 3";
    return view('saludo',compact('nombre'));//hace lo mismo ['nombre'=>$nombre]
    //si tiene el mismo nombre de variable
})->name('Forma3');

Route::view('4f','saludo',['nombre'=>"Forma4"] );
Route::view('4f','saludo')->name('Forma4');//SIN INFORMACION

*/
Route::view('/','inicio')->name('Index');
Route::view('/acerca','acerca')->name('Acerca');
//Route::view('/portafolio','portafolio', compact('portafolio'))->name('Portafolio');

Route::get('/portafolio','PortafolioController@index')->name('Portafolio');


Route::view('/contactos','contactos')->name('Contactos');

//Route::resource('proyectos','PortafolioController')->only(['index','show']);
//Except es el inverso de only
//Route::resource('proyectos','PortafolioController');

Route::apiResource('proyectos','PortafolioController');

/*
Route::post();
Route::put();
Route::patch();
Route::delete();

        $portafolio=[
            ['titulo'=>"Proyecto 01"],
            ['titulo'=>"Proyecto 02"],
            ['titulo'=>"Proyecto 03"],
            ['titulo'=>"Proyecto 04"],
        ];

        return view('portafolio', compact('portafolio'));
*/
//Route::view('/home','inicio')->name('Home');
//Auth::routes(['register'=>false]);
Auth::routes();
/*

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

*/
//Route::get('/home', 'HomeController@index')->name('home');

