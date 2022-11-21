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
    <h1 class="gestion-title-alumnos">Gestionar Suplentes</h1>
    <section>
      @include('Messages.users-msg')
    </section>
    <a class="btn btn-warning btn-create" href="/registros/suplentes/create"><b>Agregar nuevo apoderado suplente</b></a><br><br>

    {{-- <form action="/registros/suplentes/search" method="POST">
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Rut</th>
                    <th scope="col">Suplente de:</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Modificar</th>
                </tr>
            </thead>    
            <tbody>          
                @foreach($suplentes as $suplente)
                    @if($suplente->status)
                        <tr class="bg-primary">
                    @else
                        <tr class="bg-danger">
                    @endif
                    <?php $state = $suplente->status ? 'Activo' : 'Retirado';?>
                    <th>{{$suplente->name}}</th>
                    <th>{{$suplente->run}}</td>
                    <th>{{$suplente->apoderado_name ?? "---"}}</th>
                    <th>{{$suplente->email ?? ""}}</th>
                    <th>{{$suplente->phone ?? ""}}</th>
                    <th>{{$suplente->address ?? ""}}</th>
                    <th>{{$state ?? "---"}}</th>
                    <th><a href="/registros/suplentes/{{$suplente->id}}/edit"><button class="btn btn-warning btn-p btn-suplentes">Editar</button></a>
                    <a>
                        @if($suplente->status)
                            <form action="/registros/suplentes/{{$suplente->id}}/deactivate" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-p">Retirar</button></th>
                            </form>
                        @else
                            <form action="/registros/suplentes/{{$suplente->id}}/activate" method="POST">
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
