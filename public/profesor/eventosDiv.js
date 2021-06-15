$(document).ready(function () {

    //Redireccionar a la URL especifica
    function redirigir(url) {
        $(location).attr('href', url)
    }

    //Cambiar el logo al pasar por encima del servicio
    function cambiarLogoBlanco(div) {
        $(div + "ImagenBlanco").removeClass("d-none")
        $(div + "Imagen").addClass("d-none")
    }

    function cambiarLogoNegro(div) {
        $(div + "Imagen").removeClass("d-none")
        $(div + "ImagenBlanco").addClass("d-none")
    }

    $("#cambiarCuenta").click(function e() { redirigir("auth/google") });
    $("#cerrarSesion").click(function e() { redirigir("loginout") });

    //Botones de los servicios
    $('#servicioDos').click(function e() { redirigir("validarlo") });
    $('#servicioUno').click(function e() { redirigir("incidencias") });

    //Cambiar al logo al pasar por encima
    $('#servicioUno').on('mouseenter', function () { cambiarLogoBlanco("#servicioUno") });
    $('#servicioUno').on('mouseleave', function () { cambiarLogoNegro("#servicioUno") });
    $('#servicioDos').on('mouseenter', function () { cambiarLogoBlanco("#servicioDos") });
    $('#servicioDos').on('mouseleave', function () { cambiarLogoNegro("#servicioDos") });
    $('#servicioTres').on('mouseenter', function () { cambiarLogoBlanco("#servicioTres") });
    $('#servicioTres').on('mouseleave', function () { cambiarLogoNegro("#servicioTres") });
});
