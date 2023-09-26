@extends('layouts.app')
@section('titulo', 'Registro de nuevo usuario')
@section('cabecera', 'Registro de nuevo usuario')

@section('contenido') 
    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">

                {{-- Mostrar mensajes de error --}}
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="badge badge-warning">{{$error}}</div>
                    @endforeach
                @endif

                <form action="{{route('registro.store')}}" method="POST">
                    @csrf

                    {{-- Campo Nombre --}}
                    <div class="form-control">
                        <label class="label" for="name">
                            <span class="label-text">Nombre</span>
                        </label>
                        <input type="text" name="name" placeholder="Escriba su nombre" maxlength="255" class="input input-sm input-bordered" required autofocus value="{{old('name')}}" />
                    </div>

                    {{-- Campo Email --}}
                    <div class="form-control">
                        <label class="label" for="email">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" name="email" placeholder="Escriba su email" maxlength="255" class="input input-sm input-bordered" required value="{{old('email')}}" />
                    </div>

                    {{-- Campo Contraseña --}}
                    <div class="form-control">
                        <label class="label" for="password">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="password" placeholder="Mínimo 5 caracteres" maxlength="45" class="input input-sm input-bordered" required />
                    </div>

                    {{-- Campo Confirmar Contraseña --}}
                    <div class="form-control">
                        <label class="label" for="password_confirmation">
                            <span class="label-text">Confirmar password</span>
                        </label>
                        <input type="password" name="password_confirmation" placeholder="Confirmar password" maxlength="45" class="input input-sm input-bordered" required />
                    </div>

                    {{-- Botones --}}
                    <div class="form-control mt-6">
                        <button class="btn btn-sm btn-primary">Crear cuenta</button>
                        <a href="{{ route('inicio') }}" class="btn btn-sm btn-outline btn-primary mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection