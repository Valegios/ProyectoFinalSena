@extends('layouts.app')

@section('titulo', 'Lista de Administradores')
@section('cabecera', 'Lista de Administradores')

@section('contenido')
    <div class="flex justify-end m-4">
        <a href="{{ route('administrador.create') }}" class="btn btn-outline btn-sm">Crear Administrador</a>
    </div>
    <div class="flex justify-center">
        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Celular</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($administradores as $administrador)
                        <tr>
                            <td>{{ $administrador->id }}</td>
                            <td>{{ $administrador->nombre }}</td>
                            <td>{{ $administrador->apellido }}</td>
                            <td>{{ $administrador->email }}</td>
                            <td>{{ $administrador->celular }}</td>
                            <td class="flex space-x-2">
                                <a href="{{ route('administradores.edit', $administrador->id) }}" class="btn btn-warning btn-xs">Editar</a>
                                <form action="{{ route('administradores.destroy', $administrador->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Desea eliminar al administrador {{ $administrador->nombre }} {{ $administrador->apellido }}?')" class="btn btn-error btn-xs">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
