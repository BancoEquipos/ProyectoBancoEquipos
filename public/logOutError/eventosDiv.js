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

    $("#botonLogin").click(function e() { redirigir("https://www.google.com") });

    //Cambiar al logo al pasar por encima
    $('#botonLogin').on('mouseenter', function () { cambiarLogoBlanco("#login")});
    $('#botonLogin').on('mouseleave', function () { cambiarLogoNegro("#login") });
   
});