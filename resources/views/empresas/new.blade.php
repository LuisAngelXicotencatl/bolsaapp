@extends('layouts.plantilla')
@section('title', 'Nuevo Evento')
@section("content")
    <main>
        <div class="update-content">
            <!--<div class="update-title">Eventos</div>-->
            <div class="update-title">Agregar empresa</div>
        </div>
        <div class="update-content">
            <form action="{{route('Empresa.agregarProcess')}}" method="post">
                @csrf
                @method('put')
                <!--Titulo-->
                <div class="update-event-content">
                    <Label class="update-event-label">Nombre</Label>
                    <input class="update-event-title"  name="nombre" value="{{old('nombre')}}">
                </div>
                @error('titulo')
                <span>*{{$message}}</span>
                @enderror
                <!--subtitulo-->
                <div class="update-event-content">
                    <Label class="update-event-label">Descripcion</Label>
                    <input class="update-event-bubtitle" name="descripcion" value="{{old('descripcion')}}">
                </div>
                @error('descripcion')
                    <br>
                    <span>*{{$message}}</span>
                    <br>
                @enderror
                <button class="tarjet-event-button-deleteupdate" type="submit">Agregar</button>
            </form>
        </div>
    </main>
@endsection
