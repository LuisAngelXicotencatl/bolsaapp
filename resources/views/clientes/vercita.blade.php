@extends('layouts.cliente')
@section('title', $event->titulo)
@section("content")
<main class="container mx-auto py-10 px-4">
    <!-- Evento principal -->
    <div class="event-i bg-white shadow-md rounded-lg p-6 mb-6">
        <div class="event-i-title text-2xl font-bold text-gray-800 mb-2">{{ $event->titulo }}</div>
        <div class="event-i-sub text-xl text-gray-600 mb-4">{{ $event->subtitulo }}</div>
        <p class="event-i-descripcion text-gray-700 mb-4">{{ $event->descripcion }}</p>

        <div class="event-i-details bg-gray-100 p-4 rounded-lg">
            <div class="event-i-info">
                <ul class="list-none">
                    <li class="mb-2"><strong>Fecha:</strong> {{ $event->fecha }}</li>
                    <li><strong>Lugar:</strong> {{ $event->lugar }}</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Sección de cita -->
    <div class="eventos-title text-xl font-semibold text-gray-800 mb-4">Mi cita</div>

    @if($date)
    <div class="event-i-details bg-white shadow-md rounded-lg p-6">
        <div class="event-i-sub mb-2"><strong>Fecha:</strong> {{ $date->fecha }}</div>
        <div class="event-i-sub mb-4"><strong>Hora:</strong> {{ $date->hora }}</div>
        <form action="{{ route('destroymicita', $eventEmpresa->id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="tarjet-event-button-c bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg" type="submit">
                Eliminar mi cita
            </button>
        </form>
    </div>
    @else
    <div class="event-i-details bg-yellow-100 text-yellow-800 p-4 rounded-lg">
        <div class="event-i-sub">No se ha encontrado la fecha de la cita.</div>
    </div>
    @endif
</main>
@endsection
