@extends('shared')

@section('links-css')
    <link href="{{asset('css/shared-extras.css')}}" rel="stylesheet">
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
    <h1 class="usuarios-title">Administrar usuarios del sistema</h1>
    <section>
        <div class="row">
            <div class="col-sm-6 home-card-mg">
              <div class="card home-card-color">
                <div class="card-body home-text-color">
                  <h5 class="card-title">Datos de Usuarios</h5>
                  <p class="card-text">Agregar/admninistrar/modificar usuarios con acceso a al sistema.</p>
                  <a href="/usuariosdata" class="btn btn-primary home-buttons"><i>visitar</i></a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 home-card-mg">
              <div class="card home-card-color">
                <div class="card-body home-text-color">
                  <h5 class="card-title">Registrar Usuarios</h5>
                  <p class="card-text">Ingresar a nuevos usuarios al sistema.</p>
                  <a href="/usuariosdata/create" class="btn btn-primary home-buttons"><i>visitar</i></a>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection