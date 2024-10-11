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
                <li>Premio: {{ $event->premio }}</li>
            </ul>
        </div>

        <div class="event-i-academias text-gray-700">
            <strong>Empresas y Academias</strong>
            <ul class="space-y-2 mt-2">
                @if ($eventEmpresas->count() > 0)
                    @foreach ($eventEmpresas as $eventEmpresa)
                        <li>{{ $eventEmpresa->empresa->Nombre }}</li>
                    @endforeach 
                @else
                    <li>No disponible</li>
                @endif
            </ul>
        </div>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach ($event->images as $image)
            <div class="relative">
                <form action="{{ route('Event.destroyImage', ['id' => $event->id, 'image' => $image->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="absolute top-0 right-0 p-1 bg-red-500 text-white">Eliminar
                    </button>
                </form>
                @php
                    $imagePath = 'storage/' . str_replace('\\', '/', $image->image);
                @endphp
                <img class="w-full h-64 object-cover rounded-lg" src="{{ asset($imagePath) }}" alt="Imagen del evento">
            </div>
            @endforeach
        </div>

        <div class="mt-6">
            <button onclick="toggleInput()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Agregar imagen</button>
        </div>

        <div id="inputDiv" class="mt-6" style="display:none;">
            <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" id="event" name="event" value="{{$event->id}}">
                <label class="block text-gray-700 font-semibold" for="fileInput">Seleccionar imagen</label>
                <input class="block w-full px-3 py-2 border rounded-lg" type="file" id="image" name="image">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Agregar imagen</button>
            </form>
            @error('image')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <script>
            function toggleInput() {
                var inputDiv = document.getElementById('inputDiv');
                var inputadd = document.getElementById('inputadd');
                if (inputDiv.style.display === 'none' || inputDiv.style.display === '') {
                    inputDiv.style.display = 'block';
                } else {
                    inputDiv.style.display = 'none';
                }
            }
        </script>
    </div>
</main>
@endsection
