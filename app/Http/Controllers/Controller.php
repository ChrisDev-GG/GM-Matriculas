<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;
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
        if((Auth::check()&&Auth::user()->active)){
            if( (Auth::user()->user_type != 'administrador') && (Auth::user()->user_type != 'root')){
                return view('Home.home');
            }
            return view($view);
        }
        return view('Auth.login');
    }
    public function userAuthorizeAdministratorWithData($view, $data){
        if(Auth::check()&&Auth::user()->active){
            if( (Auth::user()->user_type != 'administrador') && (Auth::user()->user_type != 'root')){
                return view('Home.home');
            }
            return view($view, $data);
        }
        return view('Auth.login');
    }

    /**
     * Description: 
     * Method to get actual date and translate month to spanish, returning an array with the day, month and year.
     * @return  array[] date in spanish
     */
    public function getDate(){
        try{
            $datetime = Carbon::now()->toDateTimeString();
            $day = Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->translatedFormat('d');
            $month = Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->translatedFormat('F');
            $year = Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->translatedFormat('Y');
            $todayDate = [$day,$month,$year];
            $year = (int) $todayDate[2];
            if($todayDate[1]=='diciembre'||$todayDate[1]=='Diciembre'){
                $year += 1;
            }
            $data = [$todayDate, $year];
            return $data;
        }catch(Exception $e){
            $day = '--';
            $month = '--';
            $year = '----';
            $todayDate = [$day,$month,$year];
            $data = [$todayDate, $year];
            return $data;
        }
    }

    public function getYear(){
        try{
            $datetime = Carbon::now()->toDateTimeString();
            $year = Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->translatedFormat('Y');
            return $year;
        }catch(Exception $e){
            return "20XX";
        }
    }
}
