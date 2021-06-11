$(document).ready(function () {

    function redirigir(url){
        $(location).attr('href', url)
    }

    $("#botonLogin").click(function e(){redirigir("/")});
});
