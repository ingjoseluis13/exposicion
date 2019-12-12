<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Proveedor;
use Illuminate\Http\Request;
use App\Ingreso;
use App\DetalleIngreso;

use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresos = Ingreso::join('proveedores', 'proveedores.id', 'ingresos.id_proveedor')
            ->join('detalle_ingresos', 'detalle_ingresos.id_ingreso', 'ingresos.id')
            ->select('ingresos.id', 'ingresos.fecha', 'proveedores.nombre', 'ingresos.estado', DB::raw('sum(detalle_ingresos.cantidad * detalle_ingresos.precio_compra) as total'))
            ->orderBy('ingresos.id', 'desc')
            ->groupBy('ingresos.id', 'ingresos.fecha', 'proveedores.nombre', 'ingresos.estado')
            ->get();

        return view('layouts.ingresos.index', compact('ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::all();

        $productos = Producto::where('estado', 'activo')
            ->select('id', 'nombre')
            ->get();

        return view('layouts.ingresos.create', compact('proveedores', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $ingreso = new Ingreso();

            $ingreso->fecha = date("Y-m-d");
            $ingreso->id_proveedor = $request->proveedor;
            $ingreso->estado = 'activo';

            $ingreso->save();

            $id_producto = $request->idproducto;
            $cantidad = $request->cantidad;
            $precio_compra = $request->precio_compra;
            $precio_venta = $request->precio_venta;

            $cont = 0;

            while ($cont < count($id_producto)) {
                $detalle = new DetalleIngreso();

                $detalle->id_ingreso = $ingreso->id;
                $detalle->id_producto = $id_producto[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio_compra = $precio_compra[$cont];
                $detalle->precio_venta = $precio_venta[$cont];

                $detalle->save();

                $cont = $cont + 1;
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('ingreso.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingreso = Ingreso::join('proveedores', 'proveedores.id', 'ingresos.id_proveedor')
            ->join('detalle_ingresos', 'detalle_ingresos.id_ingreso', 'ingresos.id')
            ->select('ingresos.id', 'ingresos.fecha', 'proveedores.nombre', 'ingresos.estado', DB::raw('sum(detalle_ingresos.cantidad * detalle_ingresos.precio_compra) as total'))
            ->where('ingresos.id', $id)
            ->groupBy('ingresos.id', 'ingresos.fecha', 'proveedores.nombre', 'ingresos.estado')
            ->first();

        $detalles = DetalleIngreso::join('productos', 'detalle_ingresos.id_producto', 'productos.id')
            ->select('productos.nombre', 'detalle_ingresos.cantidad', 'detalle_ingresos.precio_compra', 'detalle_ingresos.precio_venta')
            ->where('detalle_ingresos.id_ingreso', $id)
            ->get();

        return view('layouts.ingresos.show', compact('ingreso', 'detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingreso = Ingreso::findOrFail($id);

        $ingreso->estado = 'cancelado';
        $ingreso->update();

        return redirect()->route('ingreso.index');
    }
}
