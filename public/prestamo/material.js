$(document).ready(function () {
    const URL_API = 'https://shrouded-falls-21309.herokuapp.com/';
    // const URL_API = 'http://localhost:8000/';
    let configuracionPeticion = {};
    let ciclosFormativosPresenciales;

    /***Recogiendo datos iniciales de BBDD***/

    //Configuramos la variable configuracionPeticion para la petición que vamos a hacer
    /*configuracionPeticion = {
        method: 'GET',
        header: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        }
    };

    ciclosFormativosPresenciales = peticion(URL_API, configuracionPeticion);

    console.log('Resultado petición: ' + ciclosFormativosPresenciales);*/

    /****************************************/

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
            let comprobacion = !/[^A-Za-z-" "]+/g.test(dato); //Regex para nombre y apellido
            if (!comprobacion) {
                mostrarError(campo); //Muetro mensaje si hay numeros o caracteres especiales
            } else {
                campoCorrecto(dato, campo);//Quito mensajes de error y doy por bueno
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
        //Cambio constante gradosPresenciales (con datos de datos.js) a ciclosFormativosPresenciales (con datos de servidor)
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

        console.log(todoCorrecto)
        console.log(finalCorrecto)

    }

    /********************************************* */
    //El JSON que tienes que enviar es todoCorrecto
    //ACUERDATE DE SUSTITUIR LOS JSON "gradosPresenciales" y "motivos" por los JSON que vengan de la BBDD

    function peticion(url, configuracionPeticion){
        return fetch(url, configuracionPeticion)
        .then(data => data.json())
        .catch(error => console.log('Error en la petición: ' + error));
    }
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

    //Comprobacion de los select
    $('#ps-prov').blur(function e() { selectNoNulo($('#ps-prov').val(), "ps-prov"), comprobacionFinal() })
    $('#ps-mun').blur(function e() { selectNoNulo($('#ps-mun').val(), "ps-mun"), comprobacionFinal() })
    $('#gradoSelect').blur(function e() { selectNoNulo($('#gradoSelect').val(), "gradoSelect"), comprobacionFinal() })
    $('#cursoSelect').blur(function e() { selectNoNulo($('#cursoSelect').val(), "cursoSelect"), comprobacionFinal() })
    $('#motivoSelect').blur(function e() { selectNoNulo($('#motivoSelect').val(), "motivoSelect"), comprobacionFinal() })
    $('#equipamientoSolicitado').click(function e() { selectNoNulo($('#equipamientoSolicitado').val(), "equipamientoSolicitado"), comprobacionFinal() })


    //Evento de accion del boton vovler
    $("#botonVolver").click(function e() { redirigir("vistaAlumno") });
    $("#cambiarCuenta").click(function e() { redirigir("auth/google") });
    $("#cerrarSesion").click(function e() { redirigir("loginout") });

    $("#enviar").click(function(){
        let idTablaDomicilio;
        let idTablaAlumno;
        let idTablaMotivo;
        let idTablaCicloFormativo;
        let idTablaPrestamo;
        let tipoComponentesElegidos = [1, 2];
        let dataBody;

        //Insertamos en tabla domicilios
        dataBody = {
            provincia: $('#ps-prov').val(),
            poblacion: $('#ps-mun').val(),
            domicilio: $('#domicilio').val(),
        }

        configuracionPeticion = {
            method: 'POST',
            header: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(dataBody),
        };

        peticion(URL_API + 'api/domicilios', configuracionPeticion)
        .then(response => {
            //Insertamos en tabla alumnos
            idTablaDomicilio = response.data.id;
            console.log('id domicilios: ' + idTablaDomicilio);
            dataBody = {
                nombre: $('#nombre').val(),
                apellidos: $('#apellidos').val(),
                nif: $('#nif').val(),
                email: $('#email').val(),
                telefono: 612365478,
            }
            configuracionPeticion.body = JSON.stringify(dataBody);

            return peticion(URL_API + 'api/alumnos', configuracionPeticion);
        })
        .then(response => {
            console.log(response);
            //Insertamos en tabla prestamos
            idTablaAlumno = response.data.id;
            idTablaCicloFormativo = 1;
            idTablaMotivo = 1;
            dataBody = {
                curso: 1,
                alta_solicitud: "2021-12-12",
                motivo_id: idTablaMotivo,
                alumno_id: idTablaAlumno,
                domicilio_id: idTablaDomicilio,
                ciclo_formativo_id: idTablaCicloFormativo
            }
            configuracionPeticion.body = JSON.stringify(dataBody);

            return peticion(URL_API + 'api/prestamos', configuracionPeticion);

            /*console.log('id alumnos: ' + idTablaAlumno);
            dataBody = {
                nombre: $('#gradoSelect').val(),
            }
            configuracionPeticion.body = JSON.stringify(dataBody);

            return peticion(URL_API + 'api/alumnos', configuracionPeticion);*/

        })
        .then(response => {
            //Insertamos en tabla prestamos_componentes
            let filasPrestamosComponente;
            idTablaPrestamo = response.data.id;
            console.log('Respuesta préstamos: ');
            console.log(response);
            for(let i = 0; i < tipoComponentesElegidos.length; ++i){
                dataBody = {
                    activo: true,
                    prestamo_id: idTablaPrestamo,
                    tipo_componente_id: tipoComponentesElegidos[i]
                }

                configuracionPeticion.body = JSON.stringify(dataBody);

                peticion(URL_API + 'api/prestamoscomponente', configuracionPeticion)
                .then(response => filasPrestamosComponente[i] = response)
                .catch(error => console.log(error));
            }

            return filasPrestamosComponente;
        })
        .then(response => {
            console.log(response);
        })
        /*response
        .then(response => {
            console.log('Respuesta servidor: ');
            console.log(response);
        })*/
        .catch(error => console.log('Error' + error));
    });



});
