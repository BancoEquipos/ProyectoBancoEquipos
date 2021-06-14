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
    <link rel="stylesheet" href="/logOutError/estilo.css">
    <script src="/logOutError/eventosDiv.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>C3App Logout Error</title>
    <link rel="icon" href="/logOutError/Imagenes/logoC3Mobile.svg">
</head>

<body>
<div class="container">
    <div class="row divInfo col-12">
        <div class="col-12">
            <img src="/logOutError/Imagenes/logoC3Mobile.svg" class="logoMovil">
        </div>
        <div class="col-12">
            <h1 class="tituloApp">C3App Error</h1>
        </div>
    </div>
    <div class="row bordePrincipal">
        <div class="col-9 contenedorHeader">
            <img src="/logOutError/Imagenes/info.svg" class="infoLogo">
            <h4 class="tituloTexto">No puedes cerrar sesión sin haberla iniciado antes. Recuerda usar tu correo murciaeduca</h4>
        </div>

        <div class="col-12 text-center botonDiv">
            <button class="botonLogin" type="submit" id="botonLogin">Login mediante Google
                <img id="loginImagen" src="/logOutError/Imagenes/login.svg" class="login">
                <img id="loginImagenBlanco" src="/logOutError/Imagenes/loginBlanco.svg" class="login d-none">
            </button>
        </div>
    </div>
</div>
</body>

</html>
