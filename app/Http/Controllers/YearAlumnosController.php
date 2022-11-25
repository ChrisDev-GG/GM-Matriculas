<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class YearAlumnosController extends Controller
{
    private $viewAdelantar = 'Registros.adelantar-success';
    private $viewAtrasar = 'Registros.atrasar-success';
    
    public function advance_year(){
        try{
            $alumnos = Alumno::all();
            $year = $this->getYear();
            foreach($alumnos as $alumno){
                $this->advance($alumno->grade, $alumno);
            }
            return redirect()->to("/registros/alumnos");
        }catch(Exception $e){
            return redirect()->to("/registros/alumnos")->withErrors('Ocurrio un error, intentelo más tarde.');
        }
    }

    public function setback_year(){
        try{
            $alumnos = Alumno::all();
            $year = $this->getYear();
            foreach($alumnos as $alumno){
                $this->setback($alumno->grade, $alumno);
            }
            return redirect()->to("/registros/alumnos");
        }catch(Exception $e){
            return redirect()->to("/registros/alumnos")->withErrors('Ocurrio un error, intentelo más tarde.');
        }
    }

    public function setBack($year, $alumno){
        try{
            $actualYear = $this->getYear();
            if($alumno->status){
                switch($year){
                    case '2 Basico':
                        $alumno->grade = '1 Basico';
                        $alumno->save();
                        break;
                    case '3 Basico':
                        $alumno->grade = '2 Basico';
                        $alumno->save();
                        break;
                    case '4 Basico':
                        $alumno->grade = '3 Basico';
                        $alumno->save();
                        break;
                    case '5 Basico':
                        $alumno->grade = '4 Basico';
                        $alumno->save();
                        break;
                    case '6 Basico':
                        $alumno->grade = '5 Basico';
                        $alumno->save();
                        break;
                    case '7 Basico':
                        $alumno->grade = '6 Basico';
                        $alumno->save();
                        break;
                    case '8 Basico':
                        $alumno->grade = '7 Basico';
                        $alumno->save();
                        break;
                    case '1 Medio':
                        $alumno->grade = '8 Basico';
                        $alumno->save();
                        break;
                    case '2 Medio':
                        $alumno->grade = '1 Medio';
                        $alumno->save();
                        break;
                    case '3 Medio':
                        $alumno->grade = '2 Medio';
                        $alumno->save();
                        break;
                    case '4 Medio':
                        $alumno->grade = '3 Medio';
                        $alumno->save();
                        break;
                    case 'Egresado '.$actualYear:
                        $alumno->grade = '4 Medio';
                        $alumno->save();
                        break;
                }
            }
        }catch(Exception $e){
            return "Egresado";
        }
    }

    public function advance($year, $alumno){
        try{
            $actualYear = $this->getYear();
            if($alumno->status){
                switch($year){
                    case '1 Basico':
                        $alumno->grade = '2 Basico';
                        $alumno->save();
                        break;
                    case '2 Basico':
                        $alumno->grade = '3 Basico';
                        $alumno->save();
                        break;
                    case '3 Basico':
                        $alumno->grade = '4 Basico';
                        $alumno->save();
                        break;
                    case '4 Basico':
                        $alumno->grade = '5 Basico';
                        $alumno->save();
                        break;
                    case '5 Basico':
                        $alumno->grade = '6 Basico';
                        $alumno->save();
                        break;
                    case '6 Basico':
                        $alumno->grade = '7 Basico';
                        $alumno->save();
                        break;
                    case '7 Basico':
                        $alumno->grade = '8 Basico';
                        $alumno->save();
                        break;
                    case '8 Basico':
                        $alumno->grade = '1 Medio';
                        $alumno->save();
                        break;
                    case '1 Medio':
                        $alumno->grade = '2 Medio';
                        $alumno->save();
                        break;
                    case '2 Medio':
                        $alumno->grade = '3 Medio';
                        $alumno->save();
                        break;
                    case '3 Medio':
                        $alumno->grade = '4 Medio';
                        $alumno->save();
                        break;
                    case '4 Medio':
                        $alumno->grade = 'Egresado '.$actualYear;
                        $alumno->save();
                        break;
                }
            }
        }catch(Exception $e){
            return "Egresado";
        }
    }
}
