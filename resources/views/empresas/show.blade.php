@extends('layouts.plantilla')
@section('title', $empresa->Nombre)
@section("content")
<main class="bg-gray-50 p-6 rounded-lg shadow-md">
    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300 mb-6">
        <div class="text-xl font-semibold text-gray-800">{{ $empresa->Nombre }}</div>
        <div class="text-lg text-gray-600 mb-4">{{ $empresa->Descripcion }}</div>
        <ul class="text-gray-600">
            <li>Correo: {{ $empresa->email }}</li>
            <li>Contraseña: {{ $empresa->Contrasena }}</li>
        </ul>
        <form action="{{ route('destroyempresa', $empresa->id) }}" method="POST" class="mt-4">
            @csrf
            @method('delete')
            <button class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition-colors" type="submit">
                Eliminar empresa
            </button>
        </form>
    </div>
</main>
@endsection
