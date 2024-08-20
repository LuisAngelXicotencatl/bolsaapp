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
        <div>
            <a class="buttonexcel" href="{{route('date.new', $event->id)}}"><button class="tarjet-event-button-delete" type="submit">Nuevo horario</button></a>
            <a class="buttonexcel" href="{{ route('event.export', $event->id) }}"><button class="tarjet-event-button">Descargar Excel</button></a>
        </div>
    </div>
    <div class="eventos-title">Fechas disponibles</div>
    @if($eventDates->count() > 0)
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
                        <a href="{{route('event.updateDate', $eventDate->date->id)}}"><button class="tarjet-event-button">Modificar</button></a>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    @else
    <div class="event-i-details">
        <div class="soon-event-date">
            <div class="event-i-sub">No existen horarios disponibles...</div>
        </div>
    </div>
    @endif
    </div>
    <div class="eventos-title">Fechas tomadas</div>
    @if($eventDatestake->count() > 0)
        <section class="soon">
            @foreach($eventDatestake as $eventDatestake)
                <div class="soon-event">
                    <div class="soon-event-date">
                        <div class="soon-event-info-label">{{ $eventDatestake->date->fecha }}</div>
                        <div class="soon-event-info-label">{{ $eventDatestake->date->hora }}</div>
                    </div>
                    <div class="soon-event-info">
                        <div class="soon-event-info-label">{{$eventDatestake->date->empresa}}</div>
                        <div class="tarjet-event-buttons">
                            <form action="{{route('event.destroyDate', $eventDatestake->date->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="tarjet-event-button-deletenew" type="submit">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    @else
    <div class="event-i-details">
        <div class="event-i-sub">Nadie ha tomado alguna cita..</div>
    </div>
    @endif
    </div>
</main>
@endsection
