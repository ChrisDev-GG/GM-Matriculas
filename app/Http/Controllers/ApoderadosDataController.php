<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModificarApoderadoRequest;
use App\Http\Requests\RegistroApoderadoRequest;
use App\Models\Apoderado;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Innovaweb\ChileanRut\Rut;

class ApoderadosDataController extends Controller
{
    #Strings that point to a specific view
    private $viewModificar = 'Registros.modificar_apoderados';
    private $viewRegistrar = 'Registros.registrar_apoderados';
    private $viewGestionar = 'Registros.gestionar_apoderados';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $apoderados = Apoderado::all();
            return $this->userAuthorizeWithData($this->viewGestionar, [
                'apoderados' => $apoderados,
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
        return $this->userAuthorize($this->viewRegistrar);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistroApoderadoRequest $request)
    {
        try{
            $id_user = auth()->user()->id;
            $request->merge([
                'name' => $request->nombre,
                'run' => $request->rut,
                'email' => $request->email,
                'phone' => $request->telefono,
                'address' => $request->direccion,
                'id_user' => $id_user,
            ]);
            $request->validated();
            $apoderado = new Apoderado;
            $apoderado->store($request);
            return redirect('/registros/apoderado_success');
        }catch(Exception $e){
            return redirect()->to('/registros/apoderados')->withErrors($e->getMessage());
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
            $apoderado = Apoderado::where('id','=',$id)->first();
            return $this->userAuthorizeWithData($this->viewModificar, [
                'apoderado' => $apoderado,
            ]);
        }catch(Exception $e){
            return redirect()->to('/registros/apoderados')->withErrors($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModificarApoderadoRequest $request, $id)
    {
        try{
            $request->validated();
            $apoderado = Apoderado::where('id','=',$id)->first();
            $request->nombre = $request->nombre ? $apoderado->name = $request->nombre : "";
            $request->rut = $request->rut ? $apoderado->run = $request->rut : "";
            $request->email = $request->email ? $apoderado->email = $request->email : "";
            $request->telefono = $request->telefono ? $apoderado->phone = $request->telefono : "";
            $request->phone = $request->phone ? $apoderado->email = $request->phone : "";
            $request->direccion = $request->direccion ? $apoderado->address = $request->direccion : "";
            $apoderado->save();
            return redirect()->to('/registros/apoderado_updated');
        }catch(Exception $e){
            return redirect()->to('/registros/apoderados')->withErrors($e->getMessage());
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
    public function activateApoderado($id) //We use this to deactivate instead 
    {
        try{
            $apoderado = Apoderado::where('id','=',$id)->first();
            $status = $apoderado->status == 0 ? $apoderado->status = 1 : $apoderado->status = 1;
            $apoderado->save();
            return redirect()->to('/registros/apoderados');
        }catch(Exception $e){
            return redirect()->to('/registros/apoderados')->withErrors($e->getMessage());
        }
    }

    /**
     * Dectivate the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivateApoderado($id) //We use this to deactivate instead 
    {
        try{
            $apoderado = Apoderado::where('id','=',$id)->first();
            $status = $apoderado->status == 1 ? $apoderado->status = 0 : $apoderado->status = 1;
            $apoderado->save();
            return redirect()->to('/registros/apoderados');
        }catch(Exception $e){
            return redirect()->to('/registros/apoderados')->withErrors($e->getMessage());
        }
    }
}
