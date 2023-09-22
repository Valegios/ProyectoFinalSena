@extends('layouts.app')
@section('titulo', 'Editar Proveedor')
@section('cabecera', 'Editar Proveedor ' . $proveedor->nombre)
@section('contenido')

<div class="flex justify-center">
    <div class="card w-96 shadow-2xl bg-base-100">
        <div class="card-body">
            <form action="{{route('administrador.updateProveedor', $proveedor->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-control">
                    <label class="label" for="id_proveedor">
                        <span class="label-text">ID Proveedor</span>
                    </label>
                    <input type="text" name="id_proveedor" class="input input-bordered" value="{{$proveedor->id}}" readonly />
                </div>

                <div class="form-control">
                    <label class="label" for="nombre">
                        <span class="label-text">Nombre</span>
                    </label>
                    <input type="text" name="nombre" placeholder="Nombre del proveedor" class="input input-bordered" maxlength="100" value="{{$proveedor->nombre}}" required />
                </div>

                <div class="form-control">
                    <label class="label" for="direccion">
                        <span class="label-text">Dirección</span>
                    </label>
                    <input type="text" name="direccion" placeholder="Dirección del proveedor" class="input input-bordered" value="{{$proveedor->direccion}}" required />
                </div>

                <div class="form-control">
                    <label class="label" for="telefono">
                        <span class="label-text">Teléfono</span>
                    </label>
                    <input type="text" name="telefono" placeholder="Teléfono del proveedor" class="input input-bordered" maxlength="15" value="{{$proveedor->telefono}}" required />
                </div>

                <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" placeholder="Email del proveedor" class="input input-bordered" value="{{$proveedor->email}}" required />
                </div>

                <div class="form-control mt-6">
                    <button class="btn btn-primary">Actualizar Proveedor</button>
                    <a href="{{ route('categorias.proveedor.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
