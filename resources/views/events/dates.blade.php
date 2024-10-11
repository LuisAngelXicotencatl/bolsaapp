@extends('layouts.plantilla')

@section('title', $event->titulo)

@section("content")
<main class="bg-gray-50 p-6 rounded-lg shadow-lg">
    <div class="event-i bg-white p-6 rounded-lg shadow-md border border-gray-300">
        <div class="event-i-title text-3xl font-bold text-gray-800">{{ $event->titulo }}</div>
        <div class="event-i-sub text-xl text-gray-600 mt-4">{{ $event->subtitulo }}</div>
        <p class="event-i-descripcion text-gray-700 mt-4">{{ $event->descripcion }}</p>
        <div class="event-i-details bg-gray-100 p-4 rounded-lg shadow-sm mt-6">
            <div class="event-i-info">
                <li class="text-gray-700">
                    <ul>Fecha: {{ $event->fecha }}</ul>
                    <ul>Lugar: {{ $event->lugar }}</ul>
                </li>
            </div>
        </div>
        <div class="mt-6 space-x-4">
            <a class="buttonexcel" href="{{route('date.new', $event->id)}}"><button class="tarjet-event-button-delete bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700" type="submit">Nuevo horario</button></a>
            <a class="buttonexcel" href="{{ route('event.export', $event->id) }}"><button class="tarjet-event-button bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-700">Descargar Excel</button></a>
        </div>
    </div>

    <div class=" text-lg font-semibold text-gray-800 mt-10">Fechas disponibles</div>
    @if($eventDates->count() > 0)
    <section class=" grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        @foreach($eventDates as $eventDate)
            <div class="p-6 rounded-lg shadow-md border border-gray-300">
                <div class="text-gray-700">
                    <div >{{ $eventDate->date->fecha }}</div>
                    <div >{{ $eventDate->date->hora }}</div>
                </div>
                <div class="mt-6 space-x-4">
                    <form action="{{route('event.destroyDate', $eventDate->date->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="tarjet-event-button-delete bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700" type="submit">Eliminar</button>
                    </form>
                </div>
                <div class="mt-6 space-x-4">
                    <a href="{{route('event.updateDate', $eventDate->date->id)}}"><button class="tarjet-event-button-delete bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Modificar</button></a>
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

    <div class="eventos-title text-lg font-semibold text-gray-800 mt-10">Fechas tomadas</div>
    @if($eventDatestake->count() > 0)
        <section class="soon grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
            @foreach($eventDatestake as $eventDatestake)
                <div class="soon-event bg-white p-6 rounded-lg shadow-md border border-gray-300">
                    <div class="soon-event-date text-gray-700">
                        <div class="soon-event-info-label">{{ $eventDatestake->date->fecha }}</div>
                        <div class="soon-event-info-label">{{ $eventDatestake->date->hora }}</div>
                    </div>
                    <div class="soon-event-info mt-4">
                        <div class="soon-event-info-label text-gray-700">{{ $eventDatestake->date->empresa }}</div>
                        <div class="tarjet-event-buttons mt-4">
                            <form action="{{route('event.destroyDate', $eventDatestake->date->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="tarjet-event-button-deletenew bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700" type="submit">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    @else
    <div class="event-i-details mt-6">
        <div class="event-i-sub text-gray-600">Nadie ha tomado alguna cita...</div>
    </div>
    @endif
</main>
@endsection
