<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matricula-PDF</title>
    <link href="{{public_path('css/sharedpdf.css')}}" rel="stylesheet">          
</head>
<body>
    <img class="logo" src="{{public_path('img/gm-logo2.jpg')}}" width="90px" height="50px">
    @yield('pdf')
    <img class="timbre" src="{{public_path('img/firma-gm.png')}}" width="130px" height="130px">
</body>
</html>