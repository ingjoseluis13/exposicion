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
                <form action="{{route('ingreso.store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="proveedor">Proveedor</label>
                        <select class="form-control select2" style="width: 100%;" id="proveedor" name="proveedor">
                                <option value="0" >Seleccione un proveedor...</option>
                            @foreach($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="pidproducto">Producto</label>
                                        <select class="form-control select2" style="width: 100%;" id="pidproducto"
                                                name="pidproducto">
                                            @foreach($productos as $producto)
                                                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad</label>
                                        <input type="text" name="pcantidad" id="pcantidad" class="form-control"
                                               placeholder="cantidad">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="pprecio_compra">Precio Compra</label>
                                        <input type="number" name="pprecio_compra" id="pprecio_compra"
                                               class="form-control" placeholder="precio de compra">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="pprecio_venta">Precio Venta</label>
                                        <input type="number" name="pprecio_venta" id="pprecio_venta"
                                               class="form-control" placeholder="precio de venta">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                    <div class="form-group text-right py-4">
                                        <button type="button" id="bt_add" class="btn btn-outline-primary">Agregar
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <table id="detalles" class="table table-hover table-hover table-bordered">
                                        <thead class="bg-primary">
                                        <th>Opciones</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Compra</th>
                                        <th>Precio Venta</th>
                                        <th>Subtotal</th>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                        <th>TOTAL</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>
                                            <h4 id="total"> Bs/. 0.00</h4>
                                        </th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="guardar">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                        <button type="reset" class="btn btn-outline-danger">Cancelar</button>
                    </div>
                </form>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#bt_add').click(function () {
                agregar();
            });
        });


        var cont = 0;
        total = 0;
        subtotal = [];
        $("#guardar").hide();

        function agregar() {
            idproducto = $("#pidproducto").val();
            producto = $("#pidproducto option:selected").text();
            cantidad = $("#pcantidad").val();
            precio_compra = $("#pprecio_compra").val();
            precio_venta = $("#pprecio_venta").val();

            if (idproducto != "" && cantidad != "" && cantidad > 0 && precio_compra != "" && precio_venta != "") {
                subtotal[cont] = (cantidad * precio_compra);
                total = total + subtotal[cont];

                var fila = `<tr class="selected" id="fila${cont}">
                                <td><button type="button" class="btn btn-outline-warning" onclick="eliminar(${cont});">X</button></td>
                                <td><input type="hidden" name="idproducto[]" value="${idproducto}">${producto}</td>
                                <td><input type="number" name="cantidad[]" value="${cantidad}" readonly class="form-control"></td>
                                <td><input type="number" name="precio_compra[]" value="${precio_compra}" readonly  class="form-control"></td>
                                <td><input type="number" name="precio_venta[]" value="${precio_venta}" readonly  class="form-control"></td>
                                <td>${subtotal[cont]}</td>
                            </tr>`;
                cont++;
                limpiar();
                $("#total").html("Bs/. " + total);
                evaluar();
                $("#detalles").append(fila);
            } else {
                alert("Error al ingresar el detalle del ingreso, revise los datos del producto");
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            $("#total").html("Bs/. " + total);
            $("#fila" + index).remove();
            evaluar();
        }


        function limpiar() {
            $("#pcantidad").val("");
            $("#pprecio_compra").val("");
            $("#pprecio_venta").val("");
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }
    </script>
@endsection
@endsection