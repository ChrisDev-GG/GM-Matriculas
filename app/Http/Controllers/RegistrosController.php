<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrosController extends Controller
{
    public function index(){
        return view('Registros.registros');
    }
}