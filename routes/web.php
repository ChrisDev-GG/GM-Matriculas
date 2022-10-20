<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MatriculasController;
use App\Http\Controllers\RegistrosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\UsuariosDataController;
use Illuminate\Support\Facades\App;
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

Route::get('/',[HomeController::class,'start']);
Route::get('/home',[HomeController::class,'index']);

Route::get('/matriculas', [MatriculasController::class,'index']);

Route::get('/registros', [RegistrosController::class,'index']);

Route::get('/usuarios', [UsuariosController::class, 'index']);
Route::get('/usuarios/registro', [UsuariosController::class, 'confirmation']);

Route::resource('/usuariosdata', UsuariosDataController::class);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('/registros/apoderados', [RegistrosController::class, 'showApoderados']);
Route::get('/registros/alumnos', [RegistrosController::class, 'showAlumnos']);
/*

Route::post('/usuarios/registrar_usuarios', [UsuariosController::class, 'register']);
Route::get('/usuarios/registro', [UsuariosController::class, 'confirmation']);
*/


Route::get('/matriculas/matriculaspdf', function () {
    $pdf = PDF::loadView('Matriculas.matriculaspdf');
    return $pdf->download('pruebapdf.pdf');
});
Route::get('/matriculas/matriculaspdfweb', function () {
    $pdf = PDF::loadView('Matriculas.matriculaspdf');
    return $pdf->stream('pruebapdf.pdf');
});


