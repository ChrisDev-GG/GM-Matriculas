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
    private $viewAlumnosSuccess = 'Registros.registro-alumno-success';
    private $viewApoderadosSuccess = 'Registros.registro-apoderado-success';
    private $viewAlumnosUpdate = 'Registros.update-alumno-success';
    private $viewApoderadosUpdate = 'Registros.update-apoderado-success';
    private $viewSuplentesSuccess = 'Registros.registro-suplente-success';
    private $viewSuplentesUpdate = 'Registros.update-suplente-success';

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
    /**
     * Description: 
     * Method with user restriction to get apoderados view, not logged users get redirected to login view.
     * Works with route: '/registros/apoderados'
     * @return view 
     */
    public function alumnoConfirmation(){
        return $this->userAuthorize($this->viewAlumnosSuccess);
    }
    /**
     * Description: 
     * Method with user restriction to get apoderados view, not logged users get redirected to login view.
     * Works with route: '/registros/apoderado-success'
     * @return view 
     */
    public function apoderadoConfirmation(){
        return $this->userAuthorize($this->viewApoderadosSuccess);
    }
    /**
     * Description: 
     * Method with user restriction to get apoderados view, not logged users get redirected to login view.
     * Works with route: '/registros/apoderado-success'
     * @return view 
     */
    public function apoderadoUpdateConfirmation(){
        return $this->userAuthorize($this->viewApoderadosUpdate);
    }
    /**
     * Description: 
     * Method with user restriction to get apoderados view, not logged users get redirected to login view.
     * Works with route: '/registros/apoderado-success'
     * @return view 
     */
    public function alumnoUpdateConfirmation(){
        return $this->userAuthorize($this->viewAlumnosUpdate);
    }
    /**
     * Description: 
     * Method with user restriction to get apoderados view, not logged users get redirected to login view.
     * Works with route: '/registros/suplente-success'
     * @return view 
     */
    public function suplenteConfirmation(){
        return $this->userAuthorize($this->viewSuplentesSuccess);
    }
    /**
     * Description: 
     * Method with user restriction to get apoderados view, not logged users get redirected to login view.
     * Works with route: '/registros/apoderado-success'
     * @return view 
     */
    public function suplenteUpdateConfirmation(){
        return $this->userAuthorize($this->viewSuplentesUpdate);
    }

}
