@extends('layouts.plantilla')
@section('title', 'Cursos')
@section("content")
    <h1>Bienvenido a la pagina principal</h1>
    <a href="{{route('cursps.create')}}">crear curso</a>
    <ul>
        @foreach ($cursos as $curso)
            <li>
                <a href="{{route('cursps.show', $curso->id)}}">{{$curso->name}} , {{$curso->avatar}}</a>-->
            </li>
        @endforeach
    </ul>
    {{$cursos->links()}}
@endsection