@extends('shared')

@section('links-css')
    <link href="/css/shared-extras.css" rel="stylesheet">
@endsection

@section('navigator')
        <a class="nav-link fw-bold py-1 px-0" href="/home">Inicio</a>
        <a class="nav-link fw-bold py-1 px-0" href="/registros">Registros</a>
        <a class="nav-link fw-bold py-1 px-0" href="/matriculas">Matriculas</a>
        @auth
            @if(auth()->user()->user_type == 'administrador')
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
            <input type="text" class="form-control" id="InputUser" placeholder="Nombre y Apellido" name="name">
        </div>
        <div class="form-group form-pd">
            <label for="InputUsername">Nombre de Usuario</label>
            <input type="text" class="form-control" id="InputUsername" placeholder="Nombre de Usuario" name="username">
        </div>
        <div class="form-group form-pd">
          <label for="InputEmail">Correo Electronico</label>
          <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Correo Electronico" name="email">
        </div>
        <div class="form-group form-pd">
            <label for="InputPassword1">Contraseña</label>
            <input type="password" class="form-control" id="InputPassword1" placeholder="Contraseña" name="password">
        </div>
        <div class="form-group form-pd">
            <label for="InputPassword2">Confirmar contraseña</label>
            <input type="password" class="form-control" id="InputPassword2" placeholder="Confirmar Contraseña" name="password_confirmation">
        </div>
        <input class="form-check-input" type="radio" name="user_type" id="exampleRadios1" value="administrador" unchecked >
        <label class="form-check-label" for="exampleRadios1">
            Administrador
        </label>
        <input class="form-check-input check-pd" type="radio" name="user_type" id="exampleRadios2" value="usuario" checked >
        <label class="form-check-label" for="exampleRadios2">
            Usuario
        </label><br>
        <button type="submit" class="btn btn-warning submit-pd"><b>Registrar</b></button>
      </form>
@endsection
