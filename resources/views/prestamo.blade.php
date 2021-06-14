<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario solicitud de material</title>
    <link rel="icon" href="/prestamo/Imagenes/logoC3Mobile.svg">

    <!--Jquery y Bootstraps-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

    <!--Librerias JS-->
    <script src="https://cdn.jsdelivr.net/npm/pselect.js@4.0.1/dist/pselect.min.js"></script>
    <link rel="stylesheet" href="/prestamo/virtual-select-master/dist/virtual-select.min.css" />
    <script src="/prestamo/virtual-select-master/dist/virtual-select.min.js"></script>
    <link href="/prestamo/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--Mi css y script-->
    <script type="text/javascript" src="/prestamo/material.js" defer></script>
    <script type="text/javascript" src="/prestamo/datos.js" defer></script>
    <link href="/prestamo/material.css" rel="stylesheet">
</head>

<body>

<nav class="navbar">
    <a class="navbar-brand d-block">
        <img class="logoMovil" src="/prestamo/Imagenes/logoC3Mobile.svg">
    </a>
    <h3 class=" d-none d-md-block titulo mx-auto">
        Solicitud de material
    </h3>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target=""
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation" id="botonVolver">
        <img src="/prestamo/Imagenes/volver.svg" class="botonVolver">
    </button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <img src="/prestamo/Imagenes/logoUsuario.svg" class="botonUsuario">
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
                <img class="logoInfo" src="/prestamo/Imagenes/info.svg">
            </div>
            <div class="col-12 col-md-9 divInfo">
                <h3 class="h3 mb-3 fw-normal textoTitulo">Registre todos los datos para poder enviar la solicitud</h3>
            </div>
        </div>

        <!--Nombre, apellidos y tlf-->
        <div class="row">
            <div class="form-floating separador col-12 col-lg-4">
                <input class="form-control" type="text" name="nombre" id="nombre"
                       title="Introduce tu nombre completo, no uses caracteres especiales ni numeros" placeholder="Nombre">
                <label for="floatingInput" class="etiquetaCampo">Nombre</label>
                <div class="mensajeOculto" id="nombreError">
                    El nombre indicado no es valido. Comprueba que no tenga numeros ni carecteres especiales.
                </div>
            </div>

            <div class="form-floating separador col-12 col-lg-4">
                <input class="form-control" type="text" name="apellidos" id="apellidos"
                       title="Introduce tus apellidos, no uses caracteres especiales ni numeros" placeholder="Apellidos" />
                <label for="floatingInput" class="etiquetaCampo">Apellidos</label>
                <div class="mensajeOculto" id="apellidosError">
                    El/los apellidos indicados no son validos. Comprueba que no tengan numeros ni carecteres especiales.
                </div>
            </div>

            <div class="form-floating separador col-12 col-lg-4">
                <input class="form-control" name="telefono" type="text" id="telefono" maxlength="9"
                       title="Introduce tu telefono movil." placeholder="Telefono*" />
                <label for="floatingInput" class="etiquetaCampo">Teléfono</label>
                <div class="mensajeOculto" id="telefonoError">
                    El telefono introducido no es valido. Solo se permiten 9 digitos, sin espacios ni caracteres especiales.
                </div>
            </div>
        </div>

        <!--Provincia, municipio y domicilio-->
        <div class="row">
            <div class="form-floating separador col-12 col-lg-4">
                <select class="form-select" id="ps-prov" aria-label="Floating label select example">
                    <option value="Defecto" selected>Seleccione su Provincia</option>
                </select>
                <label for="tipoIncidencia" class="selectLabel">Provincia</label>
            </div>

            <div class="form-floating separador col-12 col-lg-4">
                <select class="form-select" id="ps-mun" aria-label="Floating label select example">
                    <option value="Defecto" selected>Seleccione su municipio</option>
                </select>
                <label for="tipoIncidencia" class="selectLabel">Municipio</label>
            </div>

            <div class="form-floating separador col-12 col-lg-4">
                <input class="form-control" type="text" id="domicilio" placeholder="domicilio">
                <label for="floatingInput" class="etiquetaCampo">Domicilio</label>
            </div>
        </div>


        <div class="row">
            <div class="form-floating separador col-12 col-lg-4">
                <input class="form-control" name="email" type="text" id="email" title="Introduce tu e-mail."
                       placeholder="Email*" />
                <label for="floatingInput" class="etiquetaCampo">E-mail</label>
                <div class=" mensajeOculto" id="emailError">
                    Email introducido no valido. El email debe ser tipo "ejemplo@example.es". Se recomienda usar su correo de
                    murciaeduca "NRE@alu.murciaeduca.es".
                </div>
            </div>



            <div class="form-floating separador col-12 col-lg-4">
                <input class="form-control" name="nif" type="text" id="nif"
                       title="Introduce tu DNI completo, con su letra en mayuscula. Este debe ser tu DNI real, se comprobara antes de poder enviar la solicitud"
                       placeholder="DNI con letra*" />
                <label for="floatingInput" class="etiquetaCampo" class="etiquetaCampo" class="etiquetaCampo">DNI</label>
                <div class="mensajeOculto" id="nifError">
                    El DNI especificado no es valido (8 digitos, con su letra), o la letra no coincide con los digitos
                    introducidos. Por favor, compruebe el DNI introducido.
                </div>
            </div>


            <div class="form-floating separador col-12 col-lg-4">
                <input class="form-control" name="telefono" type="text" id="nre" title="Introduce tu NRE." placeholder="NRE" />
                <label for="floatingInput" class="etiquetaCampo">NRE</label>
            </div>


            <div class="form-floating separador col-12 col-lg-6">
                <select class="form-select" id="gradoSelect" aria-label="Floating label select example">
                    <option value="Defecto" selected>Seleccione su grado</option>
                </select>
                <label for="tipoIncidencia" class="selectLabel">Seleccione el grado que esté cursando</label>
            </div>

            <div class="col-12 col-lg-6 form-floating separador" id="equipamientoSolicitado">
            </div>

            <div class="form-floating separador col-12 col-lg-6">
                <select class="form-select" id="cursoSelect" aria-label="Floating label select example">
                    <option value="Defecto" selected>Seleccione su curso</option>
                    <option value="primero">Primero</option>
                    <option value="segundo">Segundo</option>
                </select>
                <label for="tipoIncidencia" class="selectLabel">Seleccione su curso</label>
            </div>


            <div class="form-floating separador col-12 col-lg-6">
                <select class="form-select" id="motivoSelect" aria-label="Floating label select example">
                    <option value="Defecto" selected>Seleccione el motivo de la solicitud</option>
                </select>
                <label for="tipoIncidencia" class="selectLabel">Seleccione el motivo de su solicitud</label>
            </div>

            <div class="form-floating separadorMotivo col-12 oculto" id="otroMotivoDiv">
                <input class="form-control" type="text" id="motivo"
                       title="Introduce el motivo, no uses caracteres especiales ni numeros" placeholder="Nombre">
                <label for="floatingInput" class="etiquetaCampoMotivo">Otro motivo</label>
                <div class="mensajeOculto" id="motivoError">
                    El motivo indicado no es valido. Comprueba que no tenga numeros ni carecteres especiales.
                </div>
            </div>

            <div class="col-12 enviarDiv">
                <input type="button" class=" btn botonEnviar btn-primary" type="submit" id="enviar" value="Enviar">
            </div>
        </div>
    </div>
</div>
</body>

</html>
