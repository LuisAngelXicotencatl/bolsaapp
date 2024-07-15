@extends('layouts.plantilla')
@section('title', 'Nuevo Evento')
@section("content")
    <main>
        <div class="update-content">
            <!--<div class="update-title">Eventos</div>-->
            <div class="update-title">Agregar un nuevo evento</div>
        </div>
        <div class="update-content">
            <form action="{{route('Event.nuevoEventoProcess')}}" method="post">
                @csrf
                @method('put')
                <!--Titulo-->
                <div class="update-event-content">
                    <Label class="update-event-label">Titulo</Label>
                    <input class="update-event-title"  name="titulo" value="{{old('titulo')}}">
                </div>
                @error('titulo')
                <span>*{{$message}}</span>
                @enderror
                <!--subtitulo-->
                <div class="update-event-content">
                    <Label class="update-event-label">Subitulo</Label>
                    <input class="update-event-bubtitle" name="subtitulo" value="{{old('subtitulo')}}">
                </div>
                @error('subtitulo')
                    <br>
                    <span>*{{$message}}</span>
                    <br>
                @enderror
                <!--descripcion-->
                <div class="update-event-content">
                    <label class="update-event-label">Descripcion</label>
                    <textarea  name="descripcion" rows="5">{{old('avatar')}}</textarea>
                </div>
                @error('descripcion')
                    <span>*{{$message}}</span>
                @enderror
                <!--detalles-->
                <div class="event-i-details">
                    <div class="update-event-info event-i-academias">
                        <li>
                            <!--<ul>Fecha: <input type="date"  name="fecha" value="{{old('avatar')}}"></ul>-->
                            <div class="input-container">
                                <ul>Fecha: 
                                    <input name="fecha" value="{{ old('fecha') }}" type="date">
                                </ul>
                            </div>
                            @error('fecha')
                                <span>*{{$message}}</span>
                            @enderror
                            <div class="input-container">
                                <ul>Lugar: 
                                    <input   class="update-event-title" name="lugar" value="{{old('avatar')}}">
                                </ul>
                            </div>
                            @error('lugar')
                                <span>*{{$message}}</span>
                            @enderror
                        </li>
                    </div>
                </div>
                <button class="tarjet-event-button-deleteupdate" type="submit">Agregar Evento</button>
            </form>
        </div>
    </main>
@endsection
