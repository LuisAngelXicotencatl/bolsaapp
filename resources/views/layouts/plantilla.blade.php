<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://img.icons8.com/?size=100&id=4dqHoNQ5CC3L&format=png&color=000000">
    <link rel="stylesheet" href="{{ asset('css/empresas.css') }}">
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
                <a href="{{route('Empresa.index')}}"><button class="button-admin">Ver Empresas</button></a>
                <a href="{{route('Empresa.new')}}"><button class="button-admin">+ Nuevo Empresa</button></a>
                <a href="{{route('Event.nuevoEvento')}}"><button class="button-admin">+ Nuevo evento</button></a>
            </div>
            <div class="nav-right">
                <div>{{ Auth::user()->email}}</div>
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
            <div class="footer-mails-mail-title">Enlaces</div>
            <a class="aenlaces" href="http://www.cs.buap.mx/"><div class="footer-mails-mail">http://www.cs.buap.mx</div></a>
            <a class="aenlaces" href="https://vinculacion.cs.buap.mx/?page_id=1015"><div class="footer-mails-mail">https://vinculacion.cs.buap.mx</div></a>
            <a class="aenlaces" href="https://www.buap.mx/"><div class="footer-mails-mail">https://www.buap.mx</div></a>
        </div>
        <div class="footer-info">
            <div class="footer-info-title-tile">Bolsa de trabajo</div>
            <div class="footer-info-title">Facultad de Computación</div>
            <div class="footer-info-title">Benemérita Universidad Autónoma de Puebla</div>
            <div class="footer-info-title">Vinculación Facultad de Computación</div>
            <div>
                <div class="footer-info-title">Version beta1.0</div>
            </div>
        </div>
        <a href="{{route('inicio.logout')}}"><button class="footer-button">Cerrar sesión</button></a>
    </footer>
</body>
</html>
