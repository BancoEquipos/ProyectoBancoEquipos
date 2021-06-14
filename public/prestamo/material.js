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
    function campoCorrecto(dato, campo) {
        $('#' + campo).removeClass("campoErroneo")
        $('#' + campo).addClass("campoCorrecto")
        $('#' + campo + "Error").removeClass("mensajeErroneo")
        $('#' + campo + "Error").addClass("mensajeOculto")
        todoCorrecto[campo] = dato;
    }

    //Esconder error y marcar como no rellenado
    function campoNoRellenado(campo) {
        $('#' + campo + "Error").removeClass("mensajeErroneo")
        $('#' + campo + "Error").addClass("mensajeOculto")
        $('#' + campo).removeClass("campoCorrecto")
        $('#' + campo).addClass("campoErroneo")
    }

    //Comprobar valor no nulo en un select
    function selectNoNulo(dato, campo) {

        if (dato == null || dato == "Defecto" || dato == "") {
            $('#' + campo).removeClass("campoCorrecto")
            $('#' + campo).addClass("campoErroneo")
        } else {
            $('#' + campo).removeClass("campoErroneo")
            $('#' + campo).addClass("campoCorrecto")
            todoCorrecto[campo] = dato;
        }
    }

    //Comprobar nombre y apellidos
    function comprobarNombre(dato, campo) {
        let datoVacio = campoVacio(dato);
        if (datoVacio) {
            campoCorrecto(dato, campo);//Quito mensajes de error y doy por bueno
            if(campo = "otroMotivo"){
                todoCorrecto["otroMotivo"] = dato;
            }
        } else {
            mostrarError(campo); //Muetro mensaje si hay numeros o caracteres especiales
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
                else { campoCorrecto(dni, "nif"); }
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
                campoCorrecto(numero, "telefono");
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
            if (expresionEmail.test(email)) { campoCorrecto(email, "email") }
            else { mostrarError("email") }
        }
        else { campoNoRellenado("email") }

    }

    //Redireccion de botones
    function redirigir(url) {
        $(location).attr('href', url)
    }

    //Desplegar "Otros motivos"
    function desplegarMotivo() {
        if ($("#motivoSelect").val() == 6) {
            $("#otroMotivoDiv").css("display", "block");
        } else {
            $("#otroMotivoDiv").css("display", "none");
        }
    }

    //Para esta seccion, hago uso de una libreria externa que me rellena
    //los select de provincia y municipio desde un servicio externo
    var prov = document.getElementById('ps-prov');
    var mun = document.getElementById('ps-mun');
    new Pselect().create(prov, mun);

    //Rellenar los select desde los JSON
    var equipoSeleccionado;

    function rellenarSelects() {

        $.each(gradosPresenciales, function (id, grado) {
            $("#gradoSelect").append('<option value=' + grado.id + '>' + grado.nombre + '</option>');
        });

        $.each(motivos, function (id, motivo) {
            $("#motivoSelect").append('<option value=' + motivo.id + '>' + motivo.nombre + '</option>');
        });

        //Uso de la libreria externa para rellenar el multiselect desde mi JSON
        VirtualSelect.init({
            ele: '#equipamientoSolicitado',
            options: equipamiento,
            multiple: true,
            placeholder: 'Seleccione el material que desea solicitar.',
            position: 'bottom',
            additionalClasses: 'multiSelect',
            selectedValue: equipoSeleccionado
        });
    }

    //Comprobar que todo este bien, si algo falla, la variable se mantendra en false.
    function comprobacionFinal() {
        var finalCorrecto = true

        for (let clave in todoCorrecto) {

            if (todoCorrecto[clave] == "" || todoCorrecto[clave] == null || todoCorrecto[clave] == "Default") {
                finalCorrecto = false;
            }

        }

        if (finalCorrecto) {
            $('#enviar').removeClass("botonEnviar")
            $('#enviar').addClass("boton")
        }

    }

    /********************************************* */
    //El JSON que tienes que enviar es todoCorrecto
    //ACUERDATE DE SUSTITUIR LOS JSON "gradosPresenciales" y "motivos" por los JSON que vengan de la BBDD
    /********************************************* */

    //Inicializacion de los datos
    rellenarSelects();
    $("#motivoSelect").change(function e() { desplegarMotivo() });

    //Comprobacion de los imputs
    $('#nif').blur(function e() { comprobarDNI($(this).val()), comprobacionFinal() });
    $('#nombre').blur(function e() { comprobarNombre($(this).val(), 'nombre'), comprobacionFinal() });
    $('#apellidos').blur(function e() { comprobarNombre($(this).val(), "apellidos"), comprobacionFinal() });
    $('#motivo').blur(function e() { comprobarNombre($(this).val(), 'motivo'), comprobacionFinal() });
    $('#telefono').blur(function e() { comprobarTLF($(this).val()), comprobacionFinal() });
    $('#email').blur(function e() { comprobarEmail($(this).val()), comprobacionFinal() });
    $('#domicilio').blur(function e() { selectNoNulo($('#domicilio').val(), "domicilio"), comprobacionFinal() })
    $('#nre').blur(function e() { comprobarNombre($(this).val(), 'nre'), comprobacionFinal() });
    $('#nombre').blur(function e() { comprobarNombre($(this).val(), 'otroMotivo'),comprobacionFinal() });

    //Comprobacion de los select
    $('#ps-prov').change(function e() { selectNoNulo($('#ps-prov option:selected').text(), "ps-prov"), comprobacionFinal() })
    $('#ps-mun').change(function e() { selectNoNulo($('#ps-mun option:selected').text(), "ps-mun"), comprobacionFinal() })
    $('#gradoSelect').change(function e() { selectNoNulo($('#gradoSelect').val(), "gradoSelect"), comprobacionFinal() })
    $('#cursoSelect').change(function e() { selectNoNulo($('#cursoSelect').val(), "cursoSelect"), comprobacionFinal() })
    $('#motivoSelect').change(function e() { selectNoNulo($('#motivoSelect').val(), "motivoSelect"), comprobacionFinal() })
    $('#equipamientoSolicitado').click(function e() { selectNoNulo($('#equipamientoSolicitado').val(), "equipamientoSolicitado"), comprobacionFinal() })


    //Evento de accion de los botones
    $("#botonVolver").click(function e() { redirigir("vistaAlumno") });
    $("#cambiarCuenta").click(function e() { redirigir("auth/google") });
    $("#cerrarSesion").click(function e() { redirigir("loginout") });

});
