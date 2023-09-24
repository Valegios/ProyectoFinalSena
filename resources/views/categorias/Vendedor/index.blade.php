@extends('layouts.app')

@section('titulo', 'Lista de Vendedores')
@section('cabecera', 'Lista de Vendedores')

@section('contenido')
    <div class="flex justify-end m-4">
        <a href="{{ route('vendedor.create') }}" class="btn btn-outline btn-sm">Crear Vendedor</a>
    </div>
    <div class="flex justify-center">
        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <thead>
                    <tr>
                        <th>ID Vendedor</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Contraseña</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendedores as $vendedor)
                        <tr>
                            <td>{{ $vendedor->id }}</td>
                            <td>{{ $vendedor->nombre }}</td>
                            <td>{{ $vendedor->apellido }}</td>
                            <td>{{ $vendedor->email }}</td>
                            <td>{{ $vendedor->contrasena }}</td>
                            <td class="flex space-x-2">
                                <a href="{{ route('administrador.editVendedor', $vendedor->id) }}" class="btn btn-warning btn-xs">Editar</a>
                                <form action="{{ route('administrador.destroyVendedor', $vendedor->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Desea eliminar al vendedor {{ $vendedor->nombre }}?')" class="btn btn-error btn-xs">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
