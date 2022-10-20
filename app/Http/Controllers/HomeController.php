<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    #Strings that point to a specific view
    private $viewHome = 'Home.home';
    private $viewLogin = 'Auth.login';

    /**
     * Description: 
     * Method with user restriction to get home view, not logged users get redirected to login view.
     * Works with route: '/home'
     * @return view (depending if the user is logged or not)
     */
    public function index(){
        return $this->userAuthorize($this->viewHome);
    }
    /**
     * Description: 
     * Method for start route that redirects to login view, if there's a logged user redirects to home view.
     * Works with route: '/'
     * @return  view 
     */
    public function start(){
        return $this->userAuthorize($this->viewHome);
    }

    /**
     * Description: 
     * Method that authenticate users to return a specific view,if there's not an user logged, redirects to login view.
     * @param   view 
     * @return  view 
     */
    public function userAuthorize($view){
        if(Auth::check()&&Auth::user()->active){
            return view($view);
        }
        return view('Auth.login');
    }
}
