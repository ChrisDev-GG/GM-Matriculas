<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrosController extends Controller
{
    #Strings that point to a specific view
    private $viewRegistros = 'Registros.registros';
    private $viewAlumnos = 'Registros.alumnos';
    private $viewApoderados = 'Registros.apoderados';

    /**
     * Description: 
     * Method with user restriction to get registros view, not logged users get redirected to login view.
     * Works with route: '/registros'
     * @return view 
     */
    public function index(){
        return $this->userAuthorize($this->viewRegistros);
    }
    /**
     * Description: 
     * Method with user restriction to get alumnos view, not logged users get redirected to login view.
     * Works with route: '/registros/alumnos'
     * @return view 
     */
    public function showAlumnos(){
        return $this->userAuthorize($this->viewAlumnos); 
    }
    /**
     * Description: 
     * Method with user restriction to get apoderados view, not logged users get redirected to login view.
     * Works with route: '/registros/apoderados'
     * @return view 
     */
    public function showApoderados(){
        return $this->userAuthorize($this->viewApoderados);
    }

}
