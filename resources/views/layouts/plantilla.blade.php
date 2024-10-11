<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://img.icons8.com/?size=100&id=4dqHoNQ5CC3L&format=png&color=000000">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <header>
        <nav class="bg-[#1F2937] flex items-center justify-between py-4 px-6 flex-wrap">
            <!-- Logo -->
            <div class="flex items-center mb-4 md:mb-0 w-full md:w-auto justify-center md:justify-start">
                <a href="{{ route('Event.index') }}">
                    <img class="h-10" src="{{ asset('images/logoFcc.png') }}" alt="Logo FCC">
                </a>
            </div>
            <!-- Menu Buttons -->
            <div class="flex space-x-4 mb-4 md:mb-0 w-full md:w-auto justify-center">
                <a href="{{ route('Empresa.index') }}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        Ver Empresas
                    </button>
                </a>
                <a href="{{ route('Empresa.new') }}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        + Nueva Empresa
                    </button>
                </a>
                <a href="{{ route('Event.nuevoEvento') }}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        + Nuevo Evento
                    </button>
                </a>
            </div>
            <!-- User Info -->
            <div class="flex items-center space-x-4 w-full md:w-auto justify-center md:justify-end">
                <div class="text-white">{{ Auth::user()->email }}</div>
                <img class="h-10 w-10 rounded-full" src="{{ asset('images/vinculacionFcc.png') }}" alt="Perfil Admin">
            </div>
        </nav>
    </header>

    <main class="container mx-auto py-10 px-4">
        @yield('content')
    </main>

    <footer class="bg-[#1F2937] text-white py-6">
        <div class="container mx-auto flex flex-col md:flex-row justify-between space-y-4 md:space-y-0 px-4">
            <!-- Left Links Section -->
            <div>
                <h4 class="font-bold text-lg mb-2">Enlaces</h4>
                <ul>
                    <li><a class="hover:underline" href="http://www.cs.buap.mx/">http://www.cs.buap.mx</a></li>
                    <li><a class="hover:underline" href="https://vinculacion.cs.buap.mx/?page_id=1015">https://vinculacion.cs.buap.mx</a></li>
                    <li><a class="hover:underline" href="https://www.buap.mx/">https://www.buap.mx</a></li>
                </ul>
            </div>
            <!-- Right Info Section -->
            <div class="text-center md:text-right">
                <h4 class="font-bold text-lg mb-2">Bolsa de trabajo</h4>
                <p>Facultad de Computación</p>
                <p>Benemérita Universidad Autónoma de Puebla</p>
                <p>Vinculación Facultad de Computación</p>
                <p>Versión beta1.0</p>
            </div>
        </div>
        <!-- Logout Button -->
        <div class="text-center mt-4">
            <a href="{{ route('inicio.logout') }}">
                <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">
                    Cerrar sesión
                </button>
            </a>
        </div>
    </footer>
</body>
</html>
