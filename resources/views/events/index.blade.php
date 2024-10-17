@extends('layouts.plantilla')
@section('title', 'Cursos')
@section('content')
<body class="bg-gray-100 text-gray-800">
<main class="container mx-auto py-10">
    <div class="text-2xl font-bold text-center mb-6 animate-fade-in">
        Bienvenido, {{ Auth::user()->name }}.
    </div>
    @foreach ($private as $private)
        @if($private !== null && $private !== '')
            <div class="text-xl font-semibold mb-4">Eventos privados</div>
        @endif
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white shadow-md rounded-lg p-6 transition transform hover:-translate-y-2 hover:shadow-xl animate-fade-in">
                    <div class="text-gray-600 mb-2">{{ $private->fecha }} - {{ $private->empresa}}</div>
                    <div class="text-lg font-semibold mb-4">{{ $private->titulo }}</div>
                        <a href="{{ route('Eventprivate.show', $private->id) }}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                                Ver
                            </button>
                        </a>
                    </div>
                </div>
        </section>
    @endforeach

    <div class="text-xl font-semibold mb-4">Próximos eventos</div>
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @if($soons === null || $soons->isEmpty())
            <div class="text-gray-600 mb-4">No existen eventos futuros</div>
        @else
            @foreach ($soons as $soon)
            <div class="bg-white shadow-md rounded-lg p-6 transition transform hover:-translate-y-2 hover:shadow-xl animate-fade-in">
                <div class="text-gray-600 mb-2">{{ $soon->fecha }}</div>
                <div class="text-lg font-semibold mb-4">{{ $soon->titulo }}</div>
                <div class="flex space-x-4">
                    <a href="{{ route('Event.dates', $soon->id) }}">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                            Fechas
                        </button>
                    </a>
                    <a href="{{ route('Event.soonUpdate', $soon->id) }}">
                        <button class="bg-yellow-900 hover:bg-yellow-700 text-white py-2 px-4 rounded">
                            Modificar
                        </button>
                    </a>
                </div>
            </div>
            @endforeach
        @endif
    </section>

    <div class="text-xl font-semibold mt-10 mb-4">Eventos pasados</div>
    <section class="contenedor-mov grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 eventos" id="eventos">
        @foreach ($events as $event)
        <div class="contenedor-mov-i bg-white shadow-md rounded-lg p-6 transition transform hover:-translate-y-2 hover:shadow-xl animate-fade-in tarjet-event" id="2">
            <div class="text-lg font-semibold mb-2">{{ $event->titulo }}</div>
            <div class="text-gray-600 mb-4">{{ $event->subtitulo }}</div>
            @if ($event->images->count() > 0)
                @php
                    $imagePath = 'storage/' . str_replace('\\', '/', $event->images->first()->image);
                @endphp
                <img class="w-full h-40 object-cover rounded-lg mb-4" src="{{ asset($imagePath) }}">
            @endif
            <div class="flex space-x-4 tarjet-event-buttons-mov">
                <a href="{{ route('Event.update', $event->id) }}">
                    <button class="bg-green-700 hover:bg-yellow-700 text-white py-2 px-4 rounded">
                        Modificar
                    </button>
                </a>
                <a href="{{ route('Event.show', $event->id) }}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        Ver
                    </button>
                </a>
            </div>
        </div>
        @endforeach
    </section>

    <div class="text-center mt-10">
        <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded tarjet-event-button" id="verMasBtn">
            Ver más
        </button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded tarjet-event-button" id="verMenosBtn">
            Ver menos
        </button>
    </div>
    
    <script src="{{ asset('js/bucle.js') }}"></script>
</main>
</body>
@endsection
