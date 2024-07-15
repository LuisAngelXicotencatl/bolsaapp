@extends('layouts.inicio')
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
                        @foreach ($eventEmpresas as $eventEmpresa)
                            <ul> --> {{$eventEmpresa->empresa->Nombre}}</ul>
                        @endforeach
                    </li>
                </div>
            </div>
        </div>
        <div class="event-i-images">
            @foreach ($event->images as $image)
                    @php
                        $imagePath = 'storage/' . str_replace('\\', '/', $image->image);
                    @endphp
                    <img class="event-i-image" src="{{ asset($imagePath) }}">
            @endforeach
        </div>
    </div>
</main>
@endsection
