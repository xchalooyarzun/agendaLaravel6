<?php
//archivo donde se crean las rutas de las vistas

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Nombre de la nueva ruta que es llamada del controlador
Route::resource('agenda', 'agendaController');

//Creación de la ruta cancelar
Route::get('/cancelar', function () {
    return redirect()->route('agenda.index')->with('cancelar', 'Acción Cancelada!');
})->name('cancelar');

//Creación de la ruta confirmar eliminar
Route::get('/agenda/{id}/confirm', 'agendaController@confirm')->name('agenda.confirm');
