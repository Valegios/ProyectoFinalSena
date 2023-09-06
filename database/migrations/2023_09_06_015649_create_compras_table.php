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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_compra')->nullable();
            $table->integer('cantidad');
            $table->integer('precio');
            $table->foreignId('id_administrador')->constrained('administrador'); //Relacion con la tabla administrador
            $table->foreignId('id_producto')->constrained('producto'); //Relacion con la tabla producto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
