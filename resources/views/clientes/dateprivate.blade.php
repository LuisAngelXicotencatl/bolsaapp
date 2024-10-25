@extends('layouts.cliente')
@section('title', $event->titulo)
@section("content")
<main>
    <div class="p-6 max-w-4xl mx-auto bg-white rounded-lg shadow-md">
        <div class="text-3xl font-bold text-gray-800">{{ $event->titulo }}</div>
        <div class="text-xl text-gray-600">{{ $event->subtitulo }}</div>
        <p class="mt-4 text-gray-700">{{ $event->descripcion }}</p>

        <div class="mt-6 space-y-4">
            <div class="text-lg font-semibold">Detalles del Evento:</div>
            <ul class="list-disc list-inside text-gray-600">
                <li>Fecha: {{ $event->fecha }}</li>
                <li>Lugar: {{ $event->lugar }}</li>
            </ul>
        </div>

        <div class=" text-lg font-semibold text-gray-800 mt-10">Fechas agregadas</div>
        @if($EventDates->count() > 0)
        <section class=" grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
            @foreach($EventDates as $eventDate)
                <div class="p-6 rounded-lg shadow-md border border-gray-300">Cita {{ $eventDate->Dateprivate->id }}
                    <div class="text-gray-700">
                        <div >{{ $eventDate->Dateprivate->fecha }}</div>
                        <div >{{ $eventDate->Dateprivate->hora }}</div>
                    </div>
                    <div class="mt-6 space-x-4">
                        <form action="{{route('cliente.destroyDateprivate', $eventDate->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="dateid" value="{{ $eventDate->Dateprivate->id }}">
                            <input type="hidden" name="eventid" value="{{ $eventDate->Eventprivate->id }}">
                            <button class="tarjet-event-button-delete bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700" type="submit">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </section>
        @else
        <div class="event-i-details mt-6">
            <div class="soon-event-date">
                <div class="event-i-sub text-gray-600">No existen horarios disponibles...</div>
            </div>
        </div>
        @endif


        <div class="mt-6 space-y-4">
            <form action="{{ route('cliente.Eventprivateprocess.update', $event->id) }}" method="post" class="space-y-4">
                @csrf
                @method('put')
    
                <!-- Fecha -->
                <div>
                    <label class="block text-gray-700 font-semibold">Fecha</label>
                    <input class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" 
                        name="fecha" type="date">
                    @error('fecha')
                        <span class="text-red-500 text-sm">*{{ $message }}</span>
                    @enderror
                </div>
    
                <!-- Hora -->
                <div>
                    <label class="block text-gray-700 font-semibold">Hora</label>
                    <input class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" 
                        name="hora" type="time">
                    @error('hora')
                        <span class="text-red-500 text-sm">*{{ $message }}</span>
                    @enderror
                </div>
    
                <!-- Botón de Actualizar -->
                <button class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors" type="submit">Actualizar</button>
            </form>
        </div>
    </div>
</main>
@endsection
