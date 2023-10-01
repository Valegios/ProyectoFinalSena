@extends('layouts.app')
@section('titulo', 'Crear Producto')
@section('cabecera', 'Crear Producto')
@section('contenido')

<div class="flex justify-center">
    <div class="card w-96 shadow-2xl bg-base-100">
        <div class="card-body">
            <form action="{{ route('administrador.storeProducto') }}" method="POST">
                @csrf
                
                <div class="form-control">
                    <label class="label" for="nombre">
                        <span class="label-text">Nombre</span>
                    </label>
                    <input type="text" name="nombre" placeholder="Nombre" maxlength="100"
                        class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label" for="precio">
                        <span class="label-text">Precio</span>
                    </label>
                    <input type="number" name="precio" placeholder="Precio"
                        class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label" for="referencia">
                        <span class="label-text">Referencia</span>
                    </label>
                    <input type="text" name="referencia" placeholder="Referencia" maxlength="255"
                        class="input input-bordered" required />
                </div>
                
                <div class="form-control">
                    <label class="label" for="id_proveedor">
                        <span class="label-text">Proveedor</span>
                    </label>
                    <select name="id_proveedor" class="select select-bordered">
                        @foreach($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-control">
                    <label class="label" for="stock">
                        <span class="label-text">Stock</span>
                    </label>
                    <input type="number" name="stock" placeholder="Existencias" class="input input-bordered" value="{{old('stock')}}" required />
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary">Crear Producto</button>
                    <a href="{{ route('categorias.productos.index') }}"
                        class="btn btn-outline btn-primary mt-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
