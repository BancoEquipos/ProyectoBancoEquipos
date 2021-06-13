<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosComponentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos_componentes', function (Blueprint $table) {
            $table->id();
            $table->boolean('activo');
            $table->foreignId("componente_id")->nullable()->references('componente_id')->on('componentes');
            $table->foreignId('prestamo_id')->references('prestamo_id')->on('prestamos');
            $table->foreignId('tipo_componente_id')->references('id')->on('tipocomponentes');
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
        Schema::dropIfExists('prestamos_componentes');
    }
}
