<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="../AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">ALMACEN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link  @if (Route::is('home')) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Panel de control</p>
                    </a>
                </li>
                <li class="nav-item menu  {{ Route::is('warehouses', 'categories', 'products', 'inventory') ? 'menu-is-opening menu-open' : '' }}"">
                    <a href="#" class="nav-link  @if (Route::is('warehouses')) active @endif   @if (Route::is('categories')) active @endif  @if (Route::is('products')) active @endif  @if (Route::is('inventory')) active @endif">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>
                            Gestión de Stock
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('warehouses') }}" class="nav-link  @if (Route::is('warehouses')) active @endif">
                                <i class="fas fa-warehouse"></i>
                                <p>Bodegas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories') }}" class="nav-link  @if (Route::is('categories')) active @endif">
                                <i class="fas fa-puzzle-piece"></i>
                                <p>Categorias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products') }}" class="nav-link  @if (Route::is('products')) active @endif">
                                <i class="fab fa-product-hunt"></i>
                                <p>Productos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('inventory') }}" class="nav-link  @if (Route::is('inventory')) active @endif">
                                <i class="fas fa-boxes"></i>
                                <p>Inventario</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('providers') }}" class="nav-link  @if (Route::is('providers')) active @endif">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Proveedores</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{ route('shopping') }}" class="nav-link  @if (Route::is('shopping')) active @endif">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Compras</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sales') }}" class="nav-link  @if (Route::is('sales')) active @endif @if (Route::is('sales.filterByDate')) active @endif">
                        <i class="nav-icon fas fa-piggy-bank"></i>
                        <p>Ventas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('configuration') }}" class="nav-link  @if (Route::is('configuration')) active @endif">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Configuración</p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
