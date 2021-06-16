//PASAR DATO FINALIZADO
$(document).ready(function () {
    const URL_API = 'http://shrouded-falls-21309.herokuapp.com/';
    //.const URL_API = 'http://localhost:8000/';
    let configuracionPeticion = {};
    let datosSolicitudes = [];
    let componentes = [];
    //Variable para almacenar las solicitudes entrantes:
    var monitoresDisponibles = [];
    var ordenadoresDisponibles = [];
    var numSerieMonitores = "";
    var numSerieOrdenadores = "";
    var nombreAutocompletar = $('#autoC').val();
    var fechaHoy = new Date();
    fechaHoy = fechaHoy.getDate() + "/" + (fechaHoy.getMonth() +1) + "/" + fechaHoy.getFullYear()
    var datosEnviar = {
            "idPrestamo": "",
            "nombreProfesor": "",
            "fechaValidacion": "",
            "fechaMaxima": "",
            "fechaSalida": "",
            "numMonitor":  null,
            "numOrdenador": null
    }


    async function iniciar(){
        $('#cargandoDiv').removeClass('d-none');
        $('#cargandoDiv').addClass('d-block');
        datosSolicitudes = await devolverPrestamo();
        datosSolicitudes = datosSolicitudes.data;
        componentes = await getComponentesDisponibles();
        componentes = componentes.data;
        crearAcordeon();
        separarComponentesDisponibles();
        recuperarSolicitudes();
        crearDatepicker();
    };

    iniciar();

    //Redireccionar a la URL especifica
    function redirigir(url) {
        $(location).attr('href', url)
    }

    $("#cambiarCuenta").click(function e() { redirigir("auth/google") });
    $("#cerrarSesion").click(function e() { redirigir("loginout") });
    $("#botonVolver").click(function e() { redirigir("vistaProfesor") });

    //Recorrer el JSON y crear una entrada para cada uno:

    function recuperarSolicitudes() {
        $('#cargandoDiv').removeClass('d-block');
        $('#cargandoDiv').addClass('d-none');
        $('#divPrestamos').removeClass('d-none');
        $('#divPrestamos').addClass('d-block');
        var prestamosPendientes = false;
        var prestamosTramitadas = false;
        var prestamosFinalizadas = false;

        for (let i = 0; i < Object.keys(datosSolicitudes).length; i++) {

            if (datosSolicitudes[i].fecha_valida == null) {

                datosEnviar["id"] = i;
                prestamosPendientes = true;

                $('#acordeonPendientes').append('<h3>Solicitud de material: ' + datosSolicitudes[i].alumno.nombre + " " + datosSolicitudes[i].alumno.apellidos + " | " +

                    datosSolicitudes[i].curso + " de " + datosSolicitudes[i].ciclo_formativo.nombre + '</h3> <div id="solicitud"' + datosSolicitudes[i].id + '> ' +
                    '<table><tr><th>Alumno que solicita</th><th>Informacion del prestamo</th></tr>' +

                    '<tr><td>Nombre: ' + datosSolicitudes[i].alumno.nombre + '</td>' +
                    '<td>Numero de prestamo: ' + datosSolicitudes[i].id + '</td></tr >' +

                    '<tr><td>Apellidos: ' + datosSolicitudes[i].alumno.apellidos + '</td>' +
                    '<td>Profesor que lo valida <input class="inputPrestamo" type="text" value="Ejemplo" id="profesor' + datosSolicitudes[i].id + '"></td></tr >' +

                    '<tr><td>Teléfono: ' + datosSolicitudes[i].alumno.telefono + '</td>' +
                    '<td>Fecha y hora de la validación: <input class="inputPrestamo" type="text" value="'+fechaHoy+'" id="datepickerValidacion' + datosSolicitudes[i].id + '"></td></tr >' +

                    '<tr><td>NIF: ' + datosSolicitudes[i].alumno.nif + '</td>' +
                    '<td>Fecha máxima de la devolución: <input class="inputPrestamo" type="text" id="datepickerMaximo' + datosSolicitudes[i].id + '"></p></td></tr>' +

                    '<tr><td>Provincia y población: ' + datosSolicitudes[i].domicilio.provincia + " |  " + datosSolicitudes[i].domicilio.poblacion + '</td>' +
                    '<td>Fecha de salida del equipo solicitado: <input class="inputPrestamo" type="text" id="datepickerSalida' + datosSolicitudes[i].id + '"></p></td></tr>' +

                    '<tr><td>Domicilio: ' + datosSolicitudes[i].domicilio.domicilio + '</td>' +
                    '<td>Fecha de devolucion: Aun no se ha hecho el prestamo</p></td></tr>' +

                    '<tr><td>Correo: ' + datosSolicitudes[i].alumno.email + '</td>' +
                    '<td>Solicita : ' + recorrerTipoComponente(datosSolicitudes[i].id) + '</td></tr>' +

                    '<tr><td>Esta cursando: ' + datosSolicitudes[i].curso + " de " + datosSolicitudes[i].ciclo_formativo.nombre + '</td>' +
                    '<td>Nº de serie asignados: ' + mostrarNumeroSerie(datosSolicitudes[i].id) + ' </td></tr></table>' +
                    ' <div class="botonValidar"><input type="button" class=" btn botonEnviar btn-primary enviar" type="submit" id="' + datosSolicitudes[i].id + '" value="Validar solicitud"></div>');

                crearEventosDatepicker(i+1)
                crearSelectMonitor(i+1)
                crearSelectOrdenador(i+1)
                crearEventosBotones(i+1)
            }
            else if (datosSolicitudes[i].fecha_valida != null &&  datosSolicitudes[i].finalizado == false){

                prestamosTramitados = true;
                $('#acordeonTramitadas').append('<h3>Solicitud de material: ' + datosSolicitudes[i].alumno.nombre + " " + datosSolicitudes[i].alumno.apellidos + " | " +
                    datosSolicitudes[i].curso + " de " + datosSolicitudes[i].ciclo_formativo.nombre + '</h3> <div id="solicitud"' + datosSolicitudes[i].id + '> ' +
                    '<table><tr><th>Alumno que solicita</th><th>Informacion del prestamo</th></tr>' +

                    '<tr><td>Nombre: ' + datosSolicitudes[i].alumno.nombre + '</td>' +
                    '<td>Numero de prestamo: ' + datosSolicitudes[i].id + '</td></tr >' +

                    '<tr><td>Apellidos: ' + datosSolicitudes[i].alumno.apellidos + '</td>' +
                    '<td>Profesor que lo validó: ' + datosSolicitudes[i].profesor_valida + '</td></tr >' +

                    '<tr><td>Teléfono: ' + datosSolicitudes[i].alumno.telefono + '</td>' +
                    '<td>Fecha y hora de la validación: ' + datosSolicitudes[i].fecha_valida + '</td></tr >' +

                    '<tr><td>NIF: ' + datosSolicitudes[i].alumno.nif + '</td>' +
                    '<td>Fecha máxima de la devolución: ' + datosSolicitudes[i].fecha_fin + '</p></td></tr>' +

                    '<tr><td>Provincia y población: ' + datosSolicitudes[i].domicilio.provincia + " |  " + datosSolicitudes[i].domicilio.poblacion + '</td>' +
                    '<td>Fecha de salida del equipo solicitado: ' + datosSolicitudes[i].fecha_envio + '</p></td></tr>' +

                    '<tr><td>Domicilio: ' + datosSolicitudes[i].domicilio.domicilio + '</td>' +
                    '<td>Fecha de devolucion: ' + datosSolicitudes[i].fecha_fin + '</p></td></tr>' +

                    '<tr><td>Correo: ' + datosSolicitudes[i].alumno.email + '</td>' +
                    '<td>Solicita : ' + recorrerTipoComponente(datosSolicitudes[i].id) + '</td></tr>' +

                    '<tr><td>Esta cursando: ' + datosSolicitudes[i].curso + " de " + datosSolicitudes[i].ciclo_formativo.nombre + '</td>' +
                    '<td>Nº de serie asignados: ' + recorrerNumComponente(datosSolicitudes[i].id) + ' </td></tr></table>' +
                    ' <div class="botonValidar"><input type="button" class=" btn botonEnviar btn-primary enviar" type="submit" id="' + datosSolicitudes[i].id + '" value="Finalizar solicitud"></div>')
            }
            else{
                prestamosFinalizados = true;

                $('#acordeonFinalizadas').append('<h3>Solicitud de material: ' + datosSolicitudes[i].alumno.nombre + " " + datosSolicitudes[i].alumno.apellidos + " | " +
                    datosSolicitudes[i].curso + " de " + datosSolicitudes[i].ciclo_formativo.nombre + '</h3> <div id="solicitud"' + datosSolicitudes[i].id + '> ' +
                    '<table><tr><th>Alumno que solicita</th><th>Informacion del prestamo</th></tr>' +

                    '<tr><td>Nombre: ' + datosSolicitudes[i].alumno.nombre + '</td>' +
                    '<td>Numero de prestamo: ' + datosSolicitudes[i].id + '</td></tr >' +

                    '<tr><td>Apellidos: ' + datosSolicitudes[i].alumno.apellidos + '</td>' +
                    '<td>Profesor que lo validó: ' + datosSolicitudes[i].profesor_valida + '</td></tr >' +

                    '<tr><td>Teléfono: ' + datosSolicitudes[i].alumno.telefono + '</td>' +
                    '<td>Fecha y hora de la validación: ' + datosSolicitudes[i].fecha_valida + '</td></tr >' +

                    '<tr><td>NIF: ' + datosSolicitudes[i].alumno.nif + '</td>' +
                    '<td>Fecha máxima de la devolución: ' + datosSolicitudes[i].fecha_fin + '</p></td></tr>' +

                    '<tr><td>Provincia y población: ' + datosSolicitudes[i].domicilio.provincia + " |  " + datosSolicitudes[i].domicilio.poblacion + '</td>' +
                    '<td>Fecha de salida del equipo solicitado: ' + datosSolicitudes[i].fecha_envio + '</p></td></tr>' +

                    '<tr><td>Domicilio: ' + datosSolicitudes[i].domicilio.domicilio + '</td>' +
                    '<td>Fecha de devolucion: ' + datosSolicitudes[i].fecha_fin + '</p></td></tr>' +

                    '<tr><td>Correo: ' + datosSolicitudes[i].alumno.email + '</td>' +
                    '<td>Solicita : ' + recorrerTipoComponente(datosSolicitudes[i].id) + '</td></tr>' +

                    '<tr><td>Esta cursando: ' + datosSolicitudes[i].curso + " de " + datosSolicitudes[i].ciclo_formativo.nombre + '</td>' +
                    '<td>Nº de serie asignados: ' + recorrerNumComponente(datosSolicitudes[i].id) + ' </td></tr></table>')
                crearEventosBotonesFinalizar(i+1);
            }
        }
        rellenarSinPrestamo(prestamosPendientes, "Pendientes", "pendiente");
        rellenarSinPrestamo(prestamosTramitadas, "Tramitadas", "tramitados");
        rellenarSinPrestamo(prestamosFinalizadas, "Finalizadas", "finalizados");

    }

    //Funcion acordeon
    function crearAcordeon(){

        $("#prueba").addClass("d-none")

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
            $("#acordeonFinalizadas").accordion({
                collapsible: true,
                active: false,
                heightStyle: "content"
            });
        });
    }

    function rellenarSinPrestamo(dato, campo, tipo){
        if(dato == false ){
            $("#acordeon"+campo).append('<h3>Ningún prestamo '+ tipo +'</h3>')
        }
    }

    function crearDatepicker() {
        for (let i = 0; i < Object.keys(datosSolicitudes).length; i++) {
            if (datosSolicitudes[i].fecha_validacion == null) {
                $(function () {
                    $("#datepickerMaximo" + datosSolicitudes[i].id).datepicker({ dateFormat: 'dd/mm/yy' });
                    $("#datepickerSalida" + datosSolicitudes[i].id).datepicker({ dateFormat: 'dd/mm/yy' });
                    $("#datepickerValidacion" + datosSolicitudes[i].id).datepicker({ dateFormat: 'dd/mm/yy' });
                });
            }
        }
    }

    var patata=1

    function recorrerTipoComponente(id) {
        var arrayNombres = "";
        for (let i = 0; i < Object.keys(datosSolicitudes[id-1].tipo_componente).length; i++) {
            //EL PROBLEMA ESTA EN LA ID DEL COMPONENTE, NO EN LA DEL PRESTAMO
            arrayNombres = arrayNombres + " " + datosSolicitudes[id-1].tipo_componente[i].tipo_componente + " , ";
        }
        arrayNombres = arrayNombres.substring(0, arrayNombres.length - 2);

        return arrayNombres;
    }

    function recorrerNumComponente(id) {
        var arrayNum = "</br></br>";
        for (let i = 0; i < Object.keys(datosSolicitudes[id-1].componentes).length; i++) {
            //EL PROBLEMA ESTA EN LA ID DEL COMPONENTE, NO EN LA DEL PRESTAMO
            arrayNum = arrayNum + " " + datosSolicitudes[id-1].tipo_componente[i].tipo_componente + "| Numero de serie: " + datosSolicitudes[id-1].componentes[i].n_serie + "</br></br>";
        }
        arrayNum = arrayNum.substring(0, arrayNum.length - 2);
        console.log(arrayNum)
        return arrayNum;
    }

    function crearEventosBotonesFinalizar(id){
        $('#'+id).click(finalizarPrestamos);
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
        $("#datepickerMaximo" + id).change(function e() { datosEnviar['fechaMaxima'] = $('#datepickerMaximo' + id).val()})
        $("#datepickerSalida" + id).change(function e() { datosEnviar['fechaSalida'] = $('#datepickerSalida' + id).val() })
        $("#datepickerValidacion" + id).change(function e() { datosEnviar['fechaValidacion'] = $('#datepickerValidacion' + id).val() })
    }

    function crearSelectMonitor(id) {
        $("#monitorSelect" + id).change(function e() { datosEnviar["numMonitor"] = $("#monitorSelect" + id).val()})
    }

    function crearSelectOrdenador(id) {
        $("#ordenadorSelect" + id).change(function e() { datosEnviar["numOrdenador"] = $("#ordenadorSelect" + id).val()})
    }

    function peticion(url, configuracionPeticion){
        return fetch(url, configuracionPeticion).then(data => data.json());
    }

    function crearEventosBotones(id){
        $('#'+id).click(insertarComponenteEnPrestamosComponentes);
        $('#'+id).click(insertarFechasProfesor);
    }


    async function devolverPrestamo(){
        let prestamoJson;
        configuracionPeticion = {
            method: 'GET',
            header: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        }

        prestamoJson = await peticion(URL_API + 'api/prestamos', configuracionPeticion);

        return prestamoJson;
    }

    async function insertarComponenteEnPrestamosComponentes(){
        let response;
        let idPrestamo = this.id;
        const insercionPrestamosComponentes = {
            idOrdenador: datosEnviar['numOrdenador'] || null,
            idMonitor: datosEnviar["numMonitor"] || null
        }

        configuracionPeticion = {
            method: 'PUT',
            header: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(insercionPrestamosComponentes)
        }

        response = await peticion(URL_API + 'api/prestamoscomponentesespecificos/' + idPrestamo, configuracionPeticion);
        // await sleep(500);
        location.reload();
        return response;
    }

    async function getComponentesDisponibles(){
        let componentesDisponibles;
        configuracionPeticion = {
            method: 'GET',
            header: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        }

        componentesDisponibles = await peticion(URL_API + 'api/componentesdisponibles', configuracionPeticion);
        return componentesDisponibles;
    }

    async function insertarFechasProfesor(){
        let componentesDisponibles;
        let fechaValida = cambiarFormatoFecha(datosEnviar['fechaValidacion']);
        let fechaFin = cambiarFormatoFecha(datosEnviar['fechaMaxima']);
        let fechaEnvio = cambiarFormatoFecha(datosEnviar['fechaSalida']);
        nombreAutocompletar = $('#autoC').val();
        datosEnviar['nombreProfesor'] = nombreAutocompletar;

        let dataBody = {
            profesor_valida: datosEnviar['nombreProfesor'],
            fecha_valida: fechaValida,
            fecha_fin: fechaFin,
            fecha_envio: fechaEnvio
        }

        configuracionPeticion = {
            method: 'PUT',
            header: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(dataBody)
        }

        componentesDisponibles = await peticion(URL_API + 'api/prestamos/' + this.id, configuracionPeticion);
        // await sleep(500);
        return componentesDisponibles;
    }

    function cambiarFormatoFecha(fecha){
        let fechaSplit = fecha.split('/');

        fecha = '';
        for(let i = fechaSplit.length - 1; i >= 0; --i){
            fecha += fechaSplit[i];

            if(i != 0) fecha += '/';
        }
        return fecha;
    }

    async function finalizarPrestamo(){
        let idPrestamo = this.id;

        configuracionPeticion = {
            methos: 'PUT',
            header: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        };

        const response = await peticion(URL_API + 'api/finalizarprestamo/' + idPrestamo, configuracionPeticion);

        return response;
    }

    //Funcion sleep
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    /*
    function reiniciarPagina(){
        datosEnviar = {"idPrestamo": "","nombreProfesor": "","fechaValidacion":"","fechaMaxima": "","fechaSalida": "","numMonitor": "","numOrdenador": ""}
        $('#acordeonFinalizadas').empty();
        $('#acordeonTramitadas').empty();
        $('#acordeonPendientes').empty();
        iniciar();
    }*/
});
