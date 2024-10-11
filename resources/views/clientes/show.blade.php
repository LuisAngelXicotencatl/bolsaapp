@extends('layouts.inicio')
@section('title', $event->titulo)
@section("content")
<main class="bg-gray-100 py-8">
    <div class="container mx-auto bg-white shadow-md rounded-lg p-6">
        <div class="event-i mb-6">
            <h1 class="text-3xl font-bold text-blue-700 mb-2">{{ $event->titulo }}</h1>
            <h2 class="text-xl font-semibold text-gray-600 mb-4">{{ $event->subtitulo }}</h2>
            <p class="text-gray-700 mb-6">{{ $event->descripcion }}</p>
        </div>
        
        <div class="event-i-details grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
            <div class="event-i-info text-gray-700">
                <ul class="space-y-2">
                    <li><strong>Fecha:</strong> {{ $event->fecha }}</li>
                    <li><strong>Lugar:</strong> {{ $event->lugar }}</li>
                    <li><strong>Premio:</strong> {{ $event->premio }}</li>
                </ul>
            </div>
            <div class="event-i-academias text-gray-700">
                <strong>Empresas y Academias</strong>
                <ul class="space-y-2 mt-2">
                    @if ($eventEmpresas->count() > 0)
                        @foreach ($eventEmpresas as $eventEmpresa)
                            <li>{{ $eventEmpresa->empresa->Nombre }}</li>
                        @endforeach 
                    @else
                        <li>No disponible</li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="event-i-images grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($event->images as $image)
                @php
                    $imagePath = 'storage/' . str_replace('\\', '/', $image->image);
                @endphp
                <img class="event-i-image rounded-lg shadow-md" src="{{ asset($imagePath) }}" alt="Imagen del evento">
            @endforeach
        </div>
    </div>
</main>
@endsection
