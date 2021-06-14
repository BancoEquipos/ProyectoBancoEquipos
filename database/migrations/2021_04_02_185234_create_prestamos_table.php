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
            $table->string("profesor_valida")->nullable();
            $table->date("alta_solicitud");
            $table->date("fecha_valida")->nullable();
            $table->date("fecha_fin")->nullable();
            $table->date("fecha_devolucion")->nullable();
            $table->date("fecha_envio")->nullable(); //salida en tablas de Víctor
            $table->foreignId('motivo_id')->references('id')->on('motivos');
            $table->foreignId('alumno_id')->references('id')->on('alumnos');
            $table->foreignId('domicilio_id')->references('id')->on('domicilios');
            $table->foreignId('ciclo_formativo_id')->references('id')->on('cicloformativos');
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
