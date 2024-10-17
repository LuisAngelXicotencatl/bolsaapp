@extends('layouts.plantilla')
@section('title', 'Cursos')
@section('content')
    <main class="section-w" id="nosotros">
        <!-- Bolsa de Trabajo -->
        <form action="{{ route('updateBolsaTrabajo') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col lg:flex-row items-center bg-white p-6 lg:p-10 rounded-lg shadow-lg">
                <div class="lg:w-2/3 space-y-4">
                    <div class="text-2xl lg:text-3xl font-bold text-gray-800">
                        <input type="text" name="titulo" value="{{ old('titulo', $bolsainfo->titulo ?? 'Bolsa de trabajo FCC') }}" class="font-bold text-gray-800 text-2xl lg:text-3xl w-full border-none focus:outline-none">
                    </div>
                    <div class="text-gray-600">
                        <textarea name="descripcion" class="w-full p-2 rounded-md border">{{ old('descripcion', $bolsainfo->descripcion ?? 'La Bolsa de Trabajo de la Facultad...') }}</textarea>
                    </div>
                </div>
                <div class="lg:w-1/3 w-2/3 mt-6 lg:mt-0 lg:ml-6">
                    <label for="empresaLogo">
                        <img src="{{ $bolsainfo->logo ? asset('storage/' . $bolsainfo->logo) : asset('images/empresas/buap.png') }}" alt="" class="object-contain lg:w-1/3 w-2/3 mt-6 lg:mt-0 lg:ml-6">
                        <input type="file" name="empresaLogo" id="empresaLogo" class="hidden">
                    </label>
                </div>
            </div>
    
            <div class="text-center mt-10">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                    Guardar cambios
                </button>
            </div>
        </form>
        <script src="{{ asset('js/bucle.js') }}"></script>

        <!-- Coordinador -->
        <form action="{{ route('updateCoordinador') }}" method="POST" enctype="multipart/form-data" class="mt-10">
            @csrf
            @method('PUT')
            <section class="coordinator-container bg-white shadow-md rounded-lg p-10" id="cordinador">
                <div class="flex flex-col md:flex-row items-center md:items-start">
                    <div class="coordinator-image mb-10 md:mb-0 md:mr-10">
                        <label for="coordinadorFoto">
                            <img src="{{ $homeinfo->foto ? asset('storage/' . $homeinfo->foto) : asset('images/ejm2.jpg') }}" id="img4" alt="Foto del coordinador" class="w-150 h-48 object-cover rounded-xl border border-gray-300">
                            <input type="file" name="coordinadorFoto" id="coordinadorFoto" class="hidden">
                        </label>
                    </div>
                    <div class="coordinator-info text-gray-800">
                        <h2 class="text-2xl font-semibold text-blue-700 mb-2">
                            <input type="text" name="tituloCoordinador" value="{{ old('tituloCoordinador', $homeinfo->titulo ?? 'Coordinadora Bolsa de Trabajo') }}" class="font-semibold text-blue-700 text-2xl w-full border-none focus:outline-none">
                        </h2>
                        <h2 class="text-xl font-medium text-gray-700 mb-4">
                            <input type="text" name="nombreCoordinador" value="{{ old('nombreCoordinador', $homeinfo->nombre ?? 'Dra. Patricia Silva Sánchez') }}" class="font-medium text-gray-700 text-xl w-full border-none focus:outline-none">
                        </h2>
                        <p class="mb-4 text-gray-600">
                            <textarea name="mensajeCoordinador" class="resize rounded-md w-full p-2">{{ old('mensajeCoordinador', $homeinfo->mensaje ?? 'Tenemos más de 100 empresas globales vinculadas a nuestra Bolsa de Trabajo...') }}</textarea>
                        </p>
                        <p class="text-gray-600">Contacto: 
                            <a href="mailto:bolsadetrabajo.fcc@correo.buap.mx" class="text-blue-600 hover:text-blue-800">bolsadetrabajo.fcc@correo.buap.mx</a>
                        </p>
                    </div>
                </div>
            </section>

            <div class="text-center mt-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                    Guardar cambios
                </button>
            </div>
        </form>
    </main>
@endsection
