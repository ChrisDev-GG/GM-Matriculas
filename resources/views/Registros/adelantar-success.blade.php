@extends('shared-min')

@section('links-min-css')
    <!-- Custom styles for this template -->
    <link href="{{asset('css/modals.css')}}" rel="stylesheet">
    <link href="{{asset('css/shared-min.css')}}" rel="stylesheet">
@endsection

@section('content-min')

</head>
<body>

<div class="modal modal-sheet position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSheet">
    <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
        <div class="modal-header border-bottom-0">
            <h1 class="modal-title fs-5">Año escolar modificado</h1>
        </div>
        <div class="modal-body py-0">
            <p class="modal-title">Año escolar adelantado correctamente, puede continuar en la sección de alumnos, o volver al inicio</p>
        </div>
        <div class="modal-footer flex-column border-top-0">
            <a href="/home" class="btn btn-lg btn-primary w-100 mx-0 mb-2"><i>Ir al inicio</i></a>
            <a href="/registros/alumnos" type="button" class="btn btn-lg btn-light w-100 mx-0"><i>Gestionar alumnos</i></a>
        </div>
    </div>
    </div>
</div>

@endsection