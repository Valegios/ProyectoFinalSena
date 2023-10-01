@extends('layouts.app')
@section('titulo', 'Crear Proveedor')
@section('cabecera', 'Crear Proveedor')
@section('contenido')

<div class="flex justify-center">
    <div class="card w-96 shadow-2xl bg-base-100">
        <div class="card-body">
            <form action="{{ route('administrador.storeProveedor') }}" method="POST">
                @csrf
                
                <div class="form-control">
                    <label class="label" for="nombre">
                        <span class="label-text">Nombre</span>
                    </label>
                    <input type="text" name="nombre" placeholder="Nombre" maxlength="100"
                        class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label" for="direccion">
                        <span class="label-text">Dirección</span>
                    </label>
                    <input type="text" name="direccion" placeholder="Dirección" maxlength="255"
                        class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label" for="telefono">
                        <span class="label-text">Teléfono</span>
                    </label>
                    <input type="tel" name="telefono" placeholder="Teléfono" maxlength="15"
                        class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" placeholder="Email" maxlength="100"
                        class="input input-bordered" required />
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary">Crear Proveedor</button>
                    <a href="{{ route('categorias.proveedor.index') }}"
                        class="btn btn-outline btn-primary mt-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
