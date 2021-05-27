<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <!--<link href="{{ asset('/signin/style.css') }}" rel="stylesheet">-->
      </head>
        <body class="text-center">
            <main class="form-signin">
                <form>
                    <img class="mb-4" src="{{ asset('/signin/bootstrap-logo.svg') }}" alt="" width="72" height="57">
                    <h1 class="h3 mb-3 fw-normal">Iniciar sesi&oacute;n</h1>

                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Correo Electronico</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="contraseña">
                        <label for="floatingPassword">Contraseña</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Registrarse</button>
                    <p class="mt-5 mb-3 text-muted">&copy; 2021–2021</p>
                </form>
            </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        </body>
</html>
