@extends('layouts.admin.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                Ingresos
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
                    <a href="{{ route('ingreso.create') }}" class="btn btn-outline-primary">Agregar</a>
                </div>
                <div>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>FECHA</th>
                            <th>PROVEEDOR</th>
                            <th>TOTAL</th>
                            <th>ESTADO</th>
                            <th>OPCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ingresos as $ingreso)
                            <tr>
                                <td>{{$ingreso->id}}</td>
                                <td>{{$ingreso->fecha}}</td>
                                <td>{{$ingreso->nombre}}</td>
                                <td>{{$ingreso->total}} Bs</td>
                                <td>{{$ingreso->estado}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('ingreso.show', ['id' => $ingreso->id])}}" class="btn btn-outline-info">Detalle</a>
                                        <a href="" data-target="#modal-delete-{{$ingreso->id}}" data-toggle="modal" class="btn btn-outline-danger">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                            @include('layouts.ingresos.delete')
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