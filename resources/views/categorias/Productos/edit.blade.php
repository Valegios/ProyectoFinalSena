@extends('layouts.app')
@section('titulo', 'Editar Producto')
@section('cabecera', 'Editar Producto ' . $producto->nombre)
@section('contenido')

<div class="flex justify-center">
    <div class="card w-96 shadow-2xl bg-base-100">
        <div class="card-body">
            <form action="{{route('administrador.updateProducto', $producto->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-control">
                    <label class="label" for="id_producto">
                        <span class="label-text">ID Producto</span>
                    </label>
                    <input type="text" name="id_producto" class="input input-bordered" value="{{$producto->id}}" readonly />
                </div>

                <div class="form-control">
                    <label class="label" for="nombre">
                        <span class="label-text">Nombre</span>
                    </label>
                    <input type="text" name="nombre" placeholder="Nombre del producto" class="input input-bordered" maxlength="100" value="{{$producto->nombre}}" required />
                </div>

                <div class="form-control">
                    <label class="label" for="precio">
                        <span class="label-text">Precio</span>
                    </label>
                    <input type="number" name="precio" placeholder="Precio del producto" class="input input-bordered" value="{{$producto->precio}}" required />
                </div>

                <div class="form-control">
                    <label class="label" for="referencia">
                        <span class="label-text">Referencia</span>
                    </label>
                    <input type="text" name="referencia" placeholder="Referencia del producto" class="input input-bordered" maxlength="100" value="{{$producto->referencia}}" required />
                </div>

                <div class="form-control">
                    <label class="label" for="id_proveedor">
                        <span class="label-text">ID Proveedor</span>
                    </label>
                    <input type="number" name="id_proveedor" placeholder="ID del proveedor" class="input input-bordered" value="{{$producto->id_proveedor}}" required />
                </div>

                <div class="form-control mt-6">
                    <button class="btn btn-primary">Actualizar Producto</button>
                    <a href="{{ route('productos.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
