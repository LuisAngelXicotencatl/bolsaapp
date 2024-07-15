@extends('layouts.login')
@section('title', 'Register')
@section("content")
    <main>
        <section class="login">
            <img class="login-logo" src="{{ asset('images/logoFcc.png') }}" alt="Logo">
            <form class="loginform" action="{{route('inicio.register')}}" method="post">
                @csrf
                <label for="name">Nombre</label>
                <input id="name" name="name" type="text" required class="login-input">
                <label for="email">Correo</label>
                <input id="email" name="email" type="text" required class="login-input">
                <label for="password">Contraseña</label>
                <input id="password" name="password" type="password" required class="login-input">
                <button type="submit" class="login-button">Registrarse</button>
            </form>
        </section>
    </main>
@endsection