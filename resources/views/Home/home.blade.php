@extends('shared')

@section('links-css')
    <link href="{{asset('css/shared-extras.css')}}" rel="stylesheet">
@endsection

@section('navigator')
<a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="/home">Inicio</a>
        <a class="nav-link fw-bold py-1 px-0" href="/registros">Registros</a>
        <a class="nav-link fw-bold py-1 px-0" href="/matriculas">Matriculas</a>
        @auth
          @if(auth()->user()->user_type == 'administrador' || auth()->user()->user_type == 'root')
            <a class="nav-link fw-bold py-1 px-0" href="/usuarios">Usuarios</a>
          @endif
        @endauth
@endsection

@section('content')
    <section>
        <h1 class="home-title">Bienvenido/a &nbsp;{{auth()->user()->username}}</h1>
    </section>
    <section>
      @include('Messages.users-msg')
    </section>

    <section>
        <div class="row">
          @auth
            @if(auth()->user()->user_type == 'usuario')
              <div class="col-sm-6 home-card-mg card-home-center-user">
                <div class="card home-card-color">
                  <div class="card-body home-text-color">
                    <h5 class="card-title">Matriculas</h5>
                    <p class="card-text">Administrador web del proceso de matriculas.</p>
                    <a href="/matriculas" class="btn btn-primary home-buttons"><i>visitar</i></a>
                  </div>
                </div>
              </div>
            @endif
            @if(auth()->user()->user_type == 'administrador' || auth()->user()->user_type == 'root')
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
                    <p class="card-text">Administrar datos de los alumnos registrados en el sistema.</p>
                    <a href="/usuarios" class="btn btn-primary home-buttons"><i>visitar</i></a>
                  </div>
                </div>
              </div>
            @endif
          @endauth
            
              <div class="col-sm-8 home-card-mg card-home-center">
                <div class="card home-card-color">
                  <div class="card-body home-text-color">
                    <h5 class="card-title">Alumnos / Apoderados</h5>
                    <p class="card-text ">Administrar datos de los alumnos/apoderados registrados en el sistema.</p>
                    <a href="/registros" class="btn btn-primary home-buttons"><i>visitar</i></a>
                  </div>
                </div>
              </div>
          </div>

    </section>
@endsection
