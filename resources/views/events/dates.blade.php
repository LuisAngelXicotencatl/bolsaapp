@extends('layouts.plantilla')

@section('title', $event->titulo)

@section("content")
<main>
    <div class="event-i">
        <div class="event-i-title">{{ $event->titulo }}</div>
        <div class="event-i-sub">{{ $event->subtitulo }}</div>
        <p class="event-i-descripcion">{{ $event->descripcion }}</p>
        <div class="event-i-details">
            <div class="event-i-info">
                <li>
                    <ul>Fecha: {{ $event->fecha }}</ul>
                    <ul>Lugar: {{ $event->lugar }}</ul>
                </li>
            </div>
        </div>
    <div class="eventos-title">Fechas disponibles</div>
        <section class="soon">
            @foreach($eventDates as $eventDate)
                <div class="soon-event">
                    <div class="soon-event-date">
                        <div class="soon-event-info-label">{{ $eventDate->date->fecha }}</div>
                        <div class="soon-event-info-label">{{ $eventDate->date->hora }}</div>
                    </div>
                    <div class="soon-event-info">
                        <div class="soon-event-info-label"></div>
                        <div class="tarjet-event-buttons">
                            <form action="{{route('event.destroyDate', $eventDate->date->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="tarjet-event-button-deletenew" type="submit">Eliminar</button>
                            </form>
                            <a><button class="tarjet-event-button">Modificar</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
</main>
@endsection
