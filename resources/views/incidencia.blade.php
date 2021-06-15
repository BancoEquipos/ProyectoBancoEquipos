<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Incidencias al rmi</title>
  <link rel="icon" href="/incidencia/Imagenes/logoC3Mobile.svg">

  <!--Jquery y Bootstraps-->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
  <script src="https://smtpjs.com/v3/smtp.js"></script>

  <!--Librerias JS-->
  <link href="/incidencia/assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <!--Mi css y script-->
  <link href="/incidencia/incidencias.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar">
    <a class="navbar-brand d-block">
      <img class="logoMovil" src="/incidencia/Imagenes/logoC3Mobile.svg">
    </a>
    <h3 class=" d-none d-md-block titulo mx-auto">
      Incidencias al RMI
    </h3>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target=""
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation" id="botonVolver">
      <img src="/incidencia/Imagenes/volver.svg" class="botonVolver">
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
          <a class="nav-link opcionUsuarioDos" style="margin-right: -17px;" role="button" id="cerrarSesion">Cerrar
            sesión</a>
        </li>
      </ul>
    </div>
  </nav>


  <div class="container-fluid">
    <div class="main">

      <div clas="row">
        <div class="col-3 col-md-1 divInfo">
          <img class="logoInfo" src="/incidencia/Imagenes/info.svg">
        </div>
        <div class="col-12 col-md-9 divInfo">
          <h3 class="h3 mb-3 fw-normal textoTitulo">Rellene todos los datos para poder enviar la incidencia.</h3>
        </div>
      </div>

      <!--Nombre y e-mail-->
      <div class="row">
        <div class="form-floating separador col-12 col-lg-6">
          <input class="form-control" type="text" name="nombre" id="nombre"
            title="Introduce tu nombre completo, no uses caracteres especiales ni numeros" placeholder="Nombre" value=" {{ $nombre }}">
          <label for="floatingInput" class="etiquetaCampo">Nombre</label>
          <div class="mensajeOculto" id="nombreError">
            El nombre indicado no es valido. Comprueba que no tenga numeros ni carecteres especiales.
          </div>
        </div>

        <div class="form-floating separador col-12 col-lg-6">
          <input class="form-control" name="email" type="text" id="email" title="Introduce tu e-mail."
            placeholder="Email*" value="{{ $email }}" />
          <label for="floatingInput" class="etiquetaCampo">E-mail</label>
          <div class=" mensajeOculto" id="emailError">
            Email introducido no valido. El email debe ser tipo "ejemplo@example.es". Se recomienda usar su correo de
            murciaeduca "NRE@alu.murciaeduca.es".
          </div>
        </div>

        <div class="form-floating separador col-12 col-lg-6">
          <select class="form-select" id="tipoIncidencia" aria-label="Floating label select example">
            <option value="Defecto" selected>Seleccione el tipo de inciencia</option>
          </select>
          <label for="tipoIncidencia" class="selectLabel">Tipo de incidencia</label>
        </div>

        <div class="form-floating separador col-12 col-lg-3">
          <div class="row divCamara" id="botonCamara" role="button">
            <div class="col-8">
              <p class="d-none d-md-block letrasFotoGrande">Agrege un archivo</p>
              <p class="d-block d-md-none letrasFotoGrande">Agrege una foto</p>
            </div>
            <div class="col-2"><img class="logoFoto" for="archivo" src="/incidencia/Imagenes/camara.svg" /></div>
          </div>
          <input style="display: none;" type="file" capture="camera" id="archivo">
        </div>
        <div class="form-floating separador col-12 col-lg-2">
          <input class="form-check checkbox" type="checkbox" value="" id="urgente" title="¿Es muy urgente?">
          <label class="form-floating-check checkboxTexto" for="urgente">¿Es muy urgente?</label>
        </div>

        <div class="form-floating separador col-12">
          <textarea class="form-control tamInicial" name="email" type="text" id="descripcion"
            title="Introduce tu e-mail." placeholder="Descripcion de la incidencia"></textarea>
          <label for="floatingInput" class="etiquetaCampo">Descripci&oacute;n de la incidencia</label>
        </div>


        <div class="col-12 enviarDiv">

          <form method="post">
            <input class="d-block btn botonEnviar btn-primary" type="button" id="botonInfo"
              value="Rellene todos los datos" />
            <input class="d-none btn boton btn-primary" type="button" value="Enviar e-mail al RMI" id="botonEmail"
              onclick="sendEmail()" />
          </form>

        </div>
      </div>
    </div>

    <script type="text/javascript" src="/incidencia/incidencias.js" defer></script>
    <script type="text/javascript" src="/incidencia/datos.js" defer></script>
    <script type="text/javascript" src="/incidencia/email.js" defer></script>
  </div>
</body>

</html>
