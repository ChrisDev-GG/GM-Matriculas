@extends('table-shared')

@section('links-css')
    <link href="{{asset('css/shared-extras.css')}}" rel="stylesheet">
@endsection

@section('navigator')
        <a class="nav-link fw-bold py-1 px-0" href="/home">Inicio</a>
        <a class="nav-link fw-bold py-1 px-0 active" href="/registros">Registros</a>
        <a class="nav-link fw-bold py-1 px-0" href="/matriculas">Matriculas</a>
        @auth
            @if(auth()->user()->user_type == 'administrador' || auth()->user()->user_type == 'root')
<a class="nav-link fw-bold py-1 px-0" aria-current="page" href="/usuarios">Usuarios</a>
            @endif
        @endauth
@endsection

@section('content-table')
    <h1 class="gestion-title-alumnos">Gestionar Apoderados</h1>
    <section>
        @include('Messages.users-msg')
    </section>
    <a class="btn btn-warning btn-create" href="/registros/apoderados/create"><b>Agregar nuevo apoderado</b></a>
    <a class="btn btn-primary btn-create" href="/registros/suplentes"><b>Gestionar Apoderados Suplentes</b></a><br><br>

    {{-- <form action="/registros/apoderados/search" method="POST">
        @csrf
        <div class="form-group form-pd">
            <input type="text" class="form-control form-rut" id="InputRUT" placeholder="Rut (sin puntos y con guion)" name="rut">
            <button type="submit" class="btn btn-success"><b>Buscar por Rut</b></button>
        </div>
    </form> --}}
    <div class="container-fluid table-responsive">
        <table class="table table-bordered" id="table-gestionar">
            <thead>
                <tr class="table-info">
                    <th scope="col">Nombres</th>
                    <th scope="col">Rut</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Modificar</th>
                </tr>
            </thead>    
            <tbody>          
                @foreach($apoderados as $apoderado)
                    @if($apoderado->status)
                        <tr class="bg-primary">
                    @else
                        <tr class="bg-danger">
                    @endif
                    <?php $state = $apoderado->status ? 'Activo' : 'Retirado';?>
                    <th>{{$apoderado->name}}</th>
                    <th>{{$apoderado->run}}</td>
                    <th>{{$apoderado->email}}</th>
                    <th>{{$apoderado->phone}}</th>
                    <th>{{$apoderado->address}}</th>
                    <th>{{$state}}</th>
                    <th class=""><a href="/registros/apoderados/{{$apoderado->id}}/edit"><button class="btn btn-warning btn-p btn-edit">Editar</button><br></a>
                        <a>
                            @if($apoderado->status)
                            <form action="/registros/apoderados/{{$apoderado->id}}/deactivate" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-p">Retirar</button></th>
                            </form>
                        @else
                            <form action="/registros/apoderados/{{$apoderado->id}}/activate" method="POST">
                                @csrf
                                {{-- Same name but it activates it if it`s deactivated --}}
                                <button type="submit" class="btn btn-success btn-p">Activar</button></th>
                            </form>
                        @endif
                            </a>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
