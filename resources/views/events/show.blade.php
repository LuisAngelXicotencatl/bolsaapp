@extends('layouts.plantilla')
@section('title', $event->titulo)
@section("content")
<main>
    <div class="event-i">
        <div class="event-i-title">{{ $event->titulo }}</div>
        <div class="event-i-sub">{{ $event->subtitulo }}</div>
        <p class="event-i-descripcion">{{ $event->descripcion }}</p>
        <div class="event-i-details">
            <div class="event-i-info">
                <li>
                    <ul>Fechxdxx: {{ $event->fecha }}</ul>
                    <ul>Lugar: {{ $event->lugar }}</ul>
                    <ul>Premio: {{ $event->premio }}</ul>
                    </li>
                </div>
                <div class="event-i-academias">
                    <li>Empresas y Academias
                        <ul>No disponibles</ul>
                        <!--@foreach ($eventEmpresas as $eventEmpresa)
                            <ul> {{$eventEmpresa->empresa->Nombre}}</ul>
                        @endforeach-->
                    </li>
                </div>
            </div>
        </div>
        <div class="event-i-images">
            @foreach ($event->images as $image)
            <div class="images-i-z">
                <form action="{{ route('Event.destroyImage', ['id' => $event->id, 'image' => $image->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="delete-icon" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0,0,256,256" class="x image-v">
                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(6.4,6.4)"><path d="M24.279,3l0.667,2h-9.892l0.667,-2h8.558M24.279,2h-8.558c-0.43,0 -0.813,0.275 -0.949,0.684l-0.772,2.316v1h12v-1l-0.772,-2.316c-0.136,-0.409 -0.518,-0.684 -0.949,-0.684z" fill="#c7474f"></path><path d="M8,37.5c-0.827,0 -1.5,-0.673 -1.5,-1.5v-27.5h27v27.5c0,0.827 -0.673,1.5 -1.5,1.5z" fill="#dff0fe"></path><path d="M33,9v27c0,0.551 -0.449,1 -1,1h-24c-0.551,0 -1,-0.449 -1,-1v-27h26M34,8h-28v28c0,1.105 0.895,2 2,2h24c1.105,0 2,-0.895 2,-2v-28z" fill="#c7474f"></path><path d="M4.5,8.5v-1.5c0,-0.827 0.673,-1.5 1.5,-1.5h28c0.827,0 1.5,0.673 1.5,1.5v1.5z" fill="#dff0fe"></path><path d="M34,6c0.551,0 1,0.449 1,1v1h-30v-1c0,-0.551 0.449,-1 1,-1h28M34,5h-28c-1.105,0 -2,0.895 -2,2v2h32v-2c0,-1.105 -0.895,-2 -2,-2zM24.5,35v0c-0.276,0 -0.5,-0.224 -0.5,-0.5v-23c0,-0.276 0.224,-0.5 0.5,-0.5v0c0.276,0 0.5,0.224 0.5,0.5v23c0,0.276 -0.224,0.5 -0.5,0.5zM15.5,35v0c-0.276,0 -0.5,-0.224 -0.5,-0.5v-23c0,-0.276 0.224,-0.5 0.5,-0.5v0c0.276,0 0.5,0.224 0.5,0.5v23c0,0.276 -0.224,0.5 -0.5,0.5zM10.5,35v0c-0.276,0 -0.5,-0.224 -0.5,-0.5v-23c0,-0.276 0.224,-0.5 0.5,-0.5v0c0.276,0 0.5,0.224 0.5,0.5v23c0,0.276 -0.224,0.5 -0.5,0.5zM29.5,35v0c-0.276,0 -0.5,-0.224 -0.5,-0.5v-23c0,-0.276 0.224,-0.5 0.5,-0.5v0c0.276,0 0.5,0.224 0.5,0.5v23c0,0.276 -0.224,0.5 -0.5,0.5z" fill="#c7474f"></path></g></g>
                            </svg>
                        </button>
                </form>
                    @php
                        $imagePath = 'storage/' . str_replace('\\', '/', $image->image);
                    @endphp
                    <img class="tarjet-event-image image-v" src="{{ asset($imagePath) }}">
            </div>
            @endforeach
        </div>
        <div class="button-image" id="inputadd">
            <button onclick="toggleInput()" class="upload-image">Agregar imagen</button>
        </div>
        <div class="button-image">
            <div class="inputadd" id="inputDiv" style="display:none;">
                <form  class="inputaddform" action="{{ route('images.store') }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden"  id="event" name="event" value="{{$event->id}}">
                    <label class="addfile-label" for="fileInput">Seleccionar imagen</label>
                    <input class="addfile" type="file" id="image" name="image">
                    <button type="submit" class="tarjet-event-button-deleteupdate  btnadd">agregar imagen</button> 
                </form>
            </div>
            @error('image')
                <span>*{{$message}}</span>
            @enderror
        </div>
        <script>
            function toggleInput() {
                var inputDiv = document.getElementById('inputDiv');
                var inputadd = document.getElementById('inputadd');
                if (inputDiv.style.display === 'none' || inputDiv.style.display === '') {
                    inputDiv.style.display = 'block';
                    inputadd.style.display = 'none';
                } else {
                    inputDiv.style.display = 'none';
                    inputadd.style.display = 'block';
                }
            }
        </script>
    </div>
</main>
@endsection
