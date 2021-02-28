<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>@yield('titulo')</title>
    </head>
<body>
    <div class="navbar navbar-dark bg-dark justify-content-center">
        <div class="row m-1">
            <a href="/" class="navbar-brand col fs-1">
                Inicio |
            </a>
            @guest
            <a href="{{ route('login') }}" class="navbar-brand col fs-1">
                Login
            </a>
            @else
                <a href="/acerca" class="navbar-brand col fs-1">
                    Acerca
                </a>
                <a href="/proyectos" class="navbar-brand col fs-1">
                    Portafolio
                </a>
                <a href="/contactos" class="navbar-brand col fs-1">
                    Contactos
                </a>
                <a href="#" class="navbar-brand col fs-1" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    Cerrar Sesion</a>
            @endguest

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>
    </div>

    @yield('contenido')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
