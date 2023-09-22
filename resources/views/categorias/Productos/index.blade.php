@extends('layouts.app')

@section('titulo', 'Lista de Productos')
@section('cabecera', 'Lista de Productos')

@section('contenido')
    <div class="flex justify-end m-4">
        <a href="{{ route('productos.create') }}" class="btn btn-outline btn-sm">Crear Producto</a>
    </div>
    <div class="flex justify-center mx-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">
            @foreach ($productos as $producto)
                <div class="card w-64 bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">{{$producto->nombre}}</h2>
                        <p>Referencia: {{$producto->referencia}}</p>
                        {{-- precio y stock --}}
                        <div class="flex flex-col space-y-2">
                            <div class="badge badge-neutral">${{number_format($producto->precio, 0, ',', '.')}}</div>
                            <div class="badge badge-ghost">{{$producto->stock}} en stock</div>
                        </div>
                        
                        <div class="card-actions justify-end mt-5">
                            {{-- Editar --}}
                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-xs">Editar</a>
                            {{-- Eliminar --}}
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Desea eliminar el producto {{ $producto->nombre }}?')" class="btn btn-error btn-xs">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

