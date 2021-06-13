<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id('prestamo_id');
            $table->integer("curso");
            $table->string("profesor_valida");
            $table->timestamp("fecha_validacion");
            $table->date("fecha_devolucion");
            $table->date("fecha_entrega");
            $table->date("fecha_alta_solicitud");
            $table->foreignId('motivo_id')->references('id')->on('motivos');
            $table->foreignId('alumno_id')->references('id')->on('alumnos');
            $table->foreignId('domicilio_id')->references('id')->on('domicilios');
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
        Schema::dropIfExists('prestamos');
    }
}
