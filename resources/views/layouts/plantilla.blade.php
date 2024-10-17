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
    <nav class="bg-[#1F2937] border-b border-gray-500 py-4 px-6">
        <div class="container mx-auto flex flex-wrap items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('Event.index') }}">
                    <img class="h-8" src="{{ asset('images/logoFcc.png') }}" alt="Logo FCC">
                </a>
            </div>

            <!-- Menu Toggle Button (visible on mobile) -->
            <div class="md:hidden">
                <button id="menu-toggle" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>

            <!-- Menu Buttons -->
            <div id="menu" class="hidden md:flex md:items-center w-full md:w-auto mt-4 md:mt-0">
                <a href="{{ route('Empresa.index') }}" class="block mt-4 md:inline-block md:mt-0 text-white hover:text-gray-900 mr-4">
                    Ver Empresas
                </a>
                <a href="{{ route('Empresa.new') }}" class="block mt-4 md:inline-block md:mt-0 text-white hover:text-gray-900 mr-4">
                    Nueva Empresa
                </a>
                <a href="{{ route('Event.nuevoEvento') }}" class="block mt-4 md:inline-block md:mt-0 text-white hover:text-gray-900 mr-4">
                    Nuevo Evento
                </a>
                <a href="{{ route('Eventprivate.nuevoEvento') }}" class="block mt-4 md:inline-block md:mt-0 text-white hover:text-gray-900 mr-4">
                    Evento privado
                </a>
                <a href="{{ route('Eventprivate.editindex') }}" class="block mt-4 md:inline-block md:mt-0 text-white hover:text-gray-900">
                    Modificar inicio
                </a>
            </div>

            <!-- User Info -->
            <div class="hidden md:flex items-center mt-4 md:mt-0">
                <span class="text-white mr-4">{{ Auth::user()->email }}</span>
                <img class="h-8 w-8 rounded-full" src="{{ asset('images/vinculacionFcc.png') }}" alt="Perfil Admin">
            </div>
        </div>
    </nav>
    </header>
    
    <script>
        // Toggle menu visibility on mobile
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var menu = document.getElementById('menu');
            menu.classList.toggle('hidden');
        });
    </script>
    
    

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
