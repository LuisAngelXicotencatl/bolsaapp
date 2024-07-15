@extends('layouts.inicio')
@section('title', 'Home')
@section("content")
    <main class="section-w" id="nosotros">
        <!--Nosotros-->
        <div class="nosotros">
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
                <h2 class="coordinator-title">Nombre del Coordinador</h2>
                <p class="coordinator-p">Información sobre el coordinador Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla gravida lorem at libero tincidunt consequat. Fusce rutrum sit amet justo eget hendrerit.</p>
                <p class="coordinator-contac">Contacto: <a href="mailto:correo@coordinador.com">correo@coordinador.com</a></p>
            </div>
        </section>  
    </main>
@endsection