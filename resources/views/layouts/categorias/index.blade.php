@extends('layouts.admin.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                Categorias
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
                    <a href="{{ route('categoria.create') }}" class="btn btn-outline-primary">Agregar</a>
                </div>
                <div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>ESTADO</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categorias as $categoria)
                            <tr>
                                <td>{{$categoria->id}}</td>
                                <td>{{$categoria->nombre}}</td>
                                <td>{{$categoria->estado}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('categoria.edit', ['id' => $categoria->id])}}" class="btn btn-outline-success">Editar</a>
                                        <a href="" data-target="#modal-delete-{{$categoria->id}}" data-toggle="modal" class="btn btn-outline-danger">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        @include('layouts.categorias.delete')
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