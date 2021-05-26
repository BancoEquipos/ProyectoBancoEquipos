<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>
<body>
    <form method="post">
		<input type="button" value="Send Email" onclick="sendEmail()"/>
	</form>

    <script src="{{ asset('email.js') }}"></script>
</body>
</html>
