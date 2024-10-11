@extends('layouts.plantilla')
@section('title', $event->titulo)
@section("content")
<main class="bg-gray-50 p-6 rounded-lg shadow-md">
    <!-- Sección de eliminar evento futuro -->
    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300 mb-6">
        <div class="text-xl font-semibold text-gray-800 mb-4">{{ $event->titulo }}</div>
        <div class="text-lg text-gray-600 mb-4">Evento con el Id- {{ $event->id }} y con la fecha de {{ $event->fecha }}</div>
        <form action="{{ route('event.destroy', $event->id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition-colors" type="submit">
                Eliminar evento futuro
            </button>
        </form>
    </div>

    <!-- Sección de marcar como terminado -->
    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300 mb-6">
        <form action="{{ route('Event.updatefinished', $event->id) }}" method="POST">
            @csrf
            @method('put')
            <button class="bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition-colors" type="submit">
                Marcar evento como terminado
            </button>
        </form>
    </div>

    <!-- Sección de actualización del evento -->
    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300">
        <form action="{{ route('Event.updateProcess', $event->id) }}" method="post" class="space-y-4">
            @csrf
            @method('put')

            <!-- Título -->
            <div>
                <label class="block text-gray-700 font-semibold">Título</label>
                <input class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                    name="titulo" value="{{ old('titulo', $event->titulo) }}">
                @error('titulo')
                    <span class="text-red-500 text-sm">*{{ $message }}</span>
                @enderror
            </div>

            <!-- Subtítulo -->
            <div>
                <label class="block text-gray-700 font-semibold">Subtítulo</label>
                <input class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                    name="subtitulo" value="{{ old('subtitulo', $event->subtitulo) }}">
                @error('subtitulo')
                    <span class="text-red-500 text-sm">*{{ $message }}</span>
                @enderror
            </div>

            <!-- Descripción -->
            <div>
                <label class="block text-gray-700 font-semibold">Descripción</label>
                <textarea class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                    name="descripcion" rows="3">{{ old('descripcion', $event->descripcion) }}</textarea>
                @error('descripcion')
                    <span class="text-red-500 text-sm">*{{ $message }}</span>
                @enderror
            </div>

            <!-- Detalles -->
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-semibold">Fecha</label>
                    <input class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                        name="fecha" value="{{ old('fecha', $event->fecha) }}">
                    @error('fecha')
                        <span class="text-red-500 text-sm">*{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold">Lugar</label>
                    <input class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                        name="lugar" value="{{ old('lugar', $event->lugar) }}">
                    @error('lugar')
                        <span class="text-red-500 text-sm">*{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors mt-4" type="submit">
                Actualizar información
            </button>
        </form>
    </div>
</main>
@endsection
