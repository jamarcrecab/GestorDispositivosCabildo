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
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nombre')->nullable(false);
            $table->string('apellidos')->nullable(false);
            $table->string('correo')->nullable(false);
            $table->string('dni')->nullable(false);
            $table->string('icc')->nullable(false);
            $table->integer('telefono')->nullable(false);
            $table->integer('extension')->nullable(false);
            $table->string('pin')->nullable(false);
            $table->string('puk')->nullable(false);
            $table->string('tipo_contrato')->nullable(false);
            $table->string('servicios_adicionales')->nullable(false);
            $table->date('fecha_recogida')->nullable(false);
            $table->date('fecha_alta')->nullable(true);
            $table->enum('estado',['Alta','Baja'])->nullable(false);
            $table->enum('puesto',['Departamental','Jefe Servicio','Trabajador','Cargo Político','Cargo Confianza']);
            $table->mediumtext('foto_sim')->nullable(true);
            $table->string('departamento')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarjetas');
    }
};
