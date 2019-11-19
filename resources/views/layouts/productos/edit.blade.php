@extends('layouts.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                Productos
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
                <form action="{{route('producto.update', ['id' => $producto->id])}}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" placeholder="Ingrese el nombre del producto">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $producto->descripcion }}" placeholder="Ingrese una descripcion">
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categorias</label>
                        <select class="form-control select2" style="width: 100%;" id="categoria" name="categoria">
                            @foreach($categorias as $categoria)
                                @if($categoria->id == $producto->id_categoria)
                                    <option value="{{ $categoria->id }}" selected>{{ $categoria->nombre }}</option>
                                @else
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </div>
                </form>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
@endsection