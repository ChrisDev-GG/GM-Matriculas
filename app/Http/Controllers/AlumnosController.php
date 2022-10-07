<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    public function index(){
        return view('Registros.alumnos');
    }
}
