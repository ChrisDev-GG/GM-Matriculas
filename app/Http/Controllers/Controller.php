<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Description: 
     * Method to authenticate users to return a specific view,
     * if there's not a logged user, redirects to login view.
     * @param   view    $view
     * @return  view 
     */
    public function userAuthorize($view){
        if(Auth::check()&&Auth::user()->active){
            return view($view);
        }
        return view('Auth.login');
    }
    public function userAuthorizeWithData($view, $data){
        if(Auth::check()&&Auth::user()->active){
            return view($view, $data);
        }
        return view('Auth.login');
    }

    /**
     * Description: 
     * Method that authenticate users to return a specific view,
     * if the user is not an administrator, redirects to home view, 
     * and if there's not a logged user, redirects to login view.
     * @param   view    $view
     * @return  view 
     */
    public function userAuthorizeAdministrator($view){
        if(Auth::check()&&Auth::user()->active){
            if(Auth::user()->user_type != 'administrador'){
                return view('Home.home');
            }
            return view($view);
        }
        return view('Auth.login');
    }
    public function userAuthorizeAdministratorWithData($view, $data){
        if(Auth::check()&&Auth::user()->active){
            if(Auth::user()->user_type != 'administrador'){
                return view('Home.home');
            }
            return view($view, $data);
        }
        return view('Auth.login');
    }
}
