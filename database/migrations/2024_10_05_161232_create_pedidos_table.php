<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('codigo');
            $table->string('numero_orden');
            $table->bigInteger('cantidad_pedido');
            $table->decimal('precio_total', 8, 2);
            $table->date('fecha_orden');
            $table->bigInteger('cliente')->unsigned();//Para relación
            $table->foreign('cliente')->references('codigo')->on('clientes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
