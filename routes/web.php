<?php

use App\Http\Controllers\AlumnosDataController;
use App\Http\Controllers\ApoderadosDataController;
use App\Http\Controllers\ApoderadosSuplentesDataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MatriculasController;
use App\Http\Controllers\RegistrosController;
use App\Http\Controllers\SearchByRutController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\UsuariosDataController;
use App\Http\Controllers\YearAlumnosController;
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
Route::get('/usuarios/update_success', [UsuariosController::class, 'updateConfirmation']);

Route::resource('/usuariosdata', UsuariosDataController::class);
Route::post('/usuariosdata/{id}/activate', [UsuariosDataController::class, 'activateUsuario']);
Route::post('/usuariosdata/{id}/deactivate', [UsuariosDataController::class, 'deactivateUsuario']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'logout']);

//Route::get('/registros/apoderados', [RegistrosController::class, 'showApoderados']);
//Route::get('/registros/alumnos', [RegistrosController::class, 'showAlumnos']);

Route::resource('/registros/alumnos', AlumnosDataController::class);
Route::post('/registros/alumnos/{id}/activate', [AlumnosDataController::class, 'activateAlumno']);
Route::post('/registros/alumnos/{id}/deactivate', [AlumnosDataController::class, 'deactivateAlumno']);

Route::resource('/registros/apoderados', ApoderadosDataController::class);
Route::post('/registros/apoderados/{id}/activate', [ApoderadosDataController::class, 'activateApoderado']);
Route::post('/registros/apoderados/{id}/deactivate', [ApoderadosDataController::class, 'deactivateApoderado']);

Route::resource('/registros/suplentes', ApoderadosSuplentesDataController::class);
Route::post('/registros/suplentes/{id}/activate', [ApoderadosSuplentesDataController::class, 'activateSuplente']);
Route::post('/registros/suplentes/{id}/deactivate', [ApoderadosSuplentesDataController::class, 'deactivateSuplente']);

Route::post('/registros/apoderados/search', [SearchByRutController::class, 'searchByRutApoderado']);
Route::post('/registros/alumnos/search', [SearchByRutController::class, 'searchByRutAlumno']);
Route::post('/registros/suplentes/search', [SearchByRutController::class, 'searchByRutSuplente']);

Route::get('/registros/alumno_success', [RegistrosController::class, 'alumnoConfirmation']);
Route::get('/registros/apoderado_success', [RegistrosController::class, 'apoderadoConfirmation']);
Route::get('/registros/alumno_updated', [RegistrosController::class, 'alumnoUpdateConfirmation']);
Route::get('/registros/apoderado_updated', [RegistrosController::class, 'apoderadoUpdateConfirmation']);
Route::get('/registros/suplente_updated', [RegistrosController::class, 'suplenteUpdateConfirmation']);
Route::get('/registros/suplente_success', [RegistrosController::class, 'suplenteConfirmation']);

Route::get('/registros/advance', [YearAlumnosController::class, 'advance_year']);
Route::get('/registros/setback', [YearAlumnosController::class, 'setback_year']);

/*
Route::get('/matriculas/matriculaspdfweb', function () {
    $pdf = PDF::loadView('Matriculas.matriculaspdf');
    return $pdf->stream('pruebapdf.pdf');
});
Route::post('/usuarios/registrar_usuarios', [UsuariosController::class, 'register']);
Route::get('/usuarios/registro', [UsuariosController::class, 'confirmation']);
*/


Route::get('/matriculas/matriculaspdf', function () {
    $pdf = PDF::loadView('Matriculas.matriculaspdf');
    return $pdf->download('pruebapdf.pdf');
});

Route::get('/matriculas/matriculaspdfweb', [MatriculasController::class, 'pdf']);
Route::get('/matriculas/matriculaspdfwebsuplente', [MatriculasController::class, 'pdfSuplente']);


