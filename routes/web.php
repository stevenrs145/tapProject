<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\DeptoController;
use App\Http\Controllers\ApiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Route::get('/validacion-proveedores',[App\Http\Controllers\LogicController::class, 'listInactivesProviders']);

Route::resource('pais', PaisController::class);
Route::resource('persona', PersonaController::class);
Route::resource('depto', DeptoController::class);
//Route::resource('/nombre-ruta', 'ApiController');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/lista-paises',[App\Http\Controllers\ApiController::class, 'listaPaises']);
Route::post('/api/crear-paises',[App\Http\Controllers\ApiController::class, 'crearPaises']);
Route::post('/api/ver-paises',[App\Http\Controllers\ApiController::class, 'verPaises']);
Route::post('/api/actualizar-paises',[App\Http\Controllers\ApiController::class, 'actualizarPaises']);
Route::post('/api/eliminar-paises',[App\Http\Controllers\ApiController::class, 'eliminarPaises']);






