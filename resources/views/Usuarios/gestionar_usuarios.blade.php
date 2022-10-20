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
    <h1 class="gestion-title">Gestionar Usuarios</h1>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr class="table-info">
                    <th scope="col">Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Modificar</th>
                </tr>
            </thead>    
            <tbody>          
                @foreach($users as $user)
                    @if($user->active)
                        <tr class="bg-primary">
                    @else
                        <tr class="bg-danger">
                    @endif
                <?php $state = $user->active ? 'Activo' : 'Inactivo';?>
                    <th>{{$user->username}}</th>
                    <th>{{$user->name}}</th>
                    <th>{{$user->email}}</th>
                    <th>{{$state}}</td>
                    <th><a href="#"><button class="btn btn-warning btn-p">Editar</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
