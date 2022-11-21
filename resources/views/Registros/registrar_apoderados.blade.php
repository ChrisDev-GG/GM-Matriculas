@extends('shared')

@section('links-css')
    <link href="/css/shared-extras.css" rel="stylesheet">
@endsection

@section('navigator')
        <a class="nav-link fw-bold py-1 px-0" href="/home">Inicio</a>
        <a class="nav-link fw-bold py-1 px-0 active" href="/registros">Registros</a>
        <a class="nav-link fw-bold py-1 px-0" href="/matriculas">Matriculas</a>
        @auth
            @if(auth()->user()->user_type == 'administrador' || auth()->user()->user_type == 'root')
<a class="nav-link fw-bold py-1 px-0" aria-current="page" href="/usuarios">Usuarios</a>
            @endif
        @endauth
@endsection

@section('content')
    <h1 class="registro-apoderados-title">Registrar Apoderado</h1>
    <form action="/registros/apoderados" method="POST">
        @csrf
        @include('Messages.apoderados-msg')
        <div class="form-group form-pd">
            <label for="InputUser">Nombre *</label>
            <input type="text" class="form-control" id="InputUser" placeholder="Nombre" name="nombre" value="{{old('nombre')}}">
        </div>

        <div class="form-group form-pd">
            <label for="InputRun">RUT (sin puntos y con guion) *</label>
            <input type="text" class="form-control" id="InputRun" placeholder="Rut" name="rut" value="{{old('rut')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputCorreo">Correo</label>
            <input type="email" class="form-control" id="InputCorreo" placeholder="Email" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputPassword2">Telefono</label>
            <input type="text" class="form-control" id="InputTelefono" placeholder="Telefono" name="telefono" value="{{old('telefono')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputAddress">Dirección</label>
            <input type="text" class="form-control" id="InputAddress" placeholder="Dirección" name="direccion" value="{{old('direccion')}}">
        </div>
        <button type="submit" class="btn btn-warning submit-pd"><b>Registrar</b></button>
    </form>
       
@endsection

@section('js')
    <script src="{{asset('js/verifyData.js')}}"></script>
@endsection
