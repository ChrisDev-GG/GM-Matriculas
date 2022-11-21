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
    <h1 class="registro-apoderados-title">Modificar Apoderado</h1>
    <form action="/registros/apoderados/{{$apoderado->id}}" method="POST" onsubmit="return isValidFormApoderados();">
        @csrf
        @method('put')
        <div id="errors">

        </div>
        @include('Messages.apoderados-msg')
        <div class="form-group form-pd">
            <label for="InputNames">Nombre - <b>Antiguos : {{$apoderado->name ?? "-"}}</b></label>
            <input type="text" class="form-control" id="InputNames" placeholder="Nombres" name="nombre" value="{{old('nombre')}}">
        </div>

        <div class="form-group form-pd">
            <label for="InputRun">RUT (sin puntos y con guion) - <b>Antiguo : {{$apoderado->run ?? "-"}}</label>
            <input type="text" class="form-control" id="InputRun" placeholder="Rut" name="rut" value="{{old('rut')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputCorreo">Correo - <b>Antiguo : {{$apoderado->email ?? "-"}}</label>
            <input type="email" class="form-control" id="InputCorreo" placeholder="Email" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputPassword2">Telefono - <b>Antiguo : {{$apoderado->phone ?? "-"}}</label>
            <input type="text" class="form-control" id="InputTelefono" placeholder="Telefono" name="telefono" value="{{old('telefono')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputAddress">Dirección - <b>Antigua : {{$apoderado->address ?? "-"}}</label>
            <input type="text" class="form-control" id="InputAddress" placeholder="Dirección" name="direccion" value="{{old('direccion')}}">
        </div>
        <button type="submit" id="send" class="btn btn-warning submit-pd"><b>Actualizar datos</b></button>
    </form>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/filter.js')}}"></script>
    <script src="{{asset('js/verifyData.js')}}"></script>
        
@endsection