$(document).ready(function () {

    var finalCorrecto = false;
    var archivoAdjunto;

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
    function selectIncidencias(dato, campo) {
        if (dato == null || dato == "Defecto" || dato == "") {
            $('#' + campo).removeClass("campoCorrecto")
            $('#' + campo).addClass("campoErroneo")
        } else {
            $('#' + campo).removeClass("campoErroneo")
            $('#' + campo).addClass("campoCorrecto")

            todoCorrecto[campo] = tiposIncidencias[dato].nombre;
            console.log(tiposIncidencias[dato].nombre)
        }
    }

    function campoNulo(dato, campo) {
        if (dato == null || dato == "Defecto" || dato == "") {
            $('#' + campo).removeClass("campoCorrecto")
            $('#' + campo).addClass("campoErroneo")
        } else {
            $('#' + campo).removeClass("campoErroneo")
            $('#' + campo).addClass("campoCorrecto")
            todoCorrecto[campo] = dato;
        }
    }

    //Comprobar nombre
    function comprobarNombre(dato, campo) {
        let datoVacio = campoVacio(dato);
        if (datoVacio) {
            campoCorrecto(dato, campo);//Quito mensajes de error y doy por bueno
        } else {
            mostrarError(campo); //Muetro mensaje si hay numeros o caracteres especiales
            campoNoRellenado(campo);//Campo no rellenado
        }
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

    //Comprobar Checkboxç
    function comprobarCheckbox() {
        if ($('#urgente').prop('checked')) {
            todoCorrecto["urgente"] = "Si";
        }
        else {
            todoCorrecto["urgente"] = "No"
        }
    }

    //Comprobar si hay archivo subido
    function rellenarArchivos() {
        $.map($('#archivo').get(0).files, function (file) { archivoAdjunto = file.value });
        console.log(archivoAdjunto)
    }


    //Redireccion de botones
    function redirigir(url) {
        $(location).attr('href', url)
    }

    //Rellenar los select desde los JSON

    function rellenarSelects() {

        $.each(tiposIncidencias, function (id, tipo) {
            $("#tipoIncidencia").append('<option value=' + tipo.id + '>' + tipo.nombre + '</option>');
        });
    }

    //Comprobar que todo este bien, si algo falla, la variable se mantendra en false.
    function comprobacionFinal() {
        finalCorrecto = true

        for (let clave in todoCorrecto) {

            if (todoCorrecto[clave] == "" || todoCorrecto[clave] == null || todoCorrecto[clave] == "Default") {
                finalCorrecto = false;
            }

        }

        if (finalCorrecto) {
            $('#botonInfo').addClass("d-none")
            $('#botonEmail').removeClass("d-none")
        } else {
            $('#botonEmail').addClass("d-none")
            $('#botonInfo').removeClass("d-none")
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
    $('#nombre').blur(function e() { comprobarNombre($(this).val(), 'nombre'), comprobacionFinal() });
    $('#email').blur(function e() { comprobarEmail($(this).val()), comprobacionFinal() });
    $('#descripcion').blur(function e() { campoNulo($(this).val(), "descripcion"), comprobacionFinal() });
    $('#urgente').change(function e() { comprobarCheckbox(), comprobacionFinal() });
    $('#archivo').change(function e() { rellenarArchivos(), todoCorrecto["archivo"] = "Se adjuntan archivos" })

    $('#botonEmail').click(function e() { comprobarNombre($('#nombre').val(), 'nombre'), comprobacionFinal() });
    $('#botonEmail').click(function e() { comprobarEmail($('#email').val()), comprobacionFinal() });

    //Comprobacion de los select
    $('#tipoIncidencia').change(function e() { selectIncidencias($(this).val(), "tipoIncidencia"), comprobacionFinal() })

    //Eventos de accion de los botones
    $("#botonCamara").click(function e(){ $("#archivo").click ();})
    $("#botonVolver").click(function e() { redirigir("vistaAlumno") });
    $("#cambiarCuenta").click(function e() { redirigir("auth/google") });
    $("#cerrarSesion").click(function e() { redirigir("loginout") });
});
