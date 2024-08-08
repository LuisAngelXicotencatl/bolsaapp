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
                    <ul>Premio: {{ $event->premio }}</ul>
                    </li>
                </div>
                <div class="event-i-academias">
                    <li>Empresas y Academias
                        <ul>No disponible</ul>
                        <!--@foreach ($eventEmpresas as $eventEmpresa)
                            <ul>  {{$eventEmpresa->empresa->Nombre}}</ul>
                        @endforeach-->
                    </li>
                </div>
            </div>
        </div>
        <div class="event-i-images">
            @foreach ($event->images as $image)
            <div class="images-i-z">
                    @php
                        $imagePath = 'storage/' . str_replace('\\', '/', $image->image);
                    @endphp
                    <img class="tarjet-event-image" src="{{ asset($imagePath) }}">
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
