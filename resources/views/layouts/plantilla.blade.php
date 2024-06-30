<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
    <link rel="stylesheet" href="{{ asset('css/eventadmin.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav class="nav">
            <div class="nav-left">
                <a href="{{route('Event.index')}}"><img class="imagelogo" src="{{ asset('images/logoFcc.png') }}" alt="Logo FCC"></a>
            </div>
            <div class="nav-center">
                <a href="empresas.html"><button class="button-admin">Ver Empresas</button></a>
                <a href="nuevaempresa.html"><button class="button-admin">+ Nuevo Empresa</button></a>
                <a href="nuevoEvento.html"><button class="button-admin">+ Nuevo evento</button></a>
            </div>
            <div class="nav-right">
                <span class="user-name">Luis Angel</span>
                <img class="perfil-admin" id="profile-image" src="{{ asset('images/vinculacionFcc.png') }}" alt="Perfil Admin">
            </div>
        </nav>
        <script src="../js/menu.js"></script>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="footer-content">
        <div class="footer-mails">
            <div class="footer-mails-mail-title">Contactos</div>
            <div class="footer-mails-mail">dradminitacion@fcc.com</div>
            <div class="footer-mails-mail">vinculacion@fcc.com</div>
            <div class="footer-mails-mail">bolsatrabajofcc@gmail.com</div>
        </div>
        <div class="footer-info">
            <div class="footer-info-title-tile">Bolsa de trabajo</div>
            <div class="footer-info-title">Facultad de Computación</div>
            <div class="footer-info-title">Benemérita Universidad Autónoma de Puebla</div>
            <div class="footer-info-title">Vinculación Facultad de Computación</div>
        </div>
        <div>
            <a href="" class="footer-button"><button>Iniciar Sesión</button></a>
        </div>
    </footer>
</body>
</html>
