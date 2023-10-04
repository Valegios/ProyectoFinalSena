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
                    <input type="text" name="fecha" value="{{ date('Y-m-d') }}" class="input input-bordered" readonly />
                </div>
                <div class="form-control">
                    <label class="label" for="id_producto">
                        <span class="label-text">Producto</span>
                    </label>
                    <select name="id_producto" id="id_producto" class="select select-bordered">
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}">
                                {{ $producto->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label class="label" for="cantidad">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" min="1"  class="input input-bordered">
                </div>                
                <input type="hidden" name="id_vendedor" value="{{ auth()->user()->id }}">
                <div class="form-control mt-6">
                    <button class="btn btn-primary">Realizar Venta</button>
                    <a href="{{ route('categorias.ventas.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const productoSelect = document.getElementById('id_producto');
        const precioInput = document.getElementById('precio');
        const cantidadInput = document.getElementById('cantidad');
        
        function updatePrecio() {
            const selectedOption = productoSelect.options[productoSelect.selectedIndex];
            const precioUnitario = parseFloat(selectedOption.getAttribute('data-precio'));
            const cantidad = parseFloat(cantidadInput.value) || 0;
            const precioTotal = precioUnitario * cantidad;
            precioInput.value = precioTotal.toFixed(2);
        }
        
        updatePrecio();
        productoSelect.addEventListener('change', updatePrecio);
        cantidadInput.addEventListener('input', updatePrecio);
    });
</script>
@endsection
