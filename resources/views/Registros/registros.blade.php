@extends('shared')

@section('links-css')
    <link href="/css/shared-extras.css" rel="stylesheet">
@endsection

@section('navigator')
        <a class="nav-link fw-bold py-1 px-0" href="/home">Inicio</a>
<a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="/registros">Registros</a>
        <a class="nav-link fw-bold py-1 px-0" href="/matriculas">Matriculas</a>
        @auth
          @if(auth()->user()->user_type == 'administrador')
            <a class="nav-link fw-bold py-1 px-0" href="/usuarios">Usuarios</a>
          @endif
        @endauth
@endsection

@section('content')
    <h1 class="registros-title">Registros</h1>
    <section>
        <div class="row">
            <div class="col-sm-6 home-card-mg">
              <div class="card home-card-color">
                <div class="card-body home-text-color">
                  <h5 class="card-title">Alumnos</h5>
                  <p class="card-text">Gestionar datos de los alumnos.</p>
                  <a href="/registros/alumnos" class="btn btn-primary home-buttons"><i>visitar</i></a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 home-card-mg">
              <div class="card home-card-color">
                <div class="card-body home-text-color">
                  <h5 class="card-title">Apoderados</h5>
                  <p class="card-text">Gestionar datos de los apoderados.</p>
                  <a href="/registros/apoderados" class="btn btn-primary home-buttons"><i>visitar</i></a>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection
