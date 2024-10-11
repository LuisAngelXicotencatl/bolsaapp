@extends('layouts.plantilla')
@section('title', 'Nuevo Evento')
@section("content")
<main class="bg-gray-50 p-6 rounded-lg shadow-md">
    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300 mb-6">
        <div class="text-xl font-semibold text-gray-800 mb-4">Agregar un nuevo evento</div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300">
        <form action="{{ route('Event.nuevoEventoProcess') }}" method="post" class="space-y-4">
            @csrf
            @method('put')

            <!-- Título -->
            <div>
                <label class="block text-gray-700 font-semibold">Título</label>
                <input class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                    name="titulo" value="{{ old('titulo') }}">
                @error('titulo')
                    <span class="text-red-500 text-sm">*{{ $message }}</span>
                @enderror
            </div>

            <!-- Subtítulo -->
            <div>
                <label class="block text-gray-700 font-semibold">Subtítulo</label>
                <input class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                    name="subtitulo" value="{{ old('subtitulo') }}">
                @error('subtitulo')
                    <span class="text-red-500 text-sm">*{{ $message }}</span>
                @enderror
            </div>

            <!-- Descripción -->
            <div>
                <label class="block text-gray-700 font-semibold">Descripción</label>
                <textarea class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                    name="descripcion" rows="5">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <span class="text-red-500 text-sm">*{{ $message }}</span>
                @enderror
            </div>

            <!-- Detalles -->
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-semibold">Fecha</label>
                    <input class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                        name="fecha" value="{{ old('fecha') }}" type="date">
                    @error('fecha')
                        <span class="text-red-500 text-sm">*{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold">Lugar</label>
                    <input class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                        name="lugar" value="{{ old('lugar') }}">
                    @error('lugar')
                        <span class="text-red-500 text-sm">*{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors mt-4" type="submit">
                Agregar Evento
            </button>
        </form>
    </div>
</main>
@endsection
