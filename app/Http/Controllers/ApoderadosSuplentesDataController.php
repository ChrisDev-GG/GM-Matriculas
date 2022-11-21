<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModificarSuplenteRequest;
use App\Http\Requests\RegistroSuplenteRequest;
use App\Models\Alumno;
use App\Models\Apoderado;
use App\Models\ApoderadoSuplente;
use Exception;
use Illuminate\Http\Request;

class ApoderadosSuplentesDataController extends Controller
{
    #Strings that point to a specific view
    private $viewModificar = 'Registros.modificar_suplentes';
    private $viewRegistrar = 'Registros.registrar_suplentes';
    private $viewGestionar = 'Registros.gestionar_suplentes';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $suplentes = ApoderadoSuplente::all();
            foreach($suplentes as &$suplente){
                $apoderado =  Apoderado::where('id', '=', $suplente->id_apoderado)->first();
                $suplente['apoderado_name'] = $apoderado->name;
                $suplente['apoderado_run'] = $apoderado->run;
                $suplente['apoderado_phone'] = $apoderado->phone;
                $suplente['apoderado_email'] = $apoderado->email;
            }
            return $this->userAuthorizeWithData($this->viewGestionar, [
                'suplentes' => $suplentes,
            ]);
        }catch(Exception $e){
            return redirect()->to('/home')->withErrors('Ha ocurrido un problema, intentelo mas tarde. (code:'.$e->getCode().')');
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
            $apoderados = Apoderado::all();
            return $this->userAuthorizeWithData($this->viewRegistrar, [
                'apoderados' => $apoderados,
            ]);
        }catch(Exception $e){
            return redirect()->to('/registros/suplentes')->withErrors('Ha ocurrido un problema, intentelo mas tarde. (code:'.$e->getCode().')');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistroSuplenteRequest $request)
    {
        try{
            $id_user = auth()->user()->id;
            $request->merge([
                'name' => $request->nombre,
                'run' => $request->rut,
                'id_apoderado' => $request->rut_apoderado_principal,
                'email' => $request->email,
                'phone' => $request->telefono,
                'address' => $request->direccion,
                'id_user' => $id_user,
            ]);
            $request->validated();
            $suplente = new ApoderadoSuplente();
            $suplente->store($request);
            return redirect('/registros/suplente_success');
        }catch(Exception $e){
            return redirect()->to('/registros/apoderados')->withErrors('Ha ocurrido un problema, intentelo mas tarde. (code:'.$e->getCode().')');
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
            $suplente = ApoderadoSuplente::where('id','=',$id)->first();
            $apoderados = Apoderado::all();
            return $this->userAuthorizeWithData($this->viewModificar, [
                'suplente' => $suplente,
                'apoderados' => $apoderados,
            ]);
        }catch(Exception $e){
            return redirect()->to('/registros/suplentes')->withErrors('Ha ocurrido un problema, intentelo mas tarde. (code:'.$e->getCode().')');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModificarSuplenteRequest $request, $id)
    {
        try{
            $request->validated();
            $suplente = ApoderadoSuplente::where('id','=',$id)->first();
            $request->nombre = $request->nombre ? $suplente->name = $request->nombre : "";
            $request->rut = $request->rut ? $suplente->run = $request->rut : "";
            $request->email = $request->email ? $suplente->email = $request->email : "";
            $request->telefono = $request->telefono ? $suplente->phone = $request->telefono : "";
            $request->phone = $request->phone ? $suplente->email = $request->phone : "";
            $request->direccion = $request->direccion ? $suplente->address = $request->direccion : "";
            $request->rut_apoderado_principal = $request->rut_apoderado_principal ? $suplente->id_apoderado = $request->rut_apoderado_principal : "";
            $suplente->save();
            return redirect()->to('/registros/suplente_updated');
        }catch(Exception $e){
            return redirect()->to('/registros/suplentes')->withErrors('Ha ocurrido un problema, intentelo mas tarde. (code:'.$e->getMessage().')');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Activate the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activateSuplente($id) //We use this to deactivate instead 
    {
        try{
            $suplente = ApoderadoSuplente::where('id','=',$id)->first();
            $status = $suplente->status == 0 ? $suplente->status = 1 : $suplente->status = 1;
            $suplente->save();
            return redirect()->to('/registros/suplentes');
        }catch(Exception $e){
            return redirect()->to('/registros/suplentes')->withErrors('Ha ocurrido un problema, intentelo mas tarde. (code:'.$e->getCode().')');
        }
    }

    /**
     * Deactivate the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivateSuplente($id) //We use this to deactivate instead 
    {
        try{
            $suplente = ApoderadoSuplente::where('id','=',$id)->first();
            $status = $suplente->status == 1 ? $suplente->status = 0 : $suplente->status = 1;
            $suplente->save();
            return redirect()->to('/registros/suplentes');
        }catch(Exception $e){
            return redirect()->to('/registros/suplentes')->withErrors('Ha ocurrido un problema, intentelo mas tarde. (code:'.$e->getCode().')');
        }

    }

}
