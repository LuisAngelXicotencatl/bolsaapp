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
                    <ul>Premio: {{ $event->premio }}</ul>
                    </li>
                </div>
                <div class="event-i-academias">
                    <li>Empresas y Academias
                        <ul>Oracle</ul>
                        <ul>VW</ul>
                        <ul>T-SYSTEM</ul>
                    </li>
                </div>
            </div>
        </div>
    </main>
@endsection
