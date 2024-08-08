@extends('layouts.plantilla')

@section('title', $date->id)

@section("content")
<main>
    <div class="event-i">
        <div class="event-i-details">
            <div class="event-i-info">
                <form action="{{ route('Event.updateDateprocess', $date->id) }}" method="post">
                    <div class="eventos-title">Actualizar fecha</div>
                    @csrf
                    @method('put')
                    <!-- Fecha -->
                    <div class="update-event-content">
                        <label class="update-event-label">Fecha</label>
                        <input class="update-event-title" value="{{ $date->fecha }}" name="fecha" type="date">
                        @error('fecha')
                            <span>*{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Hora -->
                    <div class="update-event-content">
                        <label class="update-event-label">Hora</label>
                        <input class="update-event-bubtitle" value="{{ $date->hora }}" name="hora" type="time">
                        @error('hora')
                            <span>*{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="tarjet-event-button-deleteupdate" type="submit">Actualizar</button>
                </form>
            </div>
        </div>           
    </div>
</main>
@endsection

