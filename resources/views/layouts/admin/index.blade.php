<!DOCTYPE html>
<html lang="es">
@include('layouts.admin.partes.head')
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @include('layouts.admin.partes.header')

    @include('layouts.admin.partes.aside')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.admin.partes.footer')

<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('layouts.admin.partes.script')
</body>
</html>