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
    <h1 class="gestion-title">Gestionar Alumnos</h1>
    <section>
        @include('Messages.users-msg')
    </section>
    <a class="btn btn-warning btn-create" href="/registros/alumnos/create"><b>Agregar nuevo alumno</b></a>
    <a class="btn btn-primary btn-create" href="/registros/alumnos-data"><b>Datos Personales</b></a>&nbsp;&nbsp;&nbsp;
    @if(auth()->user()->user_type == 'administrador' || auth()->user()->user_type == 'root')
        <a class="btn btn-danger btn-create" href="/registros/advance"><b>Adelantar año</b></a>
        <a class="btn btn-danger btn-create" href="/registros/setback"><b>Atrasar año</b></a>    
    @endif
    <br><br>

    {{-- <form action="/registros/alumnos/search" method="POST">
        @csrf
        <div class="form-group form-pd">
            <input type="text" class="form-control form-rut" id="InputRUT" placeholder="Rut (sin puntos y con guion)" name="rut">
            <button type="submit" class="btn btn-success"><b>Buscar por Rut</b></button>
        </div>
    </form> --}}
    <div class="container-fluid table-responsive tb-pd">
        <table class="table table-bordered" id="table-gestionar">

            <thead>
                <tr class="table-info">
                    <th scope="col">Nombres</th>
                    <th scope="col">A. Paterno</th>
                    <th scope="col">A. Materno</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Rut</th>
                    <th scope="col">Apoderado</th>
                    {{-- <th scope="col">Email</th>
                    <th scope="col">Telefono</th> --}}
                    <th scope="col">Estado</th>
                    <th scope="col">Modificar</th>
                </tr>
            </thead>    
            <tbody>          
                @foreach($alumnos as $alumno)
                    @if($alumno->status)
                        <tr class="bg-primary table-alumnos">
                    @else
                        <tr class="bg-danger table-alumnos" >
                    @endif
                    @php 
                        $state = $alumno->status ? 'M' : 'R';
                    @endphp
                    <th class="tb-name">{{$alumno->names}}</th>
                    <th>{{$alumno->paternal_surename}}</th> 
                    <th>{{$alumno->maternal_surename}}</th>
                    <th>{{$alumno->grade}}</th>
                    <th>{{$alumno->run}}</th>
                    <th>{{$alumno->id_apoderado}}</th>
                    {{-- <th>{{$alumno->email}}</th>
                    <th>{{$alumno->phone}}</th> --}}
                    <th>{{$state}}</th>
                    <th class="table-btn btn-alumnos"><a href="/registros/alumnos/{{$alumno->id}}/edit"><button class="btn btn-warning btn-p">Editar</button></a>
                        <a>
                    @if($alumno->status)
                        <form action="/registros/alumnos/{{$alumno->id}}/deactivate" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-p">Retirar</button></th>
                        </form>
                    @else
                        <form action="/registros/alumnos/{{$alumno->id}}/activate" method="POST">
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
