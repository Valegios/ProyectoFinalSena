<div class="navbar bg-indigo-200">
        <div class="flex-1 ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>                            
            <a href="{{route('inicio')}}" class="btn btn-ghost btn-sm normal-case text-sm">CoorPaper</a>
        </div>
        <div class="flex-none">
            @auth
            <ul class="menu menu-horizontal px-1 mr-6 space-x-2">              
                @if (auth()->user()->rol == 'admin')
                    <li><a href="{{ route('administradores.index') }}">Administradores</a></li>
                    <li><a href="{{ route('productos.index') }}">Productos</a></li>
                    <li><a href="{{ route('vendedor.index') }}">Vendedores</a></li>
                    <li><a href="{{ route('proveedors.index') }}">Proveedores</a></li>
                    <li><a href="{{ route('ventas.index') }}">Ventas</a></li>
                @elseif (auth()->user()->rol == 'auth')
                    <li><a href="{{ route('ventas.index') }}">Nueva Venta</a></li>
                    <li><a href="{{ route('productos.index') }}">Productos</a></li>
                    <li><a href="{{ route('proveedors.index') }}">Proveedores</a></li>
                @endif
            </ul>
            <!-- Menú del usuario -->
            <div class="dropdown dropdown-end mr-4">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="https://source.unsplash.com/random/100x100/?face"/>
                    </div>
                </label>
                <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                    <li class="font-semibold">
                        {{ auth()->user()->name }}
                    </li>
                    @if (auth()->user()->rol == 'admin')
                        <li><a href="#" class="link link-hover">Usuarios del sistema</a></li>
                    @endif
                    <li><a href="{{ route('perfil') }}" class="link link-hover">Mi perfil</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="link link-hover">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <ul class="menu menu-horizontal px-1 mr-6 space-x-4">
                <li><a href="{{ route('login') }}" class="btn btn-sm btn-outline normal-case">Iniciar sesión</a></li>
                <li><a href="{{ route('registro') }}" class="btn btn-sm btn-outline normal-case">Registrarse</a></li>
            </ul>
            @endauth
        </div>
    </div>

    
   
