$(document).ready(function () {

    //Variable para almacenar las solicitudes entrantes:
    var monitoresDisponibles = [];
    var ordenadoresDisponibles = [];
    var numSerieMonitores = "";
    var numSerieOrdenadores = ""
    var datosEnviar = [
        {
            "idPrestamo":"",
            "nombreProfesor": "",
            "fechaValidacion": "",
            "fechaMaxima": "",
            "fechaSalida": "",
            "numMonitor": "",
             "numOrdenador":""
        }
    ]

    //Redireccionar a la URL especifica
    function redirigir(url) {
        $(location).attr('href', url)
    }

    $("#cambiarCuenta").click(function e() { redirigir("auth/google") });
    $("#cerrarSesion").click(function e() { redirigir("loginout") });
    $("#botonVolver").click(function e() { redirigir("vistaProfesor") });

    //Recorrer el JSON y crear una entrada para cada uno:

    function recuperarSolicitudes() {

        for (let i = 0; i < Object.keys(datosSolicitudes).length; i++) {


            if (datosSolicitudes[i].fecha_validacion == null) {

                datosEnviar["id"] = i;

                $('#acordeonPendientes').append('<h3>Solicitud de material: ' + datosSolicitudes[i].alumno.nombre + " " + datosSolicitudes[i].alumno.apellidos + " | " +

                    datosSolicitudes[i].curso + " de " + datosSolicitudes[i].ciclo_formativo.nombre + '</h3> <div id="solicitud"' + datosSolicitudes[i].id + '> ' +
                    '<table><tr><th>Alumno que solicita</th><th>Informacion del prestamo</th></tr>' +

                    '<tr><td>Nombre: ' + datosSolicitudes[i].alumno.nombre + '</td>' +
                    '<td>Numero de prestamo: ' + datosSolicitudes[i].id + '</td></tr >' +

                    '<tr><td>Apellidos: ' + datosSolicitudes[i].alumno.apellidos + '</td>' +
                    '<td>Profesor que lo valida (autocompletado)</td></tr >' +

                    '<tr><td>Teléfono: ' + datosSolicitudes[i].alumno.telefono + '</td>' +
                    '<td>Fecha y hora de la validación: Se establecera automaticamente la fecha y hora del momento en el que acepte la solicitud</td></tr >' +

                    '<tr><td>NIF: ' + datosSolicitudes[i].alumno.nif + '</td>' +
                    '<td>Fecha máxima de la devolución: <input type="text" id="datepickerMaximo' + datosSolicitudes[i].id + '"></p></td></tr>' +

                    '<tr><td>Provincia y población: ' + datosSolicitudes[i].domicilio.provincia + " |  " + datosSolicitudes[i].domicilio.poblacion + '</td>' +
                    '<td>Fecha de salida del equipo solicitado: <input type="text" id="datepickerSalida' + datosSolicitudes[i].id + '"></p></td></tr>' +

                    '<tr><td>Domicilio: ' + datosSolicitudes[i].domicilio.domicilio + '</td>' +
                    '<td>Fecha de devolucion: Aun no se ha hecho el prestamo</p></td></tr>' +

                    '<tr><td>Correo: ' + datosSolicitudes[i].alumno.email + '</td>' +
                    '<td>Solicita : ' + recorrerTipoComponente(componentes[i].id) + '</td></tr>' +

                    '<tr><td>Esta cursando: ' + datosSolicitudes[i].curso + " de " + datosSolicitudes[i].ciclo_formativo.nombre + '</td>' +
                    '<td>Nº de serie asignados: ' + mostrarNumeroSerie(datosSolicitudes[i].id) + ' </td></tr></table>' +
                    ' <div class="botonValidar"><input type="button" class=" btn botonEnviar btn-primary" type="submit" id="enviar" value="Validar solicitud"></div>')

                crearEventosDatepicker(i + 1)
                crearSelectMonitor(i + 1)
                crearSelectOrdenador(i + 1)
            }
            else {
                $('#acordeonTramitadas').append('<h3>Solicitud de material: ' + datosSolicitudes[i].alumno.nombre + " " + datosSolicitudes[i].alumno.apellidos + " | " +
                    datosSolicitudes[i].curso + " de " + datosSolicitudes[i].ciclo_formativo.nombre + '</h3> <div id="solicitud"' + datosSolicitudes[i].id + '> ' +
                    '<table><tr><th>Alumno que solicita</th><th>Informacion del prestamo</th></tr>' +

                    '<tr><td>Nombre: ' + datosSolicitudes[i].alumno.nombre + '</td>' +
                    '<td>Numero de prestamo: ' + datosSolicitudes[i].id + '</td></tr >' +

                    '<tr><td>Apellidos: ' + datosSolicitudes[i].alumno.apellidos + '</td>' +
                    '<td>Profesor que lo validó: ' + datosSolicitudes[i].profesor_valida + '</td></tr >' +

                    '<tr><td>Teléfono: ' + datosSolicitudes[i].alumno.telefono + '</td>' +
                    '<td>Fecha y hora de la validación: ' + datosSolicitudes[i].fecha_validacion + '</td></tr >' +

                    '<tr><td>NIF: ' + datosSolicitudes[i].alumno.nif + '</td>' +
                    '<td>Fecha máxima de la devolución: ' + datosSolicitudes[i].fecha_devolucion + '</p></td></tr>' +

                    '<tr><td>Provincia y población: ' + datosSolicitudes[i].domicilio.provincia + " |  " + datosSolicitudes[i].domicilio.poblacion + '</td>' +
                    '<td>Fecha de salida del equipo solicitado: ' + datosSolicitudes[i].fecha_entrega + '</p></td></tr>' +

                    '<tr><td>Domicilio: ' + datosSolicitudes[i].domicilio.domicilio + '</td>' +
                    '<td>Fecha de devolucion: ' + datosSolicitudes[i].fecha_devolucion + '</p></td></tr>' +

                    '<tr><td>Correo: ' + datosSolicitudes[i].alumno.email + '</td>' +
                    '<td>Solicita : ' + recorrerTipoComponente(datosSolicitudes[i].id) + '</td></tr>' +

                    '<tr><td>Esta cursando: ' + datosSolicitudes[i].curso + " de " + datosSolicitudes[i].ciclo_formativo.nombre + '</td>' +
                    '<td>Nº de serie asignados: ' + recorrerComponentesSolicitados(datosSolicitudes[i].id) + ' </td></tr></table>'
                )
            }



        }

    }

    //Funcion acordeon
    $(function () {
        $("#tabs").tabs();
    });
    $(function () {
        $("#acordeonPendientes").accordion({
            collapsible: true,
            active: false,
            heightStyle: "content"
        });
        $("#acordeonTramitadas").accordion({
            collapsible: true,
            active: false,
            heightStyle: "content"
        });
    });

    function crearDatepicker() {
        for (let i = 0; i < Object.keys(datosSolicitudes).length; i++) {
            if (datosSolicitudes[i].fecha_validacion == null) {
                $(function () {
                    $("#datepickerMaximo" + datosSolicitudes[i].id).datepicker({ dateFormat: 'dd/mm/yy' });
                    $("#datepickerSalida" + datosSolicitudes[i].id).datepicker({ dateFormat: 'dd/mm/yy' });
                });
            }
        }
    }

    function recorrerTipoComponente(id) {

        let tam = id - 1;
        var arrayNombres = "";

        for (let i = 0; i < Object.keys(datosSolicitudes[tam].tipo_componente).length; i++) {

            arrayNombres = arrayNombres + " " + datosSolicitudes[tam].tipo_componente[i].tipo_componente + " , ";
        }

        arrayNombres = arrayNombres.substring(0, arrayNombres.length - 2);

        return arrayNombres;
    }

    function separarComponentesDisponibles() {

        let contadorOrdenador = 0;
        let contadorMonitor = 0;

        for (let i = 0; i < (componentes).length; i++) {
            if (componentes[i].tipoComponente == "Ordenador") {
                ordenadoresDisponibles[contadorOrdenador] = componentes[i]
                contadorOrdenador++;
            } else if (componentes[i].tipoComponente == "Monitor") {
                monitoresDisponibles[contadorMonitor] = componentes[i]
                contadorMonitor++;
            }
        }
        recogerNSerieMonitores();
        recogerNSerieOrdenadores();
    }

    function recogerNSerieOrdenadores() {

        for (let i = 0; i < (ordenadoresDisponibles).length; i++) {
            numSerieOrdenadores = numSerieOrdenadores + '<option value="' + ordenadoresDisponibles[i].id + '" >' + ordenadoresDisponibles[i].nSerie + '</option>';
        }
    }

    function recogerNSerieMonitores() {

        for (let i = 0; i < (monitoresDisponibles).length; i++) {
            numSerieMonitores = numSerieMonitores + '<option value="' + monitoresDisponibles[i].id + '" >' + monitoresDisponibles[i].nSerie + '</option>';
        }
    }

    function recorrerComponentesSolicitados(id) {

        let tam = id - 1;
        var arrayNombres = "";

        for (let i = 0; i < Object.keys(datosSolicitudes[tam].componentes).length; i++) {

            if (datosSolicitudes[tam].componentes[i].tipoComponente == "Ordenador" || datosSolicitudes[tam].componentes[i].tipoComponente == "Monitor") {
                arrayNombres = arrayNombres + '</br></br>' + datosSolicitudes[tam].componentes[i].tipoComponente + ": Numero de serie: " + datosSolicitudes[tam].componentes[i].nSerie + ", ";
            } else {
                arrayNombres = arrayNombres + '</br></br>' + datosSolicitudes[tam].componentes[i].tipoComponente + " , ";
            }
        }

        arrayNombres = arrayNombres.substring(0, arrayNombres.length - 2);

        return arrayNombres;
    }

    function mostrarNumeroSerie(id) {
        var tam = id - 1;
        let ordenador = false;
        let monitor = false;

        for (let i = 0; i < Object.keys(datosSolicitudes[tam].tipo_componente).length; i++) {

            if (datosSolicitudes[tam].tipo_componente[i].tipo_componente == "Ordenador") {
                ordenador = true;
            } else if (datosSolicitudes[tam].tipo_componente[i].tipo_componente == "Monitor") {
                monitor = true;
            }
        }

        if (monitor == true && ordenador == true) {
            return '</br></br>Ordenador: <select class="selectNumero" id="ordenadorSelect' + id + '"><option value="Defecto" selected>Seleccion el numero de serie</option> ' + numSerieOrdenadores + '</select></br></br> Monitor:' +
                '<select class="selectNumero" id="monitorSelect' + id + '"><option value="Defecto" selected>Seleccion el numero de serie</option>' + numSerieMonitores + '</select>';

        } else if (monitor == true && ordenador == false) {
            return '</br></br>Monitor: <select class="selectNumero" id="monitorSelect' + id + '"><option value="Defecto" selected>Seleccion el numero de serie</option>' + numSerieMonitores + '</select>'
        } else if (ordenador == true && monitor == false) {
            return '</br></br>Ordenador: <select class="selectNumero" id="ordenadorSelect' + id + '"><option value="Defecto" selected>Seleccion el numero de serie</option>' + numSerieOrdenadores + '</select>'
        } else {
            return "Teclados, ratones y cableado no tienen numero de serie";
        }

        //esto para los valores de los select crearSelectsValues(id);

    }

    function crearEventosDatepicker(id) {
        $("#datepickerMaximo" + id).change(function e() { datosEnviar["fechaMaxima"] = $('#datepickerMaximo' + id).val(), console.log(id) })
        $("#datepickerSalida" + id).change(function e() { datosEnviar["fechaSalida"] = $('#datepickerSalida' + id).val() })
    }

    function crearSelectMonitor(id) {
        $("#monitorSelect" + id).change(function e() { datosEnviar["numMonitor"] = $("#monitorSelect" + id).val() })
    }

    function crearSelectOrdenador(id) {
        $("#ordenadorSelect" + id).change(function e() { datosEnviar["numOrdenador"] = $("#ordenadorSelect" + id).val() })
    }

    separarComponentesDisponibles();
    recuperarSolicitudes();
    crearDatepicker();

    /*TO Do :
    -cambiar formato a fecha antes de enviar
    -generar la fecha de ahora mismo para el campo fecha_alta_solicitud
    -hacer get de un json igual al de algo.js
    */
});
