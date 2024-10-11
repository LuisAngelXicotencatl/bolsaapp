@extends('layouts.plantilla')
@section('title', 'Agregar Empresa')
@section("content")
<main class="bg-gray-50 p-6 rounded-lg shadow-md">
    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300 mb-6">
        <div class="text-2xl font-semibold text-gray-800 mb-4">Agregar Empresa</div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300">
        <form action="{{route('Empresa.agregarProcess')}}" method="post" class="space-y-4">
            @csrf
            @method('put')

            <!-- Nombre -->
            <div>
                <label class="block text-gray-700 font-semibold">Nombre</label>
                <input class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                    name="nombre" value="{{old('nombre')}}">
                @error('nombre')
                    <span class="text-red-500 text-sm">*{{$message}}</span>
                @enderror
            </div>

            <!-- Descripción -->
            <div>
                <label class="block text-gray-700 font-semibold">Descripción</label>
                <input class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                    name="descripcion" value="{{old('descripcion')}}">
                @error('descripcion')
                    <span class="text-red-500 text-sm">*{{$message}}</span>
                @enderror
            </div>

            <button class="bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition-colors mt-4" type="submit">
                Agregar
            </button>
        </form>
    </div>
</main>
@endsection
