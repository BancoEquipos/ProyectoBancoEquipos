<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alumno</title>
</head>
<body id="body">
<h1>Nombre: {{ $userName }}</h1>
<h1>Apellido: {{ $surnames }}</h1>
<h1>NRE: {{ $nre }}</h1>
<a href="{{ url('vistaAlumno') }}">Ir a la sección de alumno</a>
<a href="{{ url('auth/google') }}">¿No eres tu? Haz login en tu cuenta</a>
</body>
</html>
