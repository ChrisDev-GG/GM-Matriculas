<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    #Strings that point to a specific view
    private $viewHome = 'Home.home';

    /**
     * Description: 
     * Method with user restriction to get home view, not logged users get redirected to login view.
     * Works with route: '/login'
     * @return  view 
     */
    public function index(){
        return $this->userAuthorize($this->viewHome);
    }

    /**
     * Description: 
     * Method that create a HTTP request to login and authenticate a user, redirects to registro view when finalizes.
     * @param   LoginRequest    $request
     * @return  view 
     */
    public function login(LoginRequest $request){
        $credentials = $request->getCredentials();
        if(!Auth::validate($credentials)){
            return redirect()->to('/login')->withErrors('El Usuario/Contraseña no coinciden');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return $this->authenticated($request, $user);
    }

    /**
     * Description: 
     * Method that redirects to home view if there's a user that makes a login request.
     * @param   Request $request 
     * @param   User    $user
     * @return  view 
     */
    public function authenticated(Request $request, $user){
        return redirect('/home');
    }

}
