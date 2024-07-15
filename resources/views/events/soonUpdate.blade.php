@extends('layouts.plantilla')
@section('title', $event->titulo)
@section("content")
    <main>
        <div class="update-content">
            <div class="update-title">{{$event->titulo}}</div>
            <div class="update-title">Evento con el Id- {{$event->id}} y  con la fecha de {{$event->fecha}}</div>
            <form action="{{route('event.destroy', $event->id)}}" method="POST">
                @csrf
                @method('delete')
                <button class="tarjet-event-button-deletenew" type="submit">Eliminar evento futuro</button>
            </form>
        </div>
        <div class="update-content">
            <form action="{{route('Event.updatefinished', $event->id)}}" method="POST">
                @csrf
                @method('put')
                <button class="tarjet-event-button" type="submit">Marcar evento como terminado</button>
            </form>
        </div>
        <div class="update-content">
            <form action="{{route('Event.updateProcess', $event->id)}}" method="post">
                @csrf
                @method('put')
                <!--Titulo-->
                <div class="update-event-content">
                    <Label class="update-event-label">Titulo</Label>
                    <input class="update-event-title"  name="titulo" value="{{old('titulo',$event->titulo)}}">
                </div>
                @error('titulo')
                <span>*{{$message}}</span>
                @enderror
                <!--subtitulo-->
                <div class="update-event-content">
                    <Label class="update-event-label">Subitulo</Label>
                    <input class="update-event-bubtitle" name="subtitulo" value="{{old('subtitulo',$event->subtitulo)}}">
                </div>
                @error('subtitulo')
                    <br>
                    <span>*{{$message}}</span>
                    <br>
                @enderror
                <!--descripcion-->
                <div class="update-event-content">
                    <label class="update-event-label">Descripcion</label>
                    <textarea  name="descripcion" rows="2">{{old('avatar', $event->descripcion)}}</textarea>
                </div>
                @error('descripcion')
                    <span>*{{$message}}</span>
                @enderror
                <!--detalles-->
                <div class="event-i-details">
                    <div class="update-event-info event-i-academias">
                        <li>
                            <ul>Fecha: <input name="fecha" value="{{old('avatar', $event->fecha)}}"></ul>
                            @error('fecha')
                                <span>*{{$message}}</span>
                            @enderror
                            <ul>Lugar: <input  name="lugar" value="{{old('avatar', $event->lugar)}}"></ul>
                            @error('lugar')
                                <span>*{{$message}}</span>
                            @enderror
                        </li>
                    </div>
                </div>
                <button class="tarjet-event-button-deleteupdate" type="submit">Actualizar infomacion</button>
            </form>
        </div>
    </main>
@endsection
