<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componentes', function (Blueprint $table) {
            $table->id("componente_id");
            $table->integer('numero_serie')->unique();
            $table->foreignId('tipo_componente_id')->references("tipo_componente_id")->on("tipos_componentes");
            $table->foreignId("prestamo_id")->references("prestamo_id")->on("prestamos");
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
        Schema::dropIfExists('componentes');
    }
}
