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
                    <select name="id_producto[]" class="select2 multiple='multiple'>
                        @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="productosDiv">
                    <!-- Aquí se insertarán los campos de selección de productos -->
                  </div>
                  <button id="agregarProducto" class="btn btn-primary">Añadir Producto</button>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
      const addButton = document.getElementById('add-product-button');
      const productosDiv = document.getElementById('productosDiv');

      addButton.addEventListener('click', function() {
        const selectElement = document.createElement('select');
        selectElement.name = "id_producto[]";
        selectElement.classList.add('select2');
        // Aquí puedes añadir las opciones para el selector desde tu lista de productos
        // por ejemplo: 
        selectElement.innerHTML = `
          <option value="1">Producto 1</option>
          <option value="2">Producto 2</option>
          <option value="3">Producto 3</option>
        `;
        
        productosDiv.appendChild(selectElement);
      });
    });
  </script>
@endsection