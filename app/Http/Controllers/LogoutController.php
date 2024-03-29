<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /**
     * Description: 
     * Method to close session of a logged user, redirects to login when finalizes.
     * Works with route: '/logout'
     * @return view 
     */
    public function logout(){
        try{
            Session::flush();
            Auth::logout();
            return redirect('/login');
        }catch(Exception $e){
            return redirect()->to('/home')->withErrors($e->getMessage());
        }
    }
}
