@extends('layouts.cliente')
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
    </div>

    <div class="eventos-title">Mi cita</div>
    @if($date)
    <div class="event-i-details">
        <div class="event-i-sub">Fecha: {{ $date->fecha }}</div>
        <div class="event-i-sub">Hora: {{ $date->hora }}</div>
        <form action="{{ route('destroymicita', $eventEmpresa->id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="tarjet-event-button-c" type="submit">Eliminar mi cita</button>
        </form>
    </div>
    @else
        <div class="event-i-details">
            <div class="event-i-sub">No se ha encontrado la fecha de la cita.</div>
        </div>
    @endif
</main>
@endsection
