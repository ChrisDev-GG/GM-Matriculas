@extends('shared')

@section('navigator')
        <a class="nav-link fw-bold py-1 px-0" href="/">Inicio</a>
        <a class="nav-link fw-bold py-1 px-0" href="/registros">Registros</a>
        <a class="nav-link fw-bold py-1 px-0" href="/matriculas">Matriculas</a>
<a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="/usuarios">Usuarios</a>
@endsection

@section('content')
    <h1>Usuarios</h1>

@endsection

