$(document).ready(function () {

    function redirigir(url){
        $(location).attr('href', url)
    }


    $("#servicioPrestamo").click(function e(){redirigir("/solicitudPrestamo")});
    $("#botonLogout").click(function e(){redirigir("/logOut")});
    $("#botonCambiar").click(function e(){redirigir("/auth/google")});

});
