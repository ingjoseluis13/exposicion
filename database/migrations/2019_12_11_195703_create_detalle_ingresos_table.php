<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingresos', function (Blueprint $table) {
            $table->integer('id_ingreso', false, true);
            $table->integer('id_producto', false, true);
            $table->integer('cantidad');
            $table->decimal('precio_compra', 10, 2);
            $table->decimal('precio_venta', 10, 2);

            $table->foreign('id_ingreso')
            ->references('id')
            ->on('ingresos');

            $table->foreign('id_producto')
            ->references('id')
            ->on('productos');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ingresos');
    }
}
