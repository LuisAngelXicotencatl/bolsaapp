@extends('layouts.inicio')
@section('title', 'Home')
@section("content")
    <main class="section-w" id="nosotros">
        <!--Nosotros-->
        <div class="flex flex-col lg:flex-row items-center bg-white p-6 lg:p-10 rounded-lg shadow-lg">
            <div class="lg:w-2/3 space-y-4">
                <div class="text-2xl lg:text-3xl font-bold text-gray-800">Bolsa de trabajo FCC</div>
                <div class="text-gray-600">
                    La Bolsa de Trabajo de la Facultad de Ciencias de la Computación tiene el compromiso de ser un centro de información y consulta que vincule a nuestros alumnos y egresados con las necesidades profesionales de las empresas y organizaciones, brindando una alternativa viable y sustentable que cubra el perfil que solicitan.
                </div>
            </div>
            <img src="{{ asset('images/empresas/buap.png') }}" alt="" class="lg:w-1/3 w-2/3 mt-6 lg:mt-0 lg:ml-6 object-contain">
        </div>
        <!--EVENTOS-->
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
                    <a href="{{ route('Event.indexshow', $event->id) }}">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-10 rounded">
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
        <section class="coordinator-container bg-white shadow-md rounded-lg p-10 mt-10" id="cordinador">
            <div class="flex flex-col md:flex-row items-center md:items-start">
                <div class="coordinator-image mb-10 md:mb-0 md:mr-10">
                    <img src="{{ asset('images/ejm2.jpg') }}" id="img4" alt="Foto del coordinador" class="w-150 h-48 object-cover rounded-xl border border-gray-300">
                </div>
                <div class="coordinator-info text-gray-800">
                    <h2 class="text-2xl font-semibold text-blue-700 mb-2">Coordinadora Bolsa de Trabajo</h2>
                    <h2 class="text-xl font-medium text-gray-700 mb-4">Dra. Patricia Silva Sánchez</h2>
                    <p class="mb-4 text-gray-600">Tenemos más de 100 empresas globales vinculadas a nuestra Bolsa de Trabajo. Tenemos la fortuna de tener ese acercamiento con cada empresa que quiere apoyar y aportar a nuestra comunidad. Empresas que ofrecen prácticas profesionales y servicio social, además de vacantes, realizamos convenios legales para asegurar los beneficios oficialmente por ambas partes.</p>
                    <p class="text-gray-600">Contacto: 
                        <a href="mailto:bolsadetrabajo.fcc@correo.buap.mx" class="text-blue-600 hover:text-blue-800">bolsadetrabajo.fcc@correo.buap.mx</a>
                    </p>
                </div>
            </div>
        </section>
    </main>
@endsection