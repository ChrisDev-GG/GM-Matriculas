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
    <h1 class="registro-apoderados-title">Modificar Apoderado Suplente</h1>

    <form action="/registros/suplentes/{{$suplente->id}}" method="POST" onsubmit="return isValidFormSuplentes();">
        @csrf
        @method('put')
        @include('Messages.apoderados-msg')
        <div id="errors">

        </div>
        <div class="form-group form-pd">
            <label for="InputNames">Nombre - <b>Antiguos : {{$suplente->name ?? "-"}}</b></label>
            <input type="text" class="form-control" id="InputNames" placeholder="Nombres" name="nombre" value="{{old('nombre')}}">
        </div>

        <div class="form-group form-pd">
            <label for="InputRun">RUT (sin puntos y con guion) - <b>Antiguo : {{$suplente->run ?? "-"}}</label>
            <input type="text" class="form-control" id="InputRun" placeholder="Rut" name="rut" value="{{old('rut')}}">
        </div>
        <div class="form-group form-pd">
            <label for="select-run">Sustituye a:</label>
            <div class="form-group form-pd">
                <input type="text" class="form-control form-rut" placeholder="Rut (sin puntos y con guion)" id="search" onfocusout="filterSuplente();">
                <button type="button" class="btn btn-success" id="filterApoderado" onclick="filter()"><b>Buscar</b></button>
            </div>
            <select class="form-select" title="Apoderados" name="rut_apoderado_principal" id="select-run">
                <option value=""> </option>
                @foreach($apoderados as $apoderado)
                    <option value="{{$apoderado->id}}">{{$apoderado->run}} - {{$apoderado->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group form-pd">
            <label for="InputCorreo">Correo - <b>Antiguo : {{$suplente->email ?? "-"}}</label>
            <input type="email" class="form-control" id="InputCorreo" placeholder="Email" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputPassword2">Telefono - <b>Antiguo : {{$suplente->phone ?? "-"}}</label>
            <input type="text" class="form-control" id="InputTelefono" placeholder="Telefono" name="telefono" value="{{old('telefono')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputAddress">Dirección - <b>Antigua : {{$suplente->address ?? "-"}}</label>
            <input type="text" class="form-control" id="InputAddress" placeholder="Dirección" name="direccion" value="{{old('direccion')}}">
        </div>
        <button type="submit" class="btn btn-warning submit-pd"><b>Actualizar datos</b></button>
    </form>

@endsection

@section('js')
    <script src="{{asset('js/filter.js')}}"></script>
    <script src="{{asset('js/verifyData.js')}}"></script>
@endsection
