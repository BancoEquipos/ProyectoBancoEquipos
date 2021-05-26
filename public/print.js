$(function () {

    var specialElementHandlers = {
        '#editor': function (element,renderer) {
            return true;
        }
    };

    $('#boton').click(function () {
        var doc = new jsPDF();
        doc.fromHTML(
            $('#body').html(), 15, 15,
            { 'width': 170, 'elementHandlers': specialElementHandlers },
            function(){ doc.save('sample-file.pdf'); }
        );

    });
});
