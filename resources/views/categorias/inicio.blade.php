@extends('layouts.app')
@section('titulo', 'CoorPaper - Tu Inventario de Productos')
@section('cabecera', 'Bienvenido a CoorPaper')

@section('contenido')
    <div class="hero min-h-screen" style="background-image: url(images/Fondo.inicio.jpg);">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">¡Gestiona tu inventario de manera eficiente!</h1>
                <p class="mb-5">
                    Con CoorPaper, llevar el control de tu inventario nunca ha sido tan fácil. Registra, sigue y administra tus productos de manera efectiva.
                </p>
                <a href="{{route('login.store')}}" class="btn btn-primary">Ingresar</a>
            </div>
        </div>
    </div>
@endsection

