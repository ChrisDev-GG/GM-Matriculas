<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModificarUserRequest;
use App\Http\Requests\ModificarUsuarioRequest;
use App\Http\Requests\RegistroUsuariosRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UsuariosDataController extends Controller
{
    #Strings that point to a specific view
    private $viewRegistrar = 'Usuarios.registrar_usuarios';
    private $viewGestionar = 'Usuarios.gestionar_usuarios';
    private $viewModificar = 'Usuarios.modificar_usuarios';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try{
            return $this->userAuthorizeAdministratorWithData($this->viewGestionar, [
                'users' => User::all()
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
        return $this->userAuthorizeAdministrator($this->viewRegistrar);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistroUsuariosRequest $request)
    {
        /* try{
          $user = User::create($request->validated());
            return redirect('/usuarios/registro');  
        }catch(Exception $e){
            return redirect('/usuariosdata')->withErrors($e->getMessage());
        } */

        try{
            $id_user = auth()->user()->id;
            /* $request->merge([
                'names' => $request->nombres,
                'username' => $request->nombre_de_usuario,
                'email' => $request->email ?? "",
                'user_type' => $request->tipo_de_usuario,
                'password' => $request->contraseña,
            ]); */
            $request->validated();
            User::create([
                'name' => $request->nombre,
                'username' => $request->nombre_de_usuario,
                'email' => $request->email ?? "",
                'user_type' => $request->tipo_de_usuario,
                'password' => $request->contraseña,
            ]);
            return redirect('/usuarios/registro');
        }catch(Exception $e){
            return redirect()->to('/usuariosdata')->withErrors($e->getMessage());
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
            $user = User::where('id','=',$id)->first();
            return $this->userAuthorizeWithData($this->viewModificar, [
                'user' => $user,
            ]);
        }catch(Exception $e){
            return redirect()->to('/usuariosdata')->withErrors($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModificarUsuarioRequest $request, $id)
    {
        try{
            $request->validated();
            $user = User::where('id','=',$id)->first();
            $request->nombre = $request->nombre ? $user->name = $request->nombre : "";
            $request->nombre_de_usuario = $request->nombre_de_usuario ? $user->username = $request->nombre_de_usuario : "";
            $request->email = $request->email ? $user->email = $request->email : "";
            $request->tipo_de_usuario = $request->tipo_de_usuario ? $user->user_type = $request->tipo_de_usuario : "";
            $request->contraseña = $request->contraseña ? $user->password = $request->contraseña : "";
            $user->save();
            return redirect()->to('/usuarios/update_success');
        }catch(Exception $e){
            return redirect()->to('/usuariosdata')->withErrors($e->getMessage());
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
        
    }

    /**
     * Activate the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activateUsuario($id) //We use this to deactivate instead 
    {
        try{
            $user = User::where('id','=',$id)->first();
            $active = $user->active == 0 ? $user->active = 1 : $user->active = 1;
            $user->save();
            return redirect()->to('/usuariosdata');
        }catch(Exception $e){
            return redirect()->to('/usuariosdata')->withErrors($e->getMessage());
        }
    }

    /**
     * Dectivate the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivateUsuario($id) //We use this to deactivate instead 
    {
        try{
            $user = User::where('id','=',$id)->first();
            $active = $user->active == 1 ? $user->active = 0 : $user->active = 1;
            $user->save();
            return redirect()->to('/usuariosdata');
        }catch(Exception $e){
            return redirect()->to('/usuariosdata')->withErrors($e->getMessage());
        }
    }
    
}
