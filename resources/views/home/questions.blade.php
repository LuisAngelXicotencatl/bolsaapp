@extends('layouts.inicio')
@section('title', "Sugerencias")
@section("content")
<main class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-4xl mx-auto px-6">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="text-2xl font-bold text-gray-800 mb-4">Sugerencias</div>
            <div class="text-lg font-semibold text-gray-700 mb-2">Estimados usuarios:</div>
            <div class="text-gray-700 leading-relaxed mb-4">
                Nos complace informarles que el sistema "Bolsa de Trabajo" se encuentra actualmente en fase de desarrollo. Esta etapa nos permite optimizar las funcionalidades del sistema.
                <br><br>
                Dada que es esta una versión preliminar, es posible que los usuarios encuentren ocasionalmente errores o limitaciones en ciertas opciones. Estamos trabajando para identificar y resolver cualquier inconveniente que pueda surgir durante esta fase.
                <br><br>
                Es importante destacar que, en su estado actual, el sistema está diseñado principalmente para su uso en dispositivos de escritorio. La versión móvil se encuentra en desarrollo y, por lo tanto, algunas características pueden no estar disponibles o funcionar de manera óptima en dispositivos móviles.
                <br><br>
                Agradecemos su comprensión y paciencia durante este período de desarrollo. Les invitamos cordialmente a compartir sus observaciones, sugerencias y comentarios, ya que estos son fundamentales para el avance y mejora de nuestro sistema.
                <br><br>
                Su retroalimentación nos ayudará a perfeccionar la "Bolsa de Trabajo" y a garantizar que se cumplan sus expectativas.
                <br><br>
                Quedamos a su disposición para cualquier consulta o aportación que deseen realizar.
            </div>
            <div class="text-lg font-semibold text-gray-700">El Equipo de Desarrollo de la Bolsa de Trabajo</div>
        </div>
    </div>
    <form class="max-w-lg mx-auto mt-8 p-6 bg-white rounded-lg shadow-md" action="{{ route('index.questionsP') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="sugerencia" class="block text-gray-700 text-sm font-bold mb-2">Sugerencia</label>
            <input type="text" id="sugerencia" name="sugerencia" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500" placeholder="Escriba su sugerencia aquí">
        </div>
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            Enviar Sugerencia
        </button>
    </form>
</main>
@endsection

