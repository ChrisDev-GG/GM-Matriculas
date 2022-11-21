@extends('table-shared')

@section('links-css')
    <link href="{{asset('css/shared-extras.css')}}" rel="stylesheet">
@endsection

@section('navigator')
        <a class="nav-link fw-bold py-1 px-0" href="/home">Inicio</a>
        <a class="nav-link fw-bold py-1 px-0" href="/registros">Registros</a>
        <a class="nav-link fw-bold py-1 px-0" href="/matriculas">Matriculas</a>
        @auth
            @if(auth()->user()->user_type == 'administrador' || auth()->user()->user_type == 'root')
<a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="/usuarios">Usuarios</a>
            @endif
        @endauth
@endsection

@section('content-table')

    <h1 class="gestion-title">Gestionar Usuarios</h1>
    <section>
        @include('Messages.users-msg')
    </section>
    <div class="container-fluid table-responsive">
        <table class="table table-bordered" id="table-gestionar">
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
                    <th>{{$state}}</th>
                    @if($user->user_type != 'root')
                    <th class="table-btn d-flex justify-content-center"><a href="/usuariosdata/{{$user->id}}/edit"><button type="button" class="btn btn-warning btn-p ">Editar</button></a>  
                        <a>
                        @if($user->active && $user->user_type != 'root')
                            <form action="/usuariosdata/{{$user->id}}/deactivate" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-p">Desactivar</button></th>
                            </form>
                        @else
                            @if($user->user_type != 'root')
                                <form action="/usuariosdata/{{$user->id}}/activate" method="POST">
                                    @csrf
                                    {{-- Same name but it activates it if it`s deactivated --}}
                                    <button type="submit" class="btn btn-success btn-p">Activar</button></th>
                                </form>
                            @endif
                        @endif
                        </a>
                    @else
                        <th></th>
                    @endif
                    
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js-table')

@endsection
