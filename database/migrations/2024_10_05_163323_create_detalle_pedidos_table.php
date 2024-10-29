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
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id('codigo');
            $table->integer('cantidad'); // Cantidad de cada plato en el pedido
            $table->decimal('precio_unitario', 8, 2); // Precio unitario del plato
            $table->decimal('subtotal', 10, 2);
            $table->unsignedBigInteger('pedido');
            $table->foreign('pedido')->references('codigo')->on('pedidos');
            $table->unsignedBigInteger('plato');
            $table->foreign('plato')->references('codigo')->on('platos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pedidos');
    }
};
