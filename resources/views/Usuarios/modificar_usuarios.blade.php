@extends('shared')

@section('links-css')
    <link href="{{asset('css/shared-extras.css')}}" rel="stylesheet">
@endsection

@section('navigator')
        <a class="nav-link fw-bold py-1 px-0" href="/home">Inicio</a>
        <a class="nav-link fw-bold py-1 px-0" href="/registros">Registros</a>
        <a class="nav-link fw-bold py-1 px-0" href="/matriculas">Matriculas</a>
        @auth
            @if(auth()->user()->user_type == 'administrador' || auth()->user()->user_type == 'root')
<a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="/usuarios">Usuarios</a>
            @endif
        @endauth
@endsection

@section('content')
    <div>
    <h1 class="gestion-title">Modificar Usuarios</h1>
    <form action="/usuariosdata/{{$user->id}}" method="POST" onsubmit="return isValidFormUsuarios();">
        @csrf
        @method('put')
        @include('Messages.users-msg')
        <div id="errors">

        </div>
        <div class="form-group form-pd">
            <label for="InputUser">Nombre y Apellido - <b> Antiguos : {{$user->name ?? "-"}}</b></label>
            <input type="text" class="form-control" id="InputUser" placeholder="Nombre y Apellido" name="nombre" value="{{old('nombre')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputUsername">Nombre de Usuario - <b> Antiguo : {{$user->username ?? "-"}}</b></label>
            <input type="text" class="form-control" id="InputUsername" placeholder="Nombre de Usuario" name="nombre_de_usuario" value="{{old('nombre_de_usuario')}}">
        </div>
        <div class="form-group form-pd">
          <label for="InputEmail">Correo Electronico - <b> Antiguo : {{$user->email ?? "-"}}</b></label>
          <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Correo Electronico" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputPassword1">Cambiar contraseña</label>
            <input type="password" class="form-control" id="InputPassword1" placeholder="Nueva contraseña" name="contraseña" >
        </div>
        <label>Tipo de usuario - <b> Antiguo : {{$user->user_type}}</label><br><br>
        <input class="form-check-input" type="radio" name="tipo_de_usuario" id="Radios1" value="administrador" unchecked >
        <label class="form-check-label" for="exampleRadios1">
            Administrador
        </label>
        <input class="form-check-input check-pd" type="radio" name="tipo_de_usuario" id="Radios2" value="usuario" unchecked >
        <label class="form-check-label" for="exampleRadios2">
            Usuario
        </label><br><br>

        <button type="submit" class="btn btn-warning submit-pd"><b>Actualizar datos</b></button>
      </form>   

    </div>
@endsection

@section('js')
    <script src="{{asset('js/verifyData.js')}}"></script>
@endsection