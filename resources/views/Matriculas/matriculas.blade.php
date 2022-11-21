@extends('shared')

@section('links-css')
    <link href="{{asset('css/shared-extras.css')}}" rel="stylesheet">
@endsection

@section('navigator')
        <a class="nav-link fw-bold py-1 px-0" href="/home">Inicio</a>
        <a class="nav-link fw-bold py-1 px-0" href="/registros">Registros</a>
<a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="/matriculas">Matriculas</a>
        @auth
          @if(auth()->user()->user_type == 'administrador' || auth()->user()->user_type == 'root')
            <a class="nav-link fw-bold py-1 px-0" href="/usuarios">Usuarios</a>
          @endif
        @endauth
@endsection

@section('content')
    <h1 class="matricula-title">Matriculas</h1>

    <form action="/matriculas/matriculaspdfweb" method="GET" id="target" target="_blank">
      <div id="hideApoderados">
      <div class="form-group form-pd">
        
          <label for="select-run1">Rut Apoderado *</label>
          <div class="form-group form-pd">
              <input type="text" class="form-control form-rut" placeholder="Rut (sin puntos y con guion)" id="search1">
              <button type="button" class="btn btn-success"  onclick="filterone();"><b>Buscar</b></button>
              <button type="button" class="btn btn-primary"  id="btnApoderadoHide"><b>Buscar Suplente</b></button>
          </div>
          <select class="form-select" title="Apoderados" name="rut_apoderado" id="select-run1">
              <option value=""> </option>
              @foreach($apoderados as $apoderado)
                  <option value="{{$apoderado->id}}">{{$apoderado->run}} - {{$apoderado->name}}</option>
              @endforeach
          </select><br>

      </div>
      <div class="form-group form-pd">
        <label for="select-run2">Rut Alumno *</label>
        <div class="form-group form-pd">
            <input type="text" class="form-control form-rut" placeholder="Rut (sin puntos y con guion)" id="search2">
            <button type="button" class="btn btn-success" onclick="filtertwo();"><b>Buscar</b></button>
        </div>
        <select class="form-select" title="Apoderados" name="rut_alumno" id="select-run2">
            <option value=""> </option>
            @foreach($alumnos as $alumno)
                <option value="{{$alumno->id}}">{{$alumno->run}}-{{$alumno->digit_run}} - {{$alumno->names}}</option>
            @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-warning submit-pd" id="send"><b>Generar PDF</b></button>
      @include('Messages.matriculas-msg')
    </div>
    </form>

    <form action="/matriculas/matriculaspdfwebsuplente" method="GET" id="target2" target="_blank">
    <div id="hideSuplentes">
        <div class="form-group form-pd">
      
          <label for="select-run1">Rut Suplente *</label>
          <div class="form-group form-pd">
              <input type="text" class="form-control form-rut" placeholder="Rut (sin puntos y con guion)" id="search3">
              <button type="button" class="btn btn-success"  onclick="filterthree();"><b>Buscar</b></button>
              <button type="button" class="btn btn-primary"  id="btnSuplenteHide"><b>Buscar Apoderado</b></button>
          </div>
          <select class="form-select" title="Suplentes" name="rut_suplente" id="select-run3">
            <option value=""> </option>
            @foreach($suplentes as $suplente)
                <option value="{{$suplente->id}}">{{$suplente->run}} - {{$suplente->name}}</option>
            @endforeach
          </select><br>
        </div>

      
      <div class="form-group form-pd">
        <label for="select-run2">Rut Alumno *</label>
        <div class="form-group form-pd">
            <input type="text" class="form-control form-rut" placeholder="Rut (sin puntos y con guion)" id="search4">
            <button type="button" class="btn btn-success" onclick="filterfour();"><b>Buscar</b></button>
        </div>
        <select class="form-select" title="Apoderados" name="rut_alumno" id="select-run4">
            <option value=""> </option>
            @foreach($alumnos as $alumno)
                <option value="{{$alumno->id}}">{{$alumno->run}}-{{$alumno->digit_run}} - {{$alumno->names}}</option>
            @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-warning submit-pd" id="send2"><b>Generar PDF</b></button>
      @include('Messages.matriculas-msg')
    </div>
    </form>

@endsection

@section('js')
  <script src="{{asset('js/filterMtr.js')}}"></script>
  <script src="{{asset('js/hider.js')}}"></script>
@endsection
{{--     <a class="btn btn-primary" href="/matriculas/matriculaspdfweb" target="_blank" role="button">Link</a>
@endsection --}}
