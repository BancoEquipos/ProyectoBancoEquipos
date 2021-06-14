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
    <link rel="stylesheet" href="/profesor/estilo.css">
    <script src="/profesor/eventosDiv.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sección Profesor</title>
    <link rel="icon" href="/profesor/Imagenes/logoC3Mobile.svg">
</head>


<body>
<nav class="navbar">
    <a class="navbar-brand d-block prueba">
        <img class="logoMovil" src="/profesor/Imagenes/logoC3Mobile.svg">
    </a>
    <h3 class=" d-block titulo mx-auto">
        Sección de profesor
    </h3>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <img src="{{ $avatar }}" width="50" height="50">
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link opcionUsuarioUno" role="button" id="cambiarCuenta">Cambiar cuenta</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link opcionUsuarioDos" style="margin-right: -17px;" role="button"
                   id="cerrarSesion">Cerrar sesión</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid separador">
    <div class="row contenedorClase">

        <!--Div con informacion del usuario-->
        <div class="row divInfo col-12 col-lg-4">
            <div class="col-9 divInformacion">
                <img src="/profesor/Imagenes/info.svg" class="infoLogo">
                <h5 class="tituloInformativo">Bienvenido a C3App. Aquí encontrarás una serie de servicios que se
                    ofrecen a los profesores del instituto Carlos III</h5>
            </div>
            <div class="col-9 divInfoUsuario">
                <h4 class="tituloUsuario">Información del usuario</h4>
                <table class="tablaUsuario">
                    <tr>
                        <td>Nombre:<br>{{ $userName }} </td>
                    </tr>

                    <tr>
                        <td>NRE:<br>{{ $nre }}</td>
                    </tr>

                    <tr>
                        <td>E-mail:<br>{{ $email }}</td>
                    </tr>
                    <tr>
                        <td>Última conexión:<br>{{ $lastLog }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!--Divs de los distintos servicios-->
        <div class="row divServicios separador col-12 col-lg-7 ">
            <!--Servicio Uno-->
            <div class="row col-12 servicioUno" role="button" id="servicioUno">
                <div class="col-4 col-md-6 textoServicio">
                    <h2 class="tituloServicio">Incidencias al RMI</h2>
                </div>
                <div class="col-4 logoServicio">
                    <img id="servicioUnoImagen" src="/profesor/Imagenes/incidencias.svg" class="prestamoLogo">
                    <img id="servicioUnoImagenBlanco" src="/profesor/Imagenes/incidenciasBlanco.svg"
                         class="prestamoLogo d-none">
                </div>
            </div>

            <!--Servicio Dos-->
            <div class="row col-12 servicioDos" role="button" id="servicioDos">
                <div class="col-4 col-md-6 textoServicio">
                    <h2 class="tituloServicio">Administar solicitudes de prestamo de material</h2>
                </div>
                <div class="col-4 logoServicio">
                    <img id="servicioDosImagen" src="/profesor/Imagenes/prestamoEquipos.svg" class="prestamoLogo">
                    <img id="servicioDosImagenBlanco" src="/profesor/Imagenes/prestamoEquiposBlanco.svg"
                         class="prestamoLogo d-none">
                </div>
            </div>

            <!--Servicio Tres-->
            <div class="row col-12 servicioTres" role="button" id="servicioTres">
                <div class="col-4 col-md-6 textoServicio">
                    <h2 class="tituloServicio">Servicio en desarrollo</h2>
                </div>
                <div class="col-4 logoServicio">
                    <img id="servicioTresImagen" src="/profesor/Imagenes/enConstrucion.svg" class="prestamoLogo">
                    <img id="servicioTresImagenBlanco" src="/profesor/Imagenes/enConstrucionBlanco.svg"
                         class="prestamoLogo d-none">
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
