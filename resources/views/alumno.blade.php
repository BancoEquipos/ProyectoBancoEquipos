<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alumno</title>
</head>
<body id="body">
<h1>Nombre: {{ $userName }}</h1>
<h1>Apellido: {{ $surnames }}</h1>
<h1>NRE: {{ $nre }}</h1>
<a href="">Ir a la sección de alumno</a>
<a href="{{ action('App\Http\Controllers\Auth\LoginController@handleGoogleCallback') }}">¿No eres tu? Haz login en tu cuenta</a>
</body>
</html>
