@extends('layouts.plantilla')
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
                <li>Empresa: {{ $empresa->Nombre }}</li>
            </ul>
        </div>
        <div class="mt-6 space-y-4">
            <a href="{{ route('Eventprivate.privatenewdate', $event->id) }}">
                <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                    Fechas
                </button>
            </a>
            <a href="{{ route('Eventprivate.updateeventprivate', $event->id) }}">
                <button class="bg-green-700 hover:bg-yellow-700 text-white py-2 px-4 rounded">
                    Modificar
                </button>
            </a>
            <form action="{{ route('destroyeventprivate', $event->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition-colors" type="submit">Eliminar</button>
            </form>
        </div>
    </div>
</main>
@endsection
