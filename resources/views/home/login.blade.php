@extends('layouts.login')
@section('title', 'Login')
@section("content")
        <main>
            <section class="login">
                <img class="login-logo" src="{{ asset('images/logoFcc.png') }}" alt="Logo">
                <form class="loginform" action="{{route('inicio.login')}}" method="post">
                    @csrf
                    <label for="email">Correo</label>
                    <input id="email" name="email" type="text" required class="login-input">
                    <label for="password">Contraseña</label>
                    <input id="password" name="password" type="password" required class="login-input">
                    <button type="submit" class="login-button">Iniciar sesión</button>
                </form>
            </section>
        </main>
@endsection