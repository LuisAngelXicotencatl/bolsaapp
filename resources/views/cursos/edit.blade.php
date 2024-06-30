@extends('layouts.plantilla')
@section('title', 'Cursos edit')
@section("content")
<h1>En esta pagina podras editar un curso</h1>
{{route('cursos.store')}}
<form action="{{route('cursos.update', $id)}}" method="post">
    @csrf
    @method('put')
    <label>
        Nombre
        <input type="text", name="name" value="{{old('name',$id->name)}}">
    </label>
    <br>
    @error('name')
        <br>
        <span>*{{$message}}</span>
        <br>
    @enderror
    <label>
        Descripcion
        <input type="text", name="descripcion" value="{{old('descripcion',$id->descripcion)}}">
    </label>
    <br>
    @error('descripcion')
        <br>
        <span>*{{$message}}</span>
        <br>
    @enderror
    <label>
        Avatar
        <input type="text", name="avatar" value="{{old('avatar', $id->avatar)}}">
    </label> 
    @error('avatar')
        <br>
        <span>*{{$message}}</span>
        <br>
    @enderror
    <button type="submit">Actualizar formulario</button>
</form>
@endsection
