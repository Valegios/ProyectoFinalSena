@extends('layouts.app')
@section('titulo', 'Registrar Venta')
@section('cabecera', 'Registrar Venta')
@section('contenido')

<div class="flex justify-center">
    <div class="card w-96 shadow-2xl bg-base-100">
        <div class="card-body">
            <form action="{{ route('ventas.store') }}" method="POST">
                @csrf
                <div class="form-control">
                    <label class="label" for="fecha">
                        <span class="label-text">Fecha</span>
                    </label>
                    <input type="date" name="fecha" class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label" for="precio">
                        <span class="label-text">Precio</span>
                    </label>
                    <input type="number" name="precio" placeholder="Precio" class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label" for="cantidad">
                        <span class="label-text">Cantidad</span>
                    </label>
                    <input type="number" name="cantidad" placeholder="Cantidad" class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label" for="id_producto">
                        <span class="label-text">ID del Producto</span>
                    </label>
                    <input type="text" name="id_producto" placeholder="ID del Producto" class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label" for="id_vendedor">
                        <span class="label-text">ID del Vendedor</span>
                    </label>
                    <input type="text" name="id_vendedor" placeholder="ID del Vendedor" class="input input-bordered" required />
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary">Registrar Venta</button>
                    <a href="{{ route('ventas.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
