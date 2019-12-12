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
                <div class="form-group">
                    <label for="proveedor">Proveedor</label>
                    <p>{{ $ingreso->nombre }}</p>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table id="detalles" class="table table-hover table-hover table-bordered">
                                    <thead class="bg-primary">
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Compra</th>
                                    <th>Precio Venta</th>
                                    <th>Subtotal</th>
                                    </thead>
                                    <tbody>
                                    @foreach($detalles as $detalle)
                                        <tr>
                                            <td>{{ $detalle->nombre }}</td>
                                            <td>{{ $detalle->cantidad }}</td>
                                            <td>{{ $detalle->precio_compra }}</td>
                                            <td>{{ $detalle->precio_venta }}</td>
                                            <td>{{ $detalle->cantidad * $detalle->precio_compra }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total"> Bs/. {{ $ingreso->total }}</h4></th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
@endsection