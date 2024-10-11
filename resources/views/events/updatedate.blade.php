@extends('layouts.plantilla')

@section('title', $date->id)

@section("content")
<main class="bg-gray-50 p-6 rounded-lg shadow-md">
    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300">
        <div class="text-xl font-semibold text-gray-800 mb-4">Actualizar fecha</div>
        <form action="{{ route('Event.updateDateprocess', $date->id) }}" method="post" class="space-y-4">
            @csrf
            @method('put')

            <!-- Fecha -->
            <div>
                <label class="block text-gray-700 font-semibold">Fecha</label>
                <input class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" 
                       value="{{ $date->fecha }}" name="fecha" type="date">
                @error('fecha')
                    <span class="text-red-500 text-sm">*{{ $message }}</span>
                @enderror
            </div>

            <!-- Hora -->
            <div>
                <label class="block text-gray-700 font-semibold">Hora</label>
                <input class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" 
                       value="{{ $date->hora }}" name="hora" type="time">
                @error('hora')
                    <span class="text-red-500 text-sm">*{{ $message }}</span>
                @enderror
            </div>

            <!-- Botón de Actualizar -->
            <button class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors" type="submit">Actualizar</button>
        </form>
    </div>           
</main>
@endsection
