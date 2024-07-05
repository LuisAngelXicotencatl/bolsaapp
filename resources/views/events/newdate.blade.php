@extends('layouts.plantilla')

@section('title', $event->titulo)

@section("content")
<main>
    <div class="event-i">
        <div class="event-i-title">{{ $event->titulo }}</div>
        <div class="event-i-sub">{{ $event->subtitulo }}</div>
        <p class="event-i-descripcion">{{ $event->descripcion }}</p>
        <li>
            <ul>Fecha: {{ $event->fecha }}</ul>
            <ul>Lugar: {{ $event->lugar }}</ul>
        </li>
        <div class="event-i-details">
            <div class="event-i-info">
                <form action="{{route('Event.newdateProcess', $event->id)}}" method="post">
                    <div class="eventos-title">Agregar fecha</div>
                    @csrf
                    @method('put')
                    <!--Titulo-->
                    <input type="hidden" value="{{$event->id}}" name="id_event">
                    <div class="update-event-content">
                        <Label class="update-event-label">Fecha</Label>
                        <input class="update-event-title"  name="fecha" type="date">
                        @error('fecha')
                        <span>*{{ $message }}</span>
                    @enderror
                    </div>
                    <!--subtitulo-->
                    <div class="update-event-content">
                        <Label class="update-event-label">Hora</Label>
                        <input class="update-event-bubtitle" name="hora" type="time">
                    @error('hora')
                    <span>*{{ $message }}</span>
                    @enderror
                    </div>
                    <button class="tarjet-event-button-deleteupdate" type="submit">Agregar fecha</button>
                </form>
            </div>
        </div>           
    </div>
</main>
@endsection
