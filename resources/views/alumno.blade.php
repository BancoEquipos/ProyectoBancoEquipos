<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alumno</title>
</head>
<body id="body">
<h1>Nombre: {{ $userName }}</h1>
<h1>Apellido: {{ $surnames }}</h1>
<h1>NRE: {{ $nre }}</h1>
<a href="{{ url('vistaAlumnos') }}">Ir a la sección de alumno</a>
</body>
</html>
