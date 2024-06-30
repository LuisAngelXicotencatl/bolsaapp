@extends('layouts.plantilla')
@section('title', 'Cursos create')
@section("content")
<h1>En esta pagina podras crear un curso</h1>
{{route('cursos.store')}}
<form action="{{route('cursos.store')}}" method="POST">
    @csrf
    <label>
        Nombre
        <input type="text", name="name" value="{{old('name')}}">
    </label>

    @error('name')
        <br>
        <span>*{{$message}}</span>
        <br>
    @enderror
    <br>
    <label>
        Descripcion
        <input type="text", name="descripcion" value="{{old('descripcion')}}">
    </label>
    @error('descripcion')
        <br>
        <span>*{{$message}}</span>
        <br>
    @enderror
    <br>
    <label>
        Avatar
        <input type="text", name="avatar" value="{{old('avatar')}}">
    </label> 
    @error('avatar')
        <br>
        <span>*{{$message}}</span>
        <br>
    @enderror
    <button type="submit">Enviar formulario</button>
</form>
@endsection
