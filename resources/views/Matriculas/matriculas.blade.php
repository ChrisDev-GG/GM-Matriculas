@extends('shared')

@section('navigator')
        <a class="nav-link fw-bold py-1 px-0" href="/home">Inicio</a>
        <a class="nav-link fw-bold py-1 px-0" href="/registros">Registros</a>
<a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="/matriculas">Matriculas</a>
        @auth
          @if(auth()->user()->user_type == 'administrador')
            <a class="nav-link fw-bold py-1 px-0" href="/usuarios">Usuarios</a>
          @endif
        @endauth
@endsection

@section('content')
    <h1>Matriculas</h1>
    <a class="btn btn-primary" href="/matriculas/matriculaspdfweb" target="_blank" role="button">Link</a>
@endsection
