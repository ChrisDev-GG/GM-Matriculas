@extends('shared')

@section('links-css')
    <link href="/css/home.css" rel="stylesheet">
@endsection

@section('navigator')
<a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="/">Inicio</a>
        <a class="nav-link fw-bold py-1 px-0" href="/registros">Registros</a>
        <a class="nav-link fw-bold py-1 px-0" href="/matriculas">Matriculas</a>
        <a class="nav-link fw-bold py-1 px-0" href="/usuarios">Usuarios</a>
@endsection

@section('content')
    <section>
        <h1 class="home-title">Bienvenido</h1>
    </section>

    <section>
        <div class="row">
            <div class="col-sm-6 home-card-mg">
              <div class="card home-card-color">
                <div class="card-body home-text-color">
                  <h5 class="card-title">Matriculas</h5>
                  <p class="card-text">Administrador web del proceso de matriculas.</p>
                  <a href="/matriculas" class="btn btn-primary home-buttons"><i>visitar</i></a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 home-card-mg">
              <div class="card home-card-color">
                <div class="card-body home-text-color">
                  <h5 class="card-title">Usuarios</h5>
                  <p class="card-text">Administrar datos de los usuarios con acceso a al sistema.</p>
                  <a href="/usuarios" class="btn btn-primary home-buttons"><i>visitar</i></a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 home-card-mg">
                <div class="card home-card-color">
                  <div class="card-body home-text-color">
                    <h5 class="card-title">Alumnos</h5>
                    <p class="card-text">Administrar datos de los alumnos actualmente inscritos.</p>
                    <a href="/registros/alumnos" class="btn btn-primary home-buttons"><i>visitar</i></a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 home-card-mg">
                <div class="card home-card-color">
                  <div class="card-body home-text-color">
                    <h5 class="card-title">Apoderados</h5>
                    <p class="card-text ">Administrar datos de los apoderados registrados.</p>
                    <a href="/registros/apoderados" class="btn btn-primary home-buttons"><i>visitar</i></a>
                  </div>
                </div>
              </div>
          </div>
    </section>
@endsection
