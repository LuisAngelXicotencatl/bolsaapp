@extends('layouts.inicio')
@section('title', "Sugerencias")
@section("content")
<main class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-4xl mx-auto px-6">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="text-2xl font-bold text-gray-800 mb-4">Gracias</div>
            <div class="text-lg font-semibold text-gray-700 mb-2">Su Sugerencia ha sido enviado, estaremos trabajando para solucionar el problema lo antes posible</div>
            <div class="text-lg font-semibold text-gray-700">Equipo de Desarrollo de la Bolsa de Trabajo</div>
        </div>
    </div>
    <a href="{{ route('Event.default') }}"><button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            Volver al inicio
        </button>
    </a>
</main>
@endsection
