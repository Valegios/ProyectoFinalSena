@extends('layouts.app')

@section('titulo', 'Lista de Ventas')
@section('cabecera', 'Lista de Ventas')

@section('contenido')
    <div class="flex justify-end m-4">
        <a href="{{ route('ventas.create') }}" class="btn btn-outline btn-sm">Crear Venta</a>
    </div>
    <div class="flex justify-center">
        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <thead>
                    <tr>
                        <th>ID Venta</th>
                        <th>Fecha</th>
                        <th>Precio de Venta</th>
                        <th>Número de Artículos</th>
                        <th>ID Producto</th>
                        <th>ID Vendedor</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id }}</td>
                            <td>{{ $venta->fecha }}</td>
                            <td>{{ $venta->precio_venta }}</td>
                            <td>{{ $venta->numero_articulos }}</td>
                            <td>{{ $venta->id_producto }}</td>
                            <td>{{ $venta->id_vendedor }}</td>
                            <td class="flex space-x-2">
                                <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-warning btn-xs">Editar</a>
                                <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Desea eliminar la venta con ID {{ $venta->id }}?')" class="btn btn-error btn-xs">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection