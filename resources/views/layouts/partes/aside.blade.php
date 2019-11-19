<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-info elevation-1">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('img/nutri.png')}}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-0"
             style="opacity: .8">
        <span class="brand-text font-weight-light"> <b>Tecno-Web</b> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{ route('categoria.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Categoria
                        </p>
                    </a>
                    <a href="{{ route('producto.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Producto
                        </p>
                    </a>
                    <a href="{{ route('proveedor.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Proveedor
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>