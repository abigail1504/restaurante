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
        Schema::create('reporte_ventas', function (Blueprint $table) {
            $table->id('codigo');
            $table->date('fecha'); // Fecha de las ventas diarias
            $table->integer('numero_ventas')->default(0); // Total de ventas realizadas en el día
            $table->decimal('subtotal', 10, 2)->default(0); // Subtotal total de las ventas sin impuestos
            $table->decimal('impuesto_total', 10, 2)->default(0); // Total de impuestos recaudados
            $table->decimal('total_ventas', 10, 2)->default(0); // Total de ventas (subtotal + impuestos)
            $table->integer('ventas_efectivo')->default(0); // Número de ventas pagadas en efectivo
            $table->integer('ventas_tarjeta')->default(0); // Número de ventas pagadas con tarjeta
            $table->decimal('total_efectivo', 10, 2)->default(0); // Total de dinero recibido en efectivo
            $table->decimal('total_tarjeta', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporte_ventas');
    }
};
