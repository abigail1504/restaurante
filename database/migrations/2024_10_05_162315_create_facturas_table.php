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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('codigo');
            $table->string('numero_factura')->unique(); // Número único de la factura
            $table->date('fecha'); // Fecha de la factura
            $table->decimal('subtotal', 10, 2); // Subtotal sin impuestos
            $table->decimal('impuesto', 5, 2); // Impuesto (ej. IVA)
            $table->decimal('total', 10, 2); // Total de la factura
            $table->string('metodo_pago'); // Método de pago (efectivo, tarjeta, etc.)
            $table->string('estado')->default('pendiente');
            $table->unsignedBigInteger('cliente');
            $table->foreign('cliente')->references('codigo')->on('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
