@extends('layouts.app')
@section('head')
    <link href="ruta/a/select2.min.css" rel="stylesheet" />
@endsection
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
                    <label class="label" for="id_producto">
                        <span class="label-text">Seleccionar Producto</span>
                    </label>
                    <select name="id_producto[]" id="id_producto" class="mt-3 z-[1] p-2 shadow menu menu-sm bg-base-100 rounded-box w-52">
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}" class="link link-hover">{{ $producto->nombre }}</option>
                        @endforeach    
                    </select>
                </div>               
                <div class="form-control">
                    <label class="label" for="id_vendedor">
                        <span class="label-text">ID del Vendedor</span>
                    </label>
                    <input type="text" name="id_vendedor" placeholder="ID del Vendedor" class="input input-bordered" required />
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary">Registrar Venta</button>
                    <a href="{{ route('categorias.ventas.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('agregarProducto').addEventListener('click', function() {
        const productosDiv = document.getElementById('productosDiv');
        const newSelect = document.createElement('select');
        newSelect.name = 'id_producto[]';
        newSelect.classList.add('mt-3', 'z-[1]', 'p-2', 'shadow', 'menu', 'menu-sm', 'bg-base-100', 'rounded-box', 'w-52');
        
        // Opción de ejemplo, puedes generar esto dinámicamente con tus productos
        @foreach($productos as $producto)
            const option = document.createElement('option');
            option.value = "{{ $producto->id }}";
            option.classList.add('link', 'link-hover');
            option.textContent = "{{ $producto->nombre }}";
            newSelect.appendChild(option);
        @endforeach

        productosDiv.appendChild(newSelect);
    });
</script>

@endsection
