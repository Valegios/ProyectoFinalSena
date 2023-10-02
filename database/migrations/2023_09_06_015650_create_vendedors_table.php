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
        Schema::create('vendedors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('apellido', 100);
            $table->string('email', 100);
            $table->string('password');
            $table->unsignedBigInteger('user_id'); //Se define la columna            
            $table->foreign('user_id')->references('id')->on('users'); //Se configura la clave foranea
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendedors');
    }
};
