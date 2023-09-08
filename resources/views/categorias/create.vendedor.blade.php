@extends('layouts.app')
@section('titulo', 'Crear Vendedor')
@section('cabecera', 'Crear Vendedor')
@section('contenido')

<div class="flex justify-center">
    <div class="card w-96 shadow-2xl bg-base-100">
        <div class="card-body">
            <form action="{{ route('vendedores.store') }}" method="POST">
                @csrf
                <div class="form-control">
                    <label class="label" for="nombre">
                        <span class="label-text">Nombre</span>
                    </label>
                    <input type="text" name="nombre" placeholder="Nombre" maxlength="100"
                        class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label" for="apellido">
                        <span class="label-text">Apellido</span>
                    </label>
                    <input type="text" name="apellido" placeholder="Apellido" maxlength="100"
                        class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" placeholder="Email" maxlength="100"
                        class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label" for="contraseña">
                        <span class="label-text">Contraseña</span>
                    </label>
                    <input type="password" name="contraseña" placeholder="Contraseña"
                        class="input input-bordered" required />
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary">Crear Vendedor</button>
                    <a href="{{ route('vendedores.index') }}"
                        class="btn btn-outline btn-primary mt-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
