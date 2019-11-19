@extends('layouts.admin.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                Proveedores
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="p-3">
                    <a href="{{ route('proveedor.create') }}" class="btn btn-outline-primary">Agregar</a>
                </div>
                <div>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>DIRECCION</th>
                            <th>TELEFONO</th>
                            <th>OPCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($proveedores as $proveedor)
                            <tr>
                                <td>{{$proveedor->id}}</td>
                                <td>{{$proveedor->nombre}}</td>
                                <td>{{$proveedor->direccion}}</td>
                                <td>{{$proveedor->telefono}}</td>
                                <td>
                                    <a href="{{route('proveedor.edit', ['id' => $proveedor->id])}}"
                                       class="btn btn-outline-success">Editar</a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
@endsection