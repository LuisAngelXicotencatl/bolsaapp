@extends('layouts.plantilla')
@section('title', 'Empresas')
@section("content")
<main>
    <div class="eventos-title">Empresas</div>
    <section class="soon">
        @foreach ($empresas as $empresa)
        <div class="soon-event">
            <div class="soon-event-date">
                <div class="soon-event-info-label">{{$empresa->Nombre}}</div>
            </div>
            <div class="soon-event-info">
                <div class="soon-event-info-label">{{$empresa->Descripcion}}</div>
                <div class="tarjet-event-buttons">
                    <a href="{{route('Event.soonUpdate', $empresa->id)}}"><button class="tarjet-event-button" id="delete">Ver</button></a>
                </div>
            </div>
        </div>
        @endforeach
    </section>
    <script src="js/bucle.js"></script>
</main>
@endsection