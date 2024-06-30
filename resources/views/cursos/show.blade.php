@extends('layouts.plantilla')
@section('title', 'Curso ' . $curso->name)
@section("content")
    <!-- <h1>Bienvenido //<// ?php echo $curso;?> </h1> -->
    <h1>Bienvenido al curso de {{$curso ->name}} </h1>
    <a href="{{route('cursps.index')}}">Volver a curso</a>
    <br>
    <a href="{{route('cursos.edit', $curso)}}">Editar curso</a>
    <p>Avatar:  {{$curso ->avatar}}</p>
    <p>Categoria:  {{$curso ->descripcion}}</p>
    <form action="{{route('curso.destroy', $curso)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Eliminar</button>
    </form>
@endsection
