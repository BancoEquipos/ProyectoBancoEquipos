$(document).ready(function () {

    function redirigir(url){
        $(location).attr('href', url)
    }


    $("#servicioIncidencia").click(function e(){redirigir("https://www.google.com")});
    $("#botonLogout").click(function e(){redirigir("/logOut")});
    $("#botonCambiar").click(function e(){redirigir("/auth/google")});

});
