<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApoderadosController extends Controller
{
    public function index(){
        return view('Registros.apoderados');
    }
}
