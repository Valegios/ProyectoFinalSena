@extends('layouts.app')

@section('titulo', 'Ingresar al sistema')
@section('cabecera', 'Ingresar al sistema')

@section('contenido')
    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">

                {{-- Mostrar mensajes de error --}}
                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <div class="badge badge-warning">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                {{-- Formulario de inicio de sesión --}}
                <form action="{{ route('login.store') }}" method="POST">
                    @csrf

                    {{-- Campo de Email --}}
                    <div class="form-control">
                        <label class="label" for="email">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" name="email" placeholder="Escriba su email" maxlength="255" class="input input-sm input-bordered" required value="{{ old('email') }}" />
                    </div>

                    {{-- Campo de Contraseña --}}
                    <div class="form-control">
                        <label class="label" for="password">
                            <span class="label-text">Contraseña</span>
                        </label>
                        <input type="password" name="password" placeholder="Mínimo 5 caracteres" maxlength="45" class="input input-sm input-bordered" required />
                    </div>

                    {{-- Botones de acción --}}
                    <div class="form-control mt-6">
                        <button class="btn btn-sm btn-primary">Ingresar</button>
                        <a href="{{ route('inicio') }}" class="btn btn-sm btn-outline btn-primary mt-4">Cancelar</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
