@extends('layouts.inicio')
@section('title', 'Home')
@section("content")
    <main class="section-w" id="nosotros">
        <!--Nosotros-->
        <!--<div class="nosotros">
            <div class="nostros-content">
                <div class="nostros-content-title">Bolsa de trabajo FCC</div>
                <div class="nostros-content-text">La Bolsa de Trabajo de la Facultad de Ciencias de la Computación tiene el compromiso de ser un centro de información y consulta que vincule a nuestros alumnos y egresados con las necesidades profesionales de las empresas y organizaciones, brindando una alternativa viable y sustentable que cubra el perfil que solicitan.</div>
            </div>
            <div class="nostros-images">
                <div class="nostros-images-col-a">
                    <img src="{{ asset('images/empresas/audi.png') }}" alt="" class="nostros-images-col-a-image">
                    <img src="{{ asset('images/empresas/Oracle_Logo.jpg') }}" alt="" class="nostros-images-col-a-image">
                </div>
                <div class="nostros-images-col-b">
                    <img src="{{ asset('images/empresas/tsystemsmexico.png') }}" alt="" class="nostros-images-col-b-image">
                    <img src="{{ asset('images/empresas/buap.png') }}" alt="" class="nostros-images-col-b-image">
                </div>
                <div class="nostros-images-col-c">
                    <img src="{{ asset('images/empresas/vw.png') }}" alt="" class="image">
                    <img src="{{ asset('images/empresas/meta2.png') }}" alt="" class="image">
                    <img src="{{ asset('images/empresas/Oracle_Logo.jpg') }}" alt="" class="image">
                </div>
            </div>
        </div>-->
        
        
        <!--<div class="nosotros">
            <div class="nostros-content">
                <div class="nostros-content-title">Bolsa de trabajo FCC</div>
                <div class="nostros-content-text">La Bolsa de Trabajo de la Facultad de Ciencias de la Computación tiene el compromiso de ser un centro de información y consulta que vincule a nuestros alumnos y egresados con las necesidades profesionales de las empresas y organizaciones, brindando una alternativa viable y sustentable que cubra el perfil que solicitan.</div>
            </div>
            <img src="{{ asset('images/empresas/buap.png') }}" alt="" class="fcc">
        </div>-->
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
        <div class="eventos-title">Eventos pasados</div>
        <section class="eventos" id="eventos">
            @foreach ($events as $event)
            <div class="tarjet-event" id="2">
                <div class="tarjet-event-name">{{$event->titulo}}</div>
                <div class="tarjet-event-info">{{$event->subtitulo}} </div>
                @if ($event->images->count() > 0)
                    @php
                        $imagePath = 'storage/' . str_replace('\\', '/', $event->images->first()->image);
                    @endphp
                    <img class="tarjet-event-image" src="{{ asset($imagePath) }}">
                @endif
                <div class="tarjet-event-buttons">
                    <a class="tarjet-event-link">{{$event->fecha}}-></a>
                    <a href="{{route('Event.indexshow', $event->id)}}"><button class="tarjet-event-button">Leer mas</button></a>
                </div>
            </div>
            @endforeach
        </section>
        <div class="tarjet-event-more">
            <button class="tarjet-event-button" id="verMasBtn">Ver más</button>
            <button class="tarjet-event-button" id="verMenosBtn">Ver menos</button>
        </div>
        <script src="{{ asset('js/bucle.js ') }}"></script>
        <section class="coordinator-container" id="cordinador">
            <div class="coordinator-image">
                <img src="{{ asset('images/ejm2.jpg') }}" id="img4"alt="Foto del coordinador">
            </div>
            <div class="coordinator-info">
                <h2 class="coordinator-title">Coordinadora Bolsa de Trabajo.</h2>
                <h2 class="coordinator-title">Dra. Patricia Silva Sánchez.</h2>
                <p class="coordinator-p">Tenemos más de 100 empresas Globales vinculadas a nuestra Bolsa de Trabajo.Tenemos la fortuna de tener ese acercamiento con cada empresa que quiere apoyar y aportar a nuestra comunidad. Empresas que ofrecen Practicas Profesionales y Servicio Social, además de vacantes, realizamos convenios legales para asegurar los beneficios oficialmente por ambas partes.</p>
                <p class="coordinator-contac">Contacto: <a href="mailto:bolsadetrabajo.fcc@correo.buap.mx">bolsadetrabajo.fcc@correo.buap.mx</a></p>
            </div>
        </section>  
    </main>
@endsection