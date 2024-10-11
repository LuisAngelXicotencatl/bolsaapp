<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>
    <title>@yield('title')</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-gray-800 text-white">
        <nav class="container mx-auto flex justify-between items-center py-4 px-6">
            <!-- Left Section -->
            <div class="flex items-center space-x-4">
                <a href="{{route('cliente.index')}}">
                    <img class="h-10" src="{{ asset('images/logoFcc.png') }}" alt="Logo FCC">
                </a>
                <div class="text-sm">{{ session('empresa_id') }}</div>
            </div>

            <!-- Right Section -->
            <div class="flex items-center space-x-4">
                <div class="text-sm">{{ session('empresa_email') }}</div>
                <img class="h-10 w-10 rounded-full" id="profile-image" src="{{ asset('images/vinculacionFcc.png') }}" alt="Perfil Admin">
            </div>
        </nav>
    </header>

    <main class="container mx-auto py-10 px-4">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-6 mt-10">
        <div class="container mx-auto flex flex-col md:flex-row justify-between space-y-4 md:space-y-0 px-4">
            <!-- Links Section -->
            <div>
                <h4 class="font-bold text-lg mb-2">Enlaces</h4>
                <ul class="space-y-1">
                    <li><a class="hover:underline" href="http://www.cs.buap.mx/">http://www.cs.buap.mx</a></li>
                    <li><a class="hover:underline" href="https://vinculacion.cs.buap.mx/?page_id=1015">https://vinculacion.cs.buap.mx</a></li>
                    <li><a class="hover:underline" href="https://www.buap.mx/">https://www.buap.mx</a></li>
                </ul>
            </div>

            <!-- Info Section -->
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
            <a href="{{route('inicio.logout')}}">
                <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">
                    Cerrar sesión
                </button>
            </a>
        </div>
    </footer>
</body>
</html>
