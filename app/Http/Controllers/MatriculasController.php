<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatriculaRequest;
use App\Http\Requests\MatriculaSuplenteRequest;
use App\Models\Alumno;
use App\Models\Apoderado;
use App\Models\ApoderadoSuplente;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Exception;
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
        try{
            $alumnos = Alumno::orderBy('names','ASC')->get();
            $apoderados = Apoderado::orderBy('name','ASC')->get();
            $suplentes = ApoderadoSuplente::orderBy('name','ASC')->get();
            return $this->userAuthorizeWithData($this->viewMatriculas, [
                'alumnos' => $alumnos,
                'apoderados' => $apoderados, 
                'suplentes' => $suplentes,
            ]);
        }catch(Exception $e){
            return redirect()->to('/home')->withErrors($e->getMessage());
        }
    }

    public function pdf(MatriculaRequest $request){
        try{
            $pdf = app('dompdf.wrapper');
            $data = [
                'alumno' => '',
                'apoderado' => '',
            ];
            if($request->rut_alumno && $request->rut_apoderado){
                $alumno = Alumno::where('id', '=', $request->rut_alumno)->first();
                $apoderado = Apoderado::where('id', '=', $request->rut_apoderado)->first();
                $data = [
                    'alumno' => $alumno,
                    'apoderado' => $apoderado,
                ];
            }
            $date = $this->getDate();
            $pdf->loadView('Matriculas.matriculaspdf', compact('date', 'data'));
            return $pdf->stream('mtrcpdf.pdf');
        }catch(Exception $e){
            return redirect()->to('/matriculas')->withErrors($e->getMessage());
        }
    }

    public function pdfSuplente(MatriculaSuplenteRequest $request){
        try{
            $pdf = app('dompdf.wrapper');
            $data = [
                'alumno' => '',
                'suplente' => '',
            ];
            if($request->rut_alumno && $request->rut_suplente){
                $alumno = Alumno::where('id', '=', $request->rut_alumno)->first();
                $suplente = ApoderadoSuplente::where('id', '=', $request->rut_suplente)->first();
                $data = [
                    'alumno' => $alumno,
                    'suplente' => $suplente,
                ];
            }
            $date = $this->getDate();
            $pdf->loadView('Matriculas.matriculaspdfsuplente', compact('date', 'data'));
            return $pdf->stream('mtrcpdf.pdf');
        }catch(Exception $e){
            return redirect()->to('/matriculas')->withErrors($e->getMessage());
        }
    }

}
