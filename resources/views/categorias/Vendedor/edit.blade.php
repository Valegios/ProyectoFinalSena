@extends('layouts.app')
@section('titulo', 'Editar Vendedor')
@section('cabecera', 'Editar Vendedor ' . $vendedor->nombre)
@section('contenido')

<div class="flex justify-center">
    <div class="card w-96 shadow-2xl bg-base-100">
        <div class="card-body">
            <form action="{{route('administrador.updateVendedor', $vendedor->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-control">
                    <label class="label" for="id_vendedor">
                        <span class="label-text">ID Vendedor</span>
                    </label>
                    <input type="text" name="id_vendedor" class="input input-bordered" value="{{$vendedor->id}}" readonly />
                </div>

                <div class="form-control">
                    <label class="label" for="nombre">
                        <span class="label-text">Nombre</span>
                    </label>
                    <input type="text" name="nombre" placeholder="Nombre del vendedor" class="input input-bordered" maxlength="100" value="{{$vendedor->nombre}}" required />
                </div>

                <div class="form-control">
                    <label class="label" for="apellido">
                        <span class="label-text">Apellido</span>
                    </label>
                    <input type="text" name="apellido" placeholder="Apellido del vendedor" class="input input-bordered" value="{{$vendedor->apellido}}" required />
                </div>

                <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" placeholder="Email del vendedor" class="input input-bordered" value="{{$vendedor->email}}" required />
                </div>

                <div class="form-control">
                    <label class="label" for="contraseña">
                        <span class="label-text">Contraseña</span>
                    </label>
                    <input type="password" name="contraseña" placeholder="Contraseña del vendedor" class="input input-bordered" required />
                </div>

                <div class="form-control mt-6">
                    <button class="btn btn-primary">Actualizar Vendedor</button>
                    <a href="{{ route('categorias.vendedor.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
