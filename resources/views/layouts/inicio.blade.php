<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav class="nav">
            <img class="imagelogo" src="images/logoFcc.png">
            <section class="menu">
                <a href="#nosotros" class="label">Nosotros</a>
                <a href="#eventos" class="label">Eventos</a>
                <a href="#cordinador" class="label">Cordinadora</a>
            </section>
            <a href="#empresas" id="vinculacion" class="label">Vinculacion</a>
            <img class="imagelogo" id="imagelogo"src="images/vinculacionFcc.png">
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
