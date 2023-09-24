<div class="navbar bg-orange-200">
    <div class="flex-1 ml-2">
        <a href="{{route('inicio')}}" class="btn btn-ghost btn-sm rounded-btn text-sm">CoorPaper</a>
    </div>
    
    <div class="flex-none">
        <ul class="menu py-2 space-x-4">
            <!-- Modo Administrador -->
            <li class="menu-item">
                <a>Administrador</a>
                <ul class="menu">
                    <li><a href="{{ route('administradores.index') }}" class="menu-item">Administradores</a></li>
                    <li><a href="{{ route('vendedor.index') }}" class="menu-item">Vendedores</a></li>
                    <li><a href="{{ route('productos.index') }}" class="menu-item">Productos</a></li>
                    <li><a href="{{ route('proveedors.index') }}" class="menu-item">Proveedores</a></li>
                    <li><a href="{{ route('ventas.index') }}" class="menu-item">Ventas</a></li>
                </ul>
            </li>

            <!-- Modo Vendedor -->
            <li class="menu-item">
                <a>Vendedor</a>
                <ul class="menu">
                    <li><a href="{{ route('productos.index') }}" class="menu-item">Productos</a></li>
                    <li><a href="{{ route('ventas.index') }}" class="menu-item">Registrar Venta</a></li>
                    <li><a href="{{ route('proveedors.index') }}" class="menu-item">Proveedores</a></li>
                    <li><a href="{{ route('ventas.index') }}" class="menu-item">Ventas</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>