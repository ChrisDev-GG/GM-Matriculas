@extends('shared')

@section('links-css')
    <link href="{{asset('css/shared-extras.css')}}" rel="stylesheet">
@endsection

@section('navigator')
        <a class="nav-link fw-bold py-1 px-0" href="/home">Inicio</a>
        <a class="nav-link fw-bold py-1 px-0" aria-current="page" href="/registros">Registros</a>
        <a class="nav-link fw-bold py-1 px-0 active" href="/matriculas">Matriculas</a>
        @auth
          @if(auth()->user()->user_type == 'administrador' || auth()->user()->user_type == 'root')
            <a class="nav-link fw-bold py-1 px-0" href="/usuarios">Usuarios</a>
          @endif
        @endauth
@endsection

@section('content')
    <section>
        <h1 class="gestion-title">Matriculas</h1>
    </section>
    <section>
      @include('Messages.users-msg')
    </section>

    <section>
        <div class="row">
            <div class="col-sm-8 home-card-mg card-home-center">
                <div class="card home-card-color">
                        <div class="card-body home-text-color">
                        <h5 class="card-title">Prestación de Servicios</h5>
                        <p class="card-text ">Generar contrato de prestacion de servicios en PDF.</p>
                        <a href="/matriculas/dpds" class="btn btn-primary home-buttons"><i>visitar</i></a>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
