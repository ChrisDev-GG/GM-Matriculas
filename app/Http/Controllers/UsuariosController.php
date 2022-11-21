<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroUsuariosRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    #Strings that point to a specific view
    private $viewUsers = 'Usuarios.usuarios';
    private $viewConfirmation = 'Usuarios.registro-success';
    private $viewUpdate = 'Usuarios.update-success';

    /**
     * Description: 
     * Method with user restriction to get usuarios view, not logged users get redirected to login view.
     * Works with route: '/usuarios'
     * @return view 
     */
    public function index(){
        return $this->userAuthorizeAdministrator($this->viewUsers);
    }
    
    /**
     * Description: 
     * Method that creates a HTTP request to register a new user, redirects to registro view when finalizes.
     * @param   RegistroUsuariosRequest request
     * @return  view 
     */
    /*
    public function register(RegistroUsuariosRequest $request){
        $user = User::create($request->validated());
        return redirect('/usuarios/registro');
    }
    */

    /**
     * Description: 
     * Method with user restriction to get registro view, not logged users get redirected to login view.
     * Works with route: '/usuarios/registro'
     * @return view 
     */
    public function confirmation(){
        return $this->userAuthorizeAdministrator($this->viewConfirmation);
    }
    /**
     * Description: 
     * Method with user restriction to get registro view, not logged users get redirected to login view.
     * Works with route: '/usuarios/registro'
     * @return view 
     */
    public function updateConfirmation(){
        return $this->userAuthorizeAdministrator($this->viewUpdate);
    }
}

