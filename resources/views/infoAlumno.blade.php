<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="alumno/css/style.css">

    <title>Seccion Alumno</title>
    <link rel="icon" href="{{ asset('alumno/images/logoC3Mobile.svg') }}">
</head>
<body>
<div class="container-fluid">
    <header class="row">
        <div class="row col span12 text-center contenedorHeader">
            <div class="col-xl-5 col-lg-4 d-none d-lg-block"><img src="{{ asset('alumno/images/C3Logo.png') }}" class="imagenLogo"></div>
            <div class="col-xl-5 col-lg-4  col-md-12 d-lg-none"><img src="{{ asset('alumno/images/logoC3Mobile.svg') }}" class="imagenLogoMobile"></div>
            <div class="col-xl-7 col-lg-8  col-md-12 textoHeader">Sección de alumno</div>
        </div>
    </header>

    <div class="row">
        <div class="col-10 col-lg-4 text-center servicio row">
            <div class="col-7 textoServicio">Solicitud de prestamo de equipos informáticos</div>
            <img src="{{ asset('alumno/images/solicitudMaterial.svg') }}" class="col-4 logoServicio">
        </div>
        <div class="col-10 col-lg-4 text-center servicio row">
            <div class="col-12 textoServicio">Ejemplo de servicio</div>
        </div>

    </div>

    <div class="row">
        <div class="col-10 col-lg-4 text-center servicio row">
            <div class="col-12 textoServicio">Ejemplo de servicio</div>
        </div>
        <div class="col-10 col-lg-4 text-center servicio row">
            <div class="col-12 textoServicio">Ejemplo de servicio</div>
        </div>
    </div>

    <div class="row">
        <div class="col-10 col-lg-4 text-center servicio row">
            <div class="col-12 textoServicio">Ejemplo de servicio</div>
        </div>
        <div class="col-10 col-lg-4 text-center servicio row">
            <div class="col-12 textoServicio">Ejemplo de servicio</div>
        </div>
    </div>

    <div class="row">
        <div class="col-10 col-lg-4 text-center servicio row">
            <div class="col-12 textoServicio">Ejemplo de servicio</div>
        </div>
        <div class="col-10 col-lg-4 text-center servicio row">
            <div class="col-12 textoServicio">Ejemplo de servicio</div>
        </div>
    </div>

    <div>
        <a href="{{ url('/infoAlumno') }}">Alumno</a>
    </div>

    <div class="row">
        <div class="d-none d-sm-block col-12 text-center footer">Carlos 3 Cartagena</div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>
