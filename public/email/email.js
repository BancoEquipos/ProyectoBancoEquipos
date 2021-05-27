function sendEmail() {
	Email.send({
	Host: "smtp.gmail.com",
	Username : "incidenciascarlos3@gmail.com",
	Password : "Carlos3Incidencias2021$",
	To : '6379454@alu.murciaeduca.es',
	From : "incidenciascarlos3@gmail.com",
	Subject : "prueba",
	Body : "prueba",
	}).then(
		message => alert("mail sent successfully")
	);
}
