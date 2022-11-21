@extends('shared')

@section('links-css')
    <link href="/css/shared-extras.css" rel="stylesheet">
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
    <h1 class="registro-usuarios-title">Registrar Usuarios</h1>
    <form action="/usuariosdata" method="POST">
        @csrf
        @include('Messages.users-msg')
        <div class="form-group form-pd">
            <label for="InputUser">Nombre y Apellido</label>
            <input type="text" class="form-control" id="InputUser" placeholder="Nombre y Apellido" name="nombre" value="{{old('nombre')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputUsername">Nombre de Usuario</label>
            <input type="text" class="form-control" id="InputUsername" placeholder="Nombre de Usuario" name="nombre_de_usuario" value="{{old('nombre_de_usuario')}}">
        </div>
        <div class="form-group form-pd">
          <label for="InputEmail">Correo Electronico</label>
          <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Correo Electronico" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputPassword1">Contraseña</label>
            <input type="password" class="form-control" id="InputPassword1" placeholder="Contraseña" name="contraseña" >
        </div>
        <div class="form-group form-pd">
            <label for="InputPassword2">Confirmar contraseña</label>
            <input type="password" class="form-control" id="InputPassword2" placeholder="Confirmar Contraseña" name="confirmar_contraseña">
        </div>
        <input class="form-check-input" type="radio" name="tipo_de_usuario" id="exampleRadios1" value="administrador" unchecked >
        <label class="form-check-label" for="exampleRadios1">
            Administrador
        </label>
        <input class="form-check-input check-pd" type="radio" name="tipo_de_usuario" id="exampleRadios2" value="usuario" checked >
        <label class="form-check-label" for="exampleRadios2">
            Usuario
        </label><br>
        <button type="submit" class="btn btn-warning submit-pd"><b>Registrar</b></button>
      </form>
@endsection
