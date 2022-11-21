<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Apoderado;
use App\Models\ApoderadoSuplente;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Innovaweb\ChileanRut\Rut;

class SearchByRutController extends Controller
{
    private $viewRegistrarAp = 'Registros.registrar_apoderados';
    private $viewGestionarAp = 'Registros.gestionar_apoderados';
    private $viewRegistrarAl = 'Registros.registrar_alumnos';
    private $viewGestionarAl = 'Registros.gestionar_alumnos';
    private $viewRegistrarSu = 'Registros.registrar_suplentes';
    private $viewGestionarSu = 'Registros.gestionar_suplentes';

    public function searchByRutApoderado(Request $request)
    {
        try{
            if(!$request->rut){
                return redirect('/registros/apoderados');
            }
            $run = $request->rut;
            return $this->userAuthorizeWithData($this->viewGestionarAp, [
                'apoderados' => Apoderado::where('run','LIKE','%'.$run.'%')->get(), 
            ]);
        }catch(Exception $e){
            return redirect()->to('/registros/apoderados')->withErrors($e->getMessage());
        }
    }
    
    public function searchByRutAlumno(Request $request)
    {
        try{
            if(!$request->rut){
                return redirect('/registros/alumnos');
            }
            $run = $request->rut;
            if(Rut::validate($run)){
                $run = Rut::getNumber($run, false);
            } 
            $alumnos = Alumno::where('run','LIKE','%'.$run.'%')->get();
            foreach($alumnos as $alumno){
                $apoderados =  Apoderado::where('run', 'LIKE', '%'.$alumno->id_apoderado.'%')->first();
                if($apoderados){
                    $run_apoderado = $apoderados->run;
                    $run_alumno = $alumno->run."-".$alumno->digit_run;
                    $alumno->run = $run_alumno;
                    $alumno->id_apoderado = $run_apoderado;
                }
            }
            
            return $this->userAuthorizeWithData($this->viewGestionarAl, [
                'alumnos' => $alumnos,
            ]);
        }catch(Exception $e){
            return redirect()->to('/registros/alumnos')->withErrors($e->getMessage());
        }
    }

    public function searchByRutSuplente(Request $request)
    {
        try{
            if(!$request->rut){
                return redirect('/registros/suplentes');
            }
            $run = $request->rut;
            if(Rut::validate($run)){
                $run = Rut::getNumber($run, false);
            } 
            $suplentes = ApoderadoSuplente::where('run','LIKE','%'.$run.'%')->get();
            foreach($suplentes as $suplente){
                $apoderados =  Apoderado::where('run', 'LIKE', '%'.$suplente->id_apoderado.'%')->first();
                $apoderado =  Apoderado::where('id', '=', $suplente->id_apoderado)->first();
                if($apoderados){
                    $run_apoderado = $apoderados->run;
                    $suplente->id_apoderado = $run_apoderado;
                }
                $suplente['apoderado_name'] = $apoderado->name;
                $suplente['apoderado_run'] = $apoderado->run;
                $suplente['apoderado_phone'] = $apoderado->phone;
                $suplente['apoderado_email'] = $apoderado->email;
            }
            
            return $this->userAuthorizeWithData($this->viewGestionarSu, [
                'suplentes' => $suplentes,
            ]);
        }catch(Exception $e){
            return redirect()->to('/registros/alumnos')->withErrors($e->getMessage());
        }
    }

}
