@extends('layouts.plantilla')
@section('title', 'Empresas')
@section("content")
<main class="bg-gray-50 p-6 rounded-lg shadow-md">
    <div class="text-2xl font-semibold text-gray-800 mb-6">Empresas</div>
    
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($empresas as $empresa)
        <div class="bg-white p-4 rounded-lg shadow-lg border border-gray-300">
            <div class="mb-2">
                <div class="text-lg font-semibold text-gray-800">{{$empresa->Nombre}}</div>
                <div class="text-gray-600">{{$empresa->email}}</div>
            </div>
            <div class="mt-4">
                <a href="{{route('EmpresaInfon', $empresa->id)}}">
                    <button class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                        Ver
                    </button>
                </a>
            </div>
        </div>
        @endforeach
    </section>
    
    <script src="js/bucle.js"></script>
</main>
@endsection
