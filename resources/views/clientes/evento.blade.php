@extends('layouts.cliente')
@section('title', $event->titulo)
@section("content")
<main>
    <div class="event-i">
        <div class="event-i-title">{{ $event->titulo }}</div>
        <div class="event-i-sub">{{ $event->subtitulo }}</div>
        <p class="event-i-descripcion">{{ $event->descripcion }}, {{ $event->id }}</p>
        <div class="event-i-details">
            <div class="event-i-info">
                <ul>
                    <li>Fecha: {{ $event->fecha }}</li>
                    <li>Lugar: {{ $event->lugar }}</li>
                </ul>
            </div>
        </div>

        @if($eventEmpresa)
            <div class="eventos-title">Cita ya programada</div>
            <div class="event-i-details">
                <div class="event-i-sub">Ya tienes una cita programada para este evento.</div>
                @if($eventEmpresa)
                    <a href="{{ route('vercita', $eventEmpresa->id) }}"><button class="tarjet-event-button-c" type="button">Ver cita</button></a>
                @endif
            </div>
        @else
            <div class="eventos-title">Fechas disponibles {{ session('empresa_id') }}</div>
            @if($eventDates->count() > 0)
                <section class="soon">
                    @foreach($eventDates as $eventDate)
                        <div class="soon-event">
                            @if($eventDate->date)
                                <div class="soon-event-date">
                                    <div class="soon-event-info-label">{{ $eventDate->date->fecha }}</div>
                                    <div class="soon-event-info-label">{{ $eventDate->date->hora }}</div>
                                    <div class="soon-event-info-label">{{ $eventDate->date->id }}</div>
                                </div>
                                <div class="soon-event-info">
                                    <div class="tarjet-event-buttons">
                                        <form action="{{ route('agendarcita', $eventDate->date->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="idempresa" value="{{ session('empresa_id') }}">
                                            <input type="hidden" name="idevent" value="{{ $event->id }}">
                                            <input type="hidden" name="nameempresa" value="{{ session('empresa_name') }}">
                                            <button class="tarjet-event-button-c" type="submit">Tomar cita</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
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
        @endif

        <div class="eventos-title">Fechas tomadas</div>
        @if($eventDatestake->count() > 0)
            <section class="soon">
                @foreach($eventDatestake as $takenDate)
                    <div class="soon-event">
                        @if($takenDate->date)
                            <div class="soon-event-date">
                                <div class="soon-event-info-label">{{ $takenDate->date->fecha }}</div>
                                <div class="soon-event-info-label">{{ $takenDate->date->hora }}</div>
                            </div>
                            <div class="event-i-sub-c">No disponible</div>
                        @endif
                    </div>
                @endforeach
            </section>
        @else
            <div class="event-i-details">
                <div class="event-i-sub">No hay citas tomadas</div>
            </div>
        @endif
    </div>
</main>
@endsection
