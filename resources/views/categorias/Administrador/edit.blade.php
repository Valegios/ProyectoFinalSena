@extends('layouts.app')
@section('titulo', 'Editar Administrador')
@section('cabecera', 'Editar Administrador ' . $administrador->nombre)
@section('contenido')

<div class="flex justify-center">
    <div class="card w-96 shadow-2xl bg-base-100">
        <div class="card-body">
            <form action="{{ route('administradores.update', $administrador->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-control">
                    <label class="label" for="id">
                        <span class="label-text">ID Administrador</span>
                    </label>
                    <input type="text" name="id" class="input input-bordered" value="{{ $administrador->id }}" readonly />
                </div>

                <div class="form-control">
                    <label class="label" for="nombre">
                        <span class="label-text">Nombre</span>
                    </label>
                    <input type="text" name="nombre" class="input input-bordered" value="{{ $administrador->nombre }}" required />
                </div>

                <div class="form-control">
                    <label class="label" for="apellido">
                        <span class="label-text">Apellido</span>
                    </label>
                    <input type="text" name="apellido" class="input input-bordered" value="{{ $administrador->apellido }}" required />
                </div>

                <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" class="input input-bordered" value="{{ $administrador->email }}" required />
                </div>

                <div class="form-control">
                    <label class="label" for="celular">
                        <span class="label-text">Celular</span>
                    </label>
                    <input type="text" name="celular" class="input input-bordered" value="{{ $administrador->celular }}" required />
                </div>

                <div class="form-control">
                    <label class="label" for="contraseña">
                        <span class="label-text">Contraseña</span>
                    </label>
                    <input type="password" name="contraseña" class="input input-bordered" value="{{ $administrador->contraseña }}" required />
                </div>

                <div class="form-control mt-6">
                    <button class="btn btn-primary">Actualizar Administrador</button>
                    <a href="{{ route('administradores.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection