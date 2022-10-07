<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\ApoderadosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatriculasController;
use App\Http\Controllers\RegistrosController;
use App\Http\Controllers\UsuariosController;
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

Route::get('/',[HomeController::class,'index']);

Route::get('/matriculas', [MatriculasController::class,'index']);

Route::get('/registros', [RegistrosController::class,'index']);

Route::get('/usuarios', [UsuariosController::class, 'index']);

Route::get('/registros/apoderados', [ApoderadosController::class, 'index']);
Route::get('/registros/alumnos', [AlumnosController::class, 'index']);

