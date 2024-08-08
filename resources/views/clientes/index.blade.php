@extends('layouts.cliente')
@section('title', 'Cursos')
@section("content")
<body>
    <main>
        <div class="welcome">Bienvenido, {{ session('empresa_name')}}.
        </div>
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
                        <a href="{{route('cliente.show', $soon->id)}}"><button class="tarjet-event-button" id="delete">Inscribirme</button></a>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
        <div class="eventos-title">Eventos en los ha participado</div>
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
                        <a href="{{route('cliente.eventshow', $event->id)}}"><button class="tarjet-event-button">Ver</button></a>
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
</body>
@endsection