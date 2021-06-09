$(document).ready(function () {

    //Comprobar campos vacios/nulos
    function todoRellenado() {
        $(':input').each(function () {

            if ($(this).val() == "" || $(this).val() == null || $(this).val() == "default") {
                $('#errores').html('Rellena todos los campos correctamente para poder enviar la solicitud.')
                $('#enviar').addClass("oculto")
                return false;
            }
            else {
                //Sino borro el mensaje y quito el foco si lo hay y muestro el boton de enviar.
                $('#errores').html('Todo correcto, puede enviar la solicitud.')
                $('#enviar').removeClass("oculto")
                return true;
            }
        })
    }

    //Comprobar si el campo esta vacio
    function campoVacio(dato) {
        if (dato != "" && dato != null) { return true; }
        else { return false; }
    }

    //Sacar mensaje de error
    function mostrarError(campo) {
        $('#' + campo).removeClass("campoCorrecto")
        $('#' + campo).addClass("campoErroneo")
        $('#' + campo + "Error").removeClass("mensajeOculto")
        $('#' + campo + "Error").addClass("mensajeErroneo")
    }

    //Esconder el mensaje de error y dar por bueno
    function campoCorrecto(campo) {
        $('#' + campo).removeClass("campoErroneo")
        $('#' + campo).addClass("campoCorrecto")
        $('#' + campo + "Error").removeClass("mensajeErroneo")
        $('#' + campo + "Error").addClass("mensajeOculto")
    }

    //Esconder error y marcar como no rellenado
    function campoNoRellenado(campo) {
        $('#' + campo + "Error").removeClass("mensajeErroneo")
        $('#' + campo + "Error").addClass("mensajeOculto")
        $('#' + campo).removeClass("campoCorrecto")
        $('#' + campo).addClass("campoErroneo")
    }

    //Comprobar nombre y apellidos
    function comprobarNombre(dato, campo) {
        let datoVacio = campoVacio(dato);
        if (datoVacio) {
            let comprobacion = !/[^A-Za-z-" "]+/g.test(dato); //Regex para nombre y apellido
            if (!comprobacion) {
                mostrarError(campo); //Muetro mensaje si hay numeros o caracteres especiales
            } else {
                campoCorrecto(campo);//Quito mensajes de error y doy por bueno
            }
        } else {
            campoNoRellenado(campo);//Campo no rellenado
        }
    }


    //Comprobar el DNI
    function comprobarDNI(dni) {
        let rellenado = campoVacio(dni);
        if (rellenado) {
            let numero
            let letra
            let letrasPosibles
            let expresionDni = /^\d{8}[a-zA-Z]$/;
            //Compruebo la expresion regular. Comprobara si los 8 primeros caracteres son numeros y si el ultimo
            //es una letra.
            if (expresionDni.test(dni) == true) {
                //Extraemos la seccion que contiene numeros en la variable numero, y la letra en la variable letra
                numero = dni.substr(0, dni.length - 1);
                letra = dni.substr(dni.length - 1, 1);
                numero = numero % 23;
                letrasPosibles = 'TRWAGMYFPDXBNJZSQVHLCKET';
                //Cogemos del string con el abecedario la letra en la posicion del numero resultante al modulo.
                letrasPosibles = letrasPosibles.substring(numero, numero + 1);
                //Si la letra no coincide, o no hemos introducido un valor correcto, dara error.
                if (letrasPosibles != letra.toUpperCase()) { mostrarError("nif"); }
                else { campoCorrecto("nif"); }
            } else { mostrarError("nif"); }
        }
        else { campoNoRellenado("nif"); }
    }

    //Comprobar telefono
    function comprobarTLF(numero) {

        let vacio = campoVacio(numero)
        if (vacio) {
            //En esta expresion comprobamos que el numero tengo exactamente 9 digitos.
            let expresion = /^\d{9}$/;
            if (expresion.test(numero)) {
                campoCorrecto("telefono");
            } else {
                mostrarError("telefono");
            }
        } else { campoNoRellenado("telefono"); }
    }

    //Comprobar e-mail
    function comprobarEmail(email) {
        let vacio = campoVacio(email)
        if (vacio) {
            //Declaramos la expresion regular correspondientes al nombre, servidor y dominio.
            //Se tiene en cuenta que el nombre del email comienza con una letra, seguido de cualquier 
            //caracter incluyendo "\, . y -" y con un maximo de 64 caracteres. Para el servidor,
            //se incluen caracteres de la A a la Z, y numeros. Por ultimo, se espera un ".", y se pasa
            //al dominio, en el que podemos poner dominios tanto con "-" como con ".", e incluso varios
            //dominios a la vez, como ".co.uk"
            let expresionEmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if (expresionEmail.test(email)) { campoCorrecto("email") }
            else { mostrarError("email") }
        }
        else { campoNoRellenado("email") }

    }

    //Redireccion de botones
    function redirigir(url){
        $(location).attr('href', url)
    }


    var prov = document.getElementById('ps-prov');
    var mun = document.getElementById('ps-mun');
    // Create PS
    new Pselect().create(prov, mun);


    //document.getElementById('ps-mun').addEventListener('change', function onChange() {
    //document.getElementById('code').innerText = 'Código: ' + document.getElementById('ps-mun').value;
    //});

    //$('#ps-mun').change(func)
    $('#nif').blur(function e() { comprobarDNI($(this).val()) });
    $('#nombre').blur(function e() { comprobarNombre($(this).val(), 'nombre') });
    $('#apellidos').blur(function e() { comprobarNombre($(this).val(), "apellidos") });
    $('#telefono').blur(function e() { comprobarTLF($(this).val()) });
    $('#email').blur(function e() { comprobarEmail($(this).val()) });
    $("#botonVolver").click(function e(){redirigir("https://www.google.com")});


});