@extends('shared')

@section('navigator')
        <a class="nav-link fw-bold py-1 px-0" href="/home">Inicio</a>
<a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="/registros">Registros</a>
        <a class="nav-link fw-bold py-1 px-0" href="/matriculas">Matriculas</a>
        @auth
          @if(auth()->user()->user_type == 'administrador' || auth()->user()->user_type == 'root')
            <a class="nav-link fw-bold py-1 px-0" href="/usuarios">Usuarios</a>
          @endif
        @endauth
@endsection

@section('content')
    <h1>Alumnos</h1>

@endsection
