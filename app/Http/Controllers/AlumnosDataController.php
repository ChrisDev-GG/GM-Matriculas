<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModificarAlumnoRequest;
use App\Http\Requests\RegistroAlumnoRequest;
use App\Models\Alumno;
use App\Models\Apoderado;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Innovaweb\ChileanRut\Rut;

class AlumnosDataController extends Controller
{
    #Strings that point to a specific view
    private $viewModificar = 'Registros.modificar_alumnos';
    private $viewRegistrar = 'Registros.registrar_alumnos';
    private $viewGestionar = 'Registros.gestionar_alumnos';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $alumnos = Alumno::all();
            foreach($alumnos as $alumno){
                $apoderados =  Apoderado::where('id', '=', $alumno->id_apoderado)->first();
                $run_apoderado = $apoderados->run;
                $alumno->id_apoderado = $run_apoderado;
                $run = $alumno->run."-".$alumno->digit_run;
                $alumno->run = Rut::format($run, false);
            }
            return $this->userAuthorizeWithData($this->viewGestionar, [
                'alumnos' => $alumnos,
            ]);
        }catch(Exception $e){
            return redirect()->to('/home')->withErrors($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            return $this->userAuthorizeWithData($this->viewRegistrar, [
                'apoderados' => Apoderado::all(),
            ]);
        }catch(Exception $e){
            return redirect()->to('/registros/alumnos')->withErrors($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistroAlumnoRequest $request)
    {
        try{
            $id_user = auth()->user()->id;
            $run_apoderado = $request->input('run_apoderado');
            $run_alumno = trim($request->input('rut'));
            $run = Rut::getNumber($run_alumno, false); 
            $digit_run = Rut::getDv($run_alumno);
            $request->merge([
                'names' => $request->nombres,
                'paternal_surename' => $request->apellido_paterno,
                'maternal_surename' => $request->apellido_materno,
                'run' => $run,
                'digit_run' => $digit_run,
                'grade' => $request->curso,
                'email' => $request->email,
                'gender' => $request->genero,
                'phone' => $request->telefono,
                'birth_date' => $request->fecha_de_nacimiento,
                'id_apoderado' => $request->rut_apoderado,
                'id_user' => $id_user,
            ]);
            $request->validated();
            $alumno = new Alumno();
            $alumno->store($request);
            return redirect('/registros/alumno_success');
        }catch(Exception $e){
            return redirect()->to('/registros/alumnos')->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $alumno = Alumno::where('id','=',$id)->first();
            $apoderados = Apoderado::all();
            $run_apoderado = Apoderado::where('id','=',$alumno->id_apoderado)->first();
            return $this->userAuthorizeWithData($this->viewModificar, [
                'alumno' => $alumno,
                'apoderado_run' => $run_apoderado,
                'apoderados' => $apoderados,
            ]);
        }catch(Exception $e){
            return redirect()->to('/registros/alumnos')->withErrors($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModificarAlumnoRequest $request, $id)
    {
        try{
            $request->validated();
            $run_alumno = trim($request->rut);
            $run = Rut::getNumber($run_alumno, false); 
            $digit_run = Rut::getDv($run_alumno);
            $alumno = Alumno::where('id','=',$id)->first();
            $request->nombres = $request->nombres ? $alumno->names = $request->nombres : "";
            $request->apellido_paterno = $request->apellido_paterno ? $alumno->paternal_surename = $request->apellido_paterno : "";
            $request->apellido_materno = $request->apellido_materno ? $alumno->maternal_surename = $request->apellido_materno : "";
            $run = $run ? $alumno->run = $run : "";
            $digit_run = $digit_run ? $alumno->digit_run = $digit_run : "";
            $request->curso = $request->curso ? $alumno->grade = $request->curso : "";
            $request->email = $request->email ? $alumno->email = $request->email : "";
            $request->telefono = $request->telefono ? $alumno->phone = $request->telefono : "";
            $request->genero = $request->genero ? $alumno->gender = $request->genero : "";
            $request->fecha_de_nacimiento = $request->fecha_de_nacimiento ? $alumno->birth_date = $request->fecha_de_nacimiento : "";
            $request->rut_apoderado = $request->rut_apoderado ? $alumno->id_apoderado = $request->rut_apoderado : "";
            $alumno->save();
            return redirect()->to('/registros/alumno_updated');
        }catch(Exception $e){
            return redirect()->to('/registros/alumnos')->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //We use this to deactivate instead 
    {
        /* try{
            $alumno = Alumno::where('id','=',$id)->first();
            $status = $alumno->status == 1 ? $alumno->status = 0 : $alumno->status = 1;
            $alumno->save();
            return redirect()->to('/registros/alumnos');
        }catch(Exception $e){
            return redirect()->to('/registros/alumnos')->withErrors($e->getMessage());
        } */
    }

    /**
     * Activate the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activateAlumno($id) //We use this to deactivate instead 
    {
        try{
            $alumno = Alumno::where('id','=',$id)->first();
            $status = $alumno->status == 0 ? $alumno->status = 1 : $alumno->status = 1;
            $alumno->save();
            return redirect()->to('/registros/alumnos');
        }catch(Exception $e){
            return redirect()->to('/registros/alumnos')->withErrors($e->getMessage());
        }
    }

    /**
     * Deactivate the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivateAlumno($id) //We use this to deactivate instead 
    {
        try{
            $alumno = Alumno::where('id','=',$id)->first();
            $status = $alumno->status == 0 ? $alumno->status = 1 : $alumno->status = 0;
            $alumno->save();
            return redirect()->to('/registros/alumnos');
        }catch(Exception $e){
            return redirect()->to('/registros/alumnos')->withErrors($e->getMessage());
        }
    }
}
