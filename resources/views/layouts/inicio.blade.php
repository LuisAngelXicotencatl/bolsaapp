<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-gray-900 shadow-md">
        <nav class="container mx-auto flex justify-between items-center py-4">
            <div class="flex items-center">
                <a href="{{route('Event.default')}}">
                    <img class="h-12" src="{{ asset('images/logoFcc.png') }}" alt="Logo FCC">
                </a>
            </div>
            <section class="flex space-x-8">
                <a href="#nosotros" class="text-white hover:text-blue-500">Nosotros</a>
                <a href="#eventos" class="text-white hover:text-blue-500">Eventos</a>
                <a href="#cordinador" class="text-white hover:text-blue-500">Coordinadora</a>
            </section>
            <img class="h-12" src="{{ asset('images/logovfcc.png') }}" alt="Logo VFCC">
        </nav>
    </header>
    
    <main class="container mx-auto py-8">
        @yield('content')
    </main>
    
    <footer class="bg-gray-900 text-white py-8">
        <div class="container mx-auto grid grid-cols-2 gap-8">
            <div>
                <h4 class="font-semibold text-lg mb-4">Enlaces</h4>
                <ul>
                    <li><a class="text-gray-300 hover:text-white" href="http://www.cs.buap.mx/">http://www.cs.buap.mx</a></li>
                    <li><a class="text-gray-300 hover:text-white" href="https://vinculacion.cs.buap.mx/?page_id=1015">https://vinculacion.cs.buap.mx</a></li>
                    <li><a class="text-gray-300 hover:text-white" href="https://www.buap.mx/">https://www.buap.mx</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-lg mb-4">Información</h4>
                <p>Facultad de Computación</p>
                <p>Benemérita Universidad Autónoma de Puebla</p>
                <p>Vinculación Facultad de Computación</p>
                <p>Version beta1.0</p>
            </div>
        </div>
        <div class="container mx-auto flex justify-between items-center mt-8">
            <a  href="{{route('inicio.formlogin')}}">
                <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Iniciar sesión</button>
            </a>
            <div class="flex space-x-4">
                <a href="{{route('index.questions')}}">
                    <button class="bg-gray-700 hover:bg-gray-800 text-white py-2 px-4 rounded">Comentarios y sugerencias</button>
                </a>
                <a href="https://vinculacion.cs.buap.mx/?page_id=865">
                    <button class="bg-gray-700 hover:bg-gray-800 text-white py-2 px-4 rounded">¿Cómo me registro?</button>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
