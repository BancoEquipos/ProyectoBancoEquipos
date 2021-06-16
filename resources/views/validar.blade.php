<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/validar/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="/validar/jquery-ui-1.12.1.custom/jquery-ui.css">

    <link rel="stylesheet" href="/validar/estilo.css">
    <script src="/validar/solicitudes.js"></script>
    <title>Solicitudes de material</title>
    <link rel="icon" href="/validar/Imagenes/logoC3Mobile.svg">
</head>


<body>
<nav class="navbar">
    <a class="navbar-brand d-block">
        <img class="logoMovil" src="/validar/Imagenes/logoC3Mobile.svg">
    </a>
    <h3 class=" d-none d-md-block titulo mx-auto">
        Solicitudes de material
    </h3>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target=""
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation" id="botonVolver">
        <img src="/validar/Imagenes/volver.svg" class="botonVolver">
    </button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <img src="{{ $avatar }}" class="botonUsuario">
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link opcionUsuarioUno" role="button" id="cambiarCuenta">Cambiar cuenta</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link opcionUsuarioDos" style="margin-right: -17px;" role="button"
                   id="cerrarSesion">Cerrar
                    sesión</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">

    <div clas="row">
        <div class="col-3 col-md-1 divInfo">
            <img class="logoInfo" src="/validar/Imagenes/info.svg">
        </div>
        <div class="col-12 col-md-9 divInfo">
            <h3 class="h3 mb-3 fw-normal textoTitulo">Aqui podrá ver las solicitudes de material realizadas por los
                alumnos. Están ordenadas de más nuevas a más antiguas.</h3>
        </div>
    </div>
    <div class="divPrincipal d-block centrar" id="cargandoDiv">
        <img src="/validar/Imagenes/cargando.svg">
    </div>
    <div class="divPrincipal d-none" id="divPrestamos">
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Solicitudes Pendientes</a></li>
                <li><a href="#tabs-2">Solicitudes Tramitadas</a></li>
                <li><a href="#tabs-3">Solicitudes Finalizadas</a></li>
            </ul>
            <!--Primer acordeon-->
            <div id="tabs-1">
                <div id="acordeonPendientes">
                </div>
            </div>
            <!--Segundo acordeon-->
            <div id="tabs-2">
                <div id="acordeonTramitadas">
                </div>
            </div>
            <!--Tercer acordeon-->
            <div id="tabs-3">
                <div id="acordeonFinalizadas">
                </div>
            </div>
        </div>

    </div>
<input class="d-none" id="autoC" value="{{ $nombre }}">
</div>

</body>

</html>
