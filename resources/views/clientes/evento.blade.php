@extends('layouts.cliente')
@section('title', $event->titulo)
@section("content")
<main class="container mx-auto py-10 px-4">
    <!-- Detalles del evento -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div class="text-2xl font-bold text-gray-800 mb-2">{{ $event->titulo }}</div>
        <div class="text-xl text-gray-600 mb-4">{{ $event->subtitulo }}</div>
        <p class="text-gray-700 mb-4">{{ $event->descripcion }}, {{ $event->id }}</p>
        <div class="bg-gray-100 p-4 rounded-lg">
            <ul class="list-none">
                <li class="mb-2"><strong>Fecha:</strong> {{ $event->fecha }}</li>
                <li><strong>Lugar:</strong> {{ $event->lugar }}</li>
            </ul>
        </div>

        @if($eventEmpresa)
            <div class="text-xl font-semibold text-gray-800 mt-6 mb-4">Cita ya programada</div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="text-lg text-gray-700 mb-4">Ya tienes una cita programada para este evento.</div>
                <a href="{{ route('vercita', $eventEmpresa->id) }}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
                        Ver cita
                    </button>
                </a>
            </div>
        @else
            <div class="text-xl font-semibold text-gray-800 mt-6 mb-4">Fechas disponibles {{ session('empresa_id') }}</div>
            @if($eventDates->count() > 0)
                <section class="space-y-4">
                    @foreach($eventDates as $eventDate)
                        <div class="bg-white shadow-md rounded-lg p-4">
                            @if($eventDate->date)
                                <div class="text-gray-700 mb-2">
                                    <div><strong>Fecha:</strong> {{ $eventDate->date->fecha }}</div>
                                    <div><strong>Hora:</strong> {{ $eventDate->date->hora }}</div>
                                    <div><strong>ID:</strong> {{ $eventDate->date->id }}</div>
                                </div>
                                <form action="{{ route('agendarcita', $eventDate->date->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="idempresa" value="{{ session('empresa_id') }}">
                                    <input type="hidden" name="idevent" value="{{ $event->id }}">
                                    <input type="hidden" name="nameempresa" value="{{ session('empresa_name') }}">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg" type="submit">
                                        Tomar cita
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </section>
            @else
                <div class="bg-yellow-100 text-yellow-800 p-4 rounded-lg">
                    <div class="text-lg">No existen horarios disponibles...</div>
                </div>
            @endif
        @endif

        <div class="text-xl font-semibold text-gray-800 mt-6 mb-4">Fechas tomadas</div>
        @if($eventDatestake->count() > 0)
            <section class="space-y-4">
                @foreach($eventDatestake as $takenDate)
                    <div class="bg-white shadow-md rounded-lg p-4">
                        @if($takenDate->date)
                            <div class="text-gray-700 mb-2">
                                <div><strong>Fecha:</strong> {{ $takenDate->date->fecha }}</div>
                                <div><strong>Hora:</strong> {{ $takenDate->date->hora }}</div>
                            </div>
                            <div class="text-red-500 font-semibold">No disponible</div>
                        @endif
                    </div>
                @endforeach
            </section>
        @else
            <div class="bg-gray-100 p-4 rounded-lg">
                <div class="text-lg text-gray-700">No hay citas tomadas</div>
            </div>
        @endif
    </div>
</main>
@endsection
