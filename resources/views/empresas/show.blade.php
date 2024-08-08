@extends('layouts.plantilla')
@section('title',)
@section("content")
<main>
    <div class="event-i">
        <div class="event-i-title">{{ $empresa->Nombre }}</div>
        <div class="event-i-sub">{{ $empresa->Descripcion}}</div>
        <div class="event-i-details">
            <div class="event-i-info">
                <li>
                    <ul>Correo: {{ $empresa->email }}</ul>
                    <ul>Pass: {{ $empresa->Contrasena }}</ul>
                </li>
            </div>
        </div>
        <form action="{{route('destroyempresa', $empresa->id)}}" method="POST">
            @csrf
            @method('delete')
            <button class="tarjet-event-button-delete" type="submit">Eliminar empresa</button>
        </form>
        <!--<a href="{{route('destroyempresa', $empresa->id)}}"><button class="tarjet-event-button-delete" type="submit">Eliminar empresa</button></a>-->
</main>
@endsection
