<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario solicitud de material</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <script type="text/javascript" src="material.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/pselect.js@4.0.1/dist/pselect.min.js"></script>



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="material.css" rel="stylesheet">
    <title>Solicitud de material</title>
    <link rel="icon" href="Imagenes/logoC3Mobile.svg">
</head>

<body>

<div class="container">
    <header class="row">
        <div class="row col span12 text-center contenedorHeader">
            <div class="col-xl-5 col-lg-4 d-none d-lg-block"><img src="Imagenes/C3Logo.png" class="imagenLogo">
            </div>
            <div class="col-xl-5 col-lg-4  col-md-12 d-lg-none"><img src="Imagenes/logoC3Mobile.svg"
                                                                     class="imagenLogoMobile"></div>
            <div class="col-xl-7 col-lg-8  col-md-12 textoHeader">
                <div class="col-12 textoSeccion">
                    Solicitud de prestamo de material
                </div>
                <div class="row ">
                    <div class="col-12 botonDiv">
                        <button class=" btn boton btn-primary float-left" type="submit" id="botonVolver">Volver</button>

                    </div>
                </div>

            </div>
        </div>
    </header>

    <h1 class="h3 mb-3 fw-normal">Registre todos los datos para poder enviar la solicitud</h1>

    <!--Nombre, apellidos y tlf-->
    <div class="row">
        <div class="form-floating separador col-12 col-lg-4">
            <input class="form-control" type="text" name="nombre" id="nombre"
                   title="Introduce tu nombre completo, no uses caracteres especiales ni numeros" placeholder="Nombre">
            <label for="floatingInput" class="etiquetaCampo" class="etiquetaCampo" class="etiquetaCampo"
                   class="etiquetaCampo">Nombre</label>
            <div class="mensajeOculto" id="nombreError">
                El nombre indicado no es valido. Comprueba que no tenga numeros ni carecteres especiales.
            </div>
        </div>

        <div class="form-floating separador col-12 col-lg-4">
            <input class="form-control" type="text" name="apellidos" id="apellidos"
                   title="Introduce tus apellidos, no uses caracteres especiales ni numeros" placeholder="Apellidos" />
            <label for="floatingInput" class="etiquetaCampo" class="etiquetaCampo" class="etiquetaCampo">Apellidos</label>
            <div class="mensajeOculto" id="apellidosError">
                El/los apellidos indicados no son validos. Comprueba que no tengan numeros ni carecteres especiales.
            </div>
        </div>



        <div class="form-floating separador col-12 col-lg-4">
            <input class="form-control" name="telefono" type="text" id="telefono" maxlength="9"
                   title="Introduce tu telefono movil." placeholder="Telefono*" />
            <label for="floatingInput" class="etiquetaCampo" class="etiquetaCampo" class="etiquetaCampo">Teléfono</label>
            <div class="mensajeOculto" id="telefonoError">
                El telefono introducido no es valido. Solo se permiten 9 digitos, sin espacios ni caracteres especiales.
            </div>
        </div>
    </div>

    <!--Provincia, municipio y domicilio-->
    <div class="row">
        <div class="form-floating separador col-12 col-lg-4">
            <select class="form-select centradoSelect" id="ps-prov">
                <option selected>Seleccione su provincia</option>
            </select>
        </div>

        <div class="form-floating separador col-12 col-lg-4">
            <select class="form-select centradoSelect" id="ps-mun">
                <option selected>Seleccione su municipio</option>
            </select>
        </div>

        <div class="form-floating separador col-12 col-lg-4">
            <input class="form-control" type="text" name="domicilio" id="domicilio" title="" placeholder="Domicilio">
            <label for="floatingInput" class="etiquetaCampo" >Domicilio</label>
        </div>

    </div>


    <div class="row">
        <div class="form-floating separador col-12 col-lg-4">
            <input class="form-control" name="email" type="text" id="email" title="Introduce tu e-mail."
                   placeholder="Email*" />
            <label for="floatingInput" class="etiquetaCampo" class="etiquetaCampo" class="etiquetaCampo">E-mail</label>
            <div class="mensajeOculto" id="emailError">
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
            <select class="form-select centradoSelect" aria-label="Default select example" id="provinciaSelect" disabled>
                <option selected>Seleccione el grado que esté cursando</option>
            </select>
        </div>
    </div>


    <div class="row">
        <div class="form-floating separador col-12 col-lg-4">
            <select class="form-select centradoSelect" aria-label="Default select example" id="cursoSelect">
                <option selected>Seleccione su curso</option>
                <option value="primero">Primero</option>
                <option value="segundo">Segundo</option>
            </select>
        </div>

        <div class="form-floating separador col-12 col-lg-4">
            <input class="form-control" type="text" name="motivo" id="motivo" title="" placeholder="Motivo de la solicitud">
            <label for="floatingInput" class="etiquetaCampo">Motivo de la solicitud</label>
        </div>


        <div class="form-floating separador col-12 col-lg-4">
            <select class="form-select centradoSelect" aria-label="Default select example" id="materialSelect">
                <option selected>Seleccione el equipamiento solicitado</option>
                <option value="primero">Primero</option>
                <option value="segundo">Segundo</option>
            </select>
        </div>
    </div>


    <div class="row">
        <div class="col-12 col-md-12 enviarDiv">
            <button class=" btn boton btn-primary float-right" type="submit">Enviar</button>
        </div>
    </div>
</div>
</body>

</html>
