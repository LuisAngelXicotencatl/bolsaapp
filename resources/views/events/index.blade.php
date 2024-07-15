@extends('layouts.plantilla')
@section('title', 'Cursos')
@section("content")
<main>
    <div class="welcome">Bienvenido de regreso, {{ Auth::user()->name}}.</div>
    <div class="eventos-title">Proximos eventos</div>
    <section class="soon">
        @foreach ($soons as $soon)
        <div class="soon-event">
            <div class="soon-event-date">
                <div class="soon-event-info-label">{{$soon->fecha}}</div>
            </div>
            <div class="soon-event-info">
                <div class="soon-event-info-label">{{$soon->titulo}}</div>
                <div class="tarjet-event-buttons">
                    <a href="{{route('Event.dates', $soon->id)}}"><button class="tarjet-event-button-delete">Fechas</button></a>
                    <a href="{{route('Event.soonUpdate', $soon->id)}}"><button class="tarjet-event-button" id="delete">Modificar</button></a>
                </div>
            </div>
        </div>
        @endforeach
    </section>
    <div class="eventos-title">Eventos pasados</div>
    <!--<section class="eventos">
    @foreach ($events as $event)
        <div class="tarjet-event" id="1">
            <div class="tarjet-event-name">{{$event->titulo}}</div>
            <div class="tarjet-event-info">{{$event->subtitulo}} </div>
            @foreach ($event->images as $image)
            <img class="tarjet-event-image" src="{{ $image->image }}">
            @endforeach
            <div class="tarjet-event-buttons">
                <a href="{{route('Event.update', $event->id)}}"><button class="tarjet-event-button-delete" id="delete">Modificar</button></a>
                <a href="{{route('Event.show', $event->id)}}"><button class="tarjet-event-button">Ver</button></a>
            </div>
            <script src="js/Quiz.js"></script>
        </div>
    @endforeach
    </section>-->
    <section class="eventos">
        @foreach ($events as $event)
            <div class="tarjet-event" id="1">
                <div class="tarjet-event-name">{{$event->titulo}}</div>
                <div class="tarjet-event-info">{{$event->subtitulo}} </div>
                @if ($event->images->count() > 0)
                    @php
                        $imagePath = 'storage/' . str_replace('\\', '/', $event->images->first()->image);
                    @endphp
                    <img class="tarjet-event-image" src="{{ asset($imagePath) }}">
                @endif
                <div class="tarjet-event-buttons">
                    <a href="{{route('Event.update', $event->id)}}"><button class="tarjet-event-button-delete" id="delete">Modificar</button></a>
                    <a href="{{route('Event.show', $event->id)}}"><button class="tarjet-event-button">Ver</button></a>
                </div>
                <script src="{{ asset('js/Quiz.js') }}"></script>
            </div>
        @endforeach
    </section>
    <div class="tarjet-event-more">
        <button class="tarjet-event-button" id="verMasBtn">Ver más</button>
        <button class="tarjet-event-button" id="verMenosBtn">Ver menos</button>
    </div>
    <script src="{{ asset('js/bucle.js ') }}"></script>
</main>
@endsection