@extends('layouts.cliente')
@section('title', 'Cursos')
@section("content")
<body>
    <main>
        <div class="text-2xl font-bold text-center mb-6 animate-fade-i">Bienvenido, {{ session('empresa_name')}}.
        </div>
        @foreach ($privates as $private)
        @if($private !== null && $private !== '')
            <div class="text-xl font-semibold mb-4">Evento {{ session('empresa_name')}}</div>
            <div class="text-gray-600 mb-4">En esta area encontrara eventos privados disponibles para editar, fechas,descripcion y cronograma.</div>
        @endif
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white shadow-md rounded-lg p-6 transition transform hover:-translate-y-2 hover:shadow-xl animate-fade-in">
                    <div class="text-gray-600 mb-2">{{ $private->fecha }} - {{ $private->empresa}}</div>
                    <div class="text-lg font-semibold mb-4">{{ $private->titulo }}</div>
                        <a href="{{ route('cliente.Eventprivate.show', $private->id) }}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                                Ver
                            </button>
                        </a>
                    </div>
                </div>
        </section>
        @endforeach
        <div class="text-xl font-semibold mt-10 mb-4">Proximos eventos</div>
        <section class="soon ">
            @foreach ($soons as $soon)
            <div class="soon-event bg-white shadow-md rounded-lg p-4 mb-6 flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0 md:space-x-4">
                <!-- Event Date -->
                <div class="soon-event-date bg-blue-100 text-blue-800 px-4 py-2 rounded-lg">
                    <div class="soon-event-info-label text-xl font-semibold">{{ $soon->fecha }}</div>
                </div>
            
                <!-- Event Info -->
                <div class="soon-event-info flex-1">
                    <div class="soon-event-info-label text-lg font-bold text-gray-700">{{ $soon->titulo }}</div>
                    <div class="tarjet-event-buttons mt-4">
                        <a href="{{ route('cliente.show', $soon->id) }}">
                            <button class="tarjet-event-button bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
                                Inscribirme
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
        <div class="text-xl font-semibold mt-10 mb-4">Eventos en los ha participado</div>
        <section class="contenedor-mov grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 eventos" id="eventos">
            @foreach ($events as $event)
                <div class="bg-white shadow-md rounded-lg p-6 transition transform hover:-translate-y-2 hover:shadow-xl animate-fade-in tarjet-event" id="1">
                    <div class="text-lg font-semibold mb-2">{{$event->titulo}}</div>
                    <div class="text-gray-600 mb-4">{{$event->subtitulo}} </div>
                    @if ($event->images->count() > 0)
                        @php
                            $imagePath = 'storage/' . str_replace('\\', '/', $event->images->first()->image);
                        @endphp
                        <img class="w-full h-40 object-cover rounded-lg mb-4" src="{{ asset($imagePath) }}">
                    @endif
                    <div class="flex space-x-4 tarjet-event-buttons-mov">
                        <a href="{{route('cliente.eventshow', $event->id)}}"><button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-10 rounded">Ver</button></a>
                    </div>
                    <script src="{{ asset('js/Quiz.js') }}"></script>
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
        <script src="{{ asset('js/bucle.js ') }}"></script>
    </main>
</body>
@endsection