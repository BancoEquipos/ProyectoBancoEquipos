function sendEmail() {

     /*Aqui se mandaria el archivo, pero no puedo, ya que no es posible obtener el PATH del archivo en los navegadores modernos por temas de seguridad. Solo se peude añadiendo Node.js
    if (todoCorrecto["archivo"] == "Sin archivo adjunto") {
        Email.send({
            Host: "smtp.gmail.com",
            Username: "incidenciascarlos3@gmail.com",
            Password: "Carlos3Incidencias2021$",
            To: 'incidenciascarlos3@gmail.com, ' + todoCorrecto["email"],
            From: "incidenciascarlos3@gmail.com",
            Subject: "Aviso: " + todoCorrecto["tipoIncidencia"],
            Body: "Se ha reportado una incidencia <br>Nombre del profesor: " + todoCorrecto["nombre"] + "<br>Tipo de incidencia: " + todoCorrecto["tipoIncidencia"] +
                "<br>¿Es muy urgente?: " + todoCorrecto["urgente"] + "<br>Descripción de la incidencia: " + todoCorrecto["descripcion"] + "<br>Archivo adjunto: " + todoCorrecto["archivo"],
            Attachments: [
                {
                    name: "smtpjs.png",
                    path: "https://networkprogramming.files.wordpress.com/2017/11/smtpjs.png"
                }]
        }).then(
            message => alert("Se ha enviado un e-mail al RMI. Tiene una copia del mismo mensaje en su e-mail."),
        );
    }
    //else {*/
        Email.send({
            Host: "smtp.gmail.com",
            Username: "incidenciascarlos3@gmail.com",
            Password: "Carlos3Incidencias2021$",
            To: 'incidenciascarlos3@gmail.com, ' + todoCorrecto["email"],
            From: "incidenciascarlos3@gmail.com",
            Subject: "Aviso: " + todoCorrecto["tipoIncidencia"],
            Body: "Se ha reportado una incidencia <br>Nombre del profesor: " + todoCorrecto["nombre"] + "<br>Tipo de incidencia: " + todoCorrecto["tipoIncidencia"] +
                "<br>¿Es muy urgente?: " + todoCorrecto["urgente"] + "<br>Descripción de la incidencia: " + todoCorrecto["descripcion"] + "<br>Archivo adjunto: " + todoCorrecto["archivo"],
        }).then(
            message => alert("Se ha enviado un e-mail al RMI. Tiene una copia del mismo mensaje en su e-mail."),
        );
    //}




}