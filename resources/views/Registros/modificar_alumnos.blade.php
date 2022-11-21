@extends('shared')

@section('links-css')
    <link href="{{asset('css/shared-extras.css')}}" rel="stylesheet">
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
    <h1 class="registro-alumnos-title">Modificar Alumno</h1>
    <form action="/registros/alumnos/{{$alumno->id}}" method="POST" onsubmit="return isValidFormAlumnos();">
        @csrf
        @method('put')
        @include('Messages.alumnos-msg')
        <div id="errors">

        </div>
        <div class="form-group form-pd">
            <label for="InputUser">Nombres - <b>Antiguos : {{$alumno->names}}</b></label>
            <input type="text" class="form-control" id="InputAlumno" placeholder="Nombres" name="nombres" value="{{old('nombres')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputPS">Apellido Paterno - <b>Antiguo : {{$alumno->paternal_surename}}</b></label>
            <input type="text" class="form-control" id="InputPS" placeholder="Apellido Paterno" name="apellido_paterno" value="{{old('apellido_paterno')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputMS">Apellido Materno - <b>Antiguo : {{$alumno->maternal_surename}}</b></label>
            <input type="text" class="form-control" id="InputMS" placeholder="Apellido Materno" name="apellido_materno" value="{{old('apellido_materno')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputRun">RUT (sin puntos y con guion) - <b>Antiguo : {{$alumno->run}}-{{$alumno->digit_run}}</b></label>
            <input type="text" class="form-control" id="InputRun" placeholder="Rut" name="rut" max="10" value="{{old('rut')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputCorreo">Correo - <b>Antiguo : {{$alumno->email ?? "-"}}</b></label>
            <input type="email" class="form-control" id="InputCorreo" placeholder="Email" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputTelefono">Telefono - <b>Antiguo : {{$alumno->phone ?? "-"}}</b></label>
            <input type="text" class="form-control" id="InputTelefono" placeholder="Telefono" name="telefono" value="{{old('telefono')}}">
        </div>
        <div class="form-group form-pd">
            <label for="InputDireccion">Fecha de Nacimiento - <b>Antiguo : {{$alumno->birth_date ?? "-"}}</b></label>
            <input type="date" class="form-control" id="InputDate" name="fecha_de_nacimiento" value="{{old('fecha_de_nacimiento')}}">
        </div>
        <div class="form-group form-pd">
            <label for="GradeInput">Curso - <b>Antiguo : {{$alumno->grade}}</b></label>
            <select class="form-select" name="curso" id="GradeInput">
                <option value="">---</option>
                <option value="1 Basico">1º Básico</option>
                <option value="2 Basico">2º Básico</option>
                <option value="3 Basico">3º Básico</option>
                <option value="4 Basico">4º Básico</option>
                <option value="5 Basico">5º Básico</option>
                <option value="6 Basico">6º Básico</option>
                <option value="7 Basico">7º Básico</option>
                <option value="8 Basico">8º Básico</option>
                <option value="1 Medio">1º Medio</option>
                <option value="2 Medio">2º Medio</option>
                <option value="3 Medio">3º Medio</option>
                <option value="4 Medio">4º Medio</option>
            </select>
        </div>
        @php
            $genero = $alumno->gender == 'M' ? 'Masculino' : 'Femenino'
        @endphp
        <label class="form-check-label">Género - <b>Antiguo : {{$genero}}</b></label><br><br>
        <input class="form-check-input" type="radio" name="genero" id="radios1" value="M" unchecked >
        <label class="form-check-label" for="exampleRadios1">
            Masculino
        </label>
        <input class="form-check-input check-pd" type="radio" name="genero" id="radios2" value="F" unchecked >
        <label class="form-check-label" for="exampleRadios2">
            Femenino
        </label><br><br>

        <div class="form-group form-pd">
            <label for="select-run">Rut Apoderado - <b>Antiguo : {{$apoderado_run->run}}</b></label>
            <div class="form-group form-pd">
                <input type="text" class="form-control form-rut" placeholder="Rut (sin puntos y con guion)" id="search">
                <button type="button" class="btn btn-success" id="filterApoderado" onclick="filter()"><b>Buscar</b></button>
            </div>
            <select class="form-select" title="Apoderados" name="rut_apoderado" id="select-run">
                <option value=""> </option>
                @foreach($apoderados as $apoderado)
                    <option value="{{$apoderado->id}}">{{$apoderado->run}} - {{$apoderado->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning submit-pd" id="send"><b>Actualizar datos</b></button>
    </form>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/filter.js')}}"></script>
    <script src="{{asset('js/verifyData.js')}}"></script>
        
@endsection