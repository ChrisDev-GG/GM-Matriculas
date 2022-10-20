<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MatriculasController extends Controller
{
    #Strings that point to a specific view
    private $viewMatriculas = 'Matriculas.matriculas';

    /**
     * Description: 
     * Method with user restriction to get home view, not logged users get redirected to login view.
     * Works with route: '/matriculas'
     * @return  view 
     */
    public function index(){
        return $this->userAuthorize($this->viewMatriculas);
    }

    /**
     * Description: 
     * Method to get actual date and translate month to spanish, returning an array with the day, month and year.
     * @return  array[] date in spanish
     */
    public function getDate(){
        $datetime = Carbon::now()->toDateTimeString();
        $day = Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->translatedFormat('d');
        $month = Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->translatedFormat('F');
        $year = Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->translatedFormat('Y');
        $date = [$day,$month,$year];
        return $date;
    }
}
