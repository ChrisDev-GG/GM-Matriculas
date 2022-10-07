<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatriculasController extends Controller
{
    public function index(){
        return view('Matriculas.matriculas');
    }
}
