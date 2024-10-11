@extends('layouts.plantilla')

@section('title', $event->titulo)

@section("content")
<main class="bg-gray-50 p-6 rounded-lg shadow-lg">
    <div class="event-i bg-white p-6 rounded-lg shadow-md border border-gray-300">
        <div class="event-i-title text-3xl font-bold text-gray-800">{{ $event->titulo }}</div>
        <div class="event-i-sub text-xl text-gray-600 mt-4">{{ $event->subtitulo }}</div>
        <p class="event-i-descripcion text-gray-700 mt-4">{{ $event->descripcion }}</p>
        <li class="mt-6 text-gray-700">
            <ul>Fecha: {{ $event->fecha }}</ul>
            <ul>Lugar: {{ $event->lugar }}</ul>
        </li>
        <div class="event-i-details mt-6">
            <div class="event-i-info bg-gray-100 p-4 rounded-lg shadow-sm">
                <form action="{{route('Event.newdateProcess', $event->id)}}" method="post" class="space-y-4">
                    <div class="eventos-title text-lg font-semibold text-gray-800">Agregar fecha</div>
                    @csrf
                    @method('put')
                    <!--Titulo-->
                    <input type="hidden" value="{{$event->id}}" name="id_event">
                    <div class="update-event-content">
                        <Label class="update-event-label text-gray-700 font-semibold">Fecha</Label>
                        <input class="update-event-title border border-gray-300 rounded-lg p-2 w-full mt-2" name="fecha" type="date">
                        @error('fecha')
                        <span class="text-red-500 text-sm">*{{ $message }}</span>
                        @enderror
                    </div>
                    <!--subtitulo-->
                    <div class="update-event-content">
                        <Label class="update-event-label text-gray-700 font-semibold">Hora</Label>
                        <input class="update-event-bubtitle border border-gray-300 rounded-lg p-2 w-full mt-2" name="hora" type="time">
                        @error('hora')
                        <span class="text-red-500 text-sm">*{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="tarjet-event-button-deleteupdate bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 mt-4" type="submit">Agregar fecha</button>
                </form>
            </div>
        </div>           
    </div>
</main>
@endsection
