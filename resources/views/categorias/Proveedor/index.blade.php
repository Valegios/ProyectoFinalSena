@extends('layouts.app')

@section('titulo', 'Listar Proveedores')
@section('cabecera', 'Listar Proveedores')

@section('contenido')
    <div class="flex justify-end m-4">
        <a href="{{ route('proveedors.create') }}" class="btn btn-outline btn-sm">Crear Proveedor</a>
    </div>
    <div class="flex justify-center">
        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <thead>
                    <tr>
                        <th>ID Proveedor</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Email</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor->id_proveedor }}</td>
                            <td>{{ $proveedor->nombre }}</td>
                            <td>{{ $proveedor->direccion }}</td>
                            <td>{{ $proveedor->telefono }}</td>
                            <td>{{ $proveedor->email }}</td>
                            <td class="flex space-x-2">
                                <a href="{{ route('proveedors.edit', $proveedor->id_proveedor) }}" class="btn btn-warning btn-xs">Editar</a>
                                <form action="{{ route('proveedors.destroy', $proveedor->id_proveedor) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Desea eliminar el proveedor {{ $proveedor->nombre }}?')" class="btn btn-error btn-xs">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection