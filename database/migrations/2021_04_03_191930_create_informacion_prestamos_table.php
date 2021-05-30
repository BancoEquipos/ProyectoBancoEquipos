<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionPrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_prestamos', function (Blueprint $table) {
            $table->id();
            //Revisar esta fila y comprobar como restringir a siete números
            $table->integer("__nre_alumno__");
            $table->foreignId("ciclo_formativo_id")->references("ciclo_formativo_id")->on("ciclos_formativos");
            $table->integer("curso");
            $table->text("motivo_solicitud");
            $table->string("profesor_valida");
            $table->timestamp("fecha_validacion");
            $table->date("fecha_devolucion");
            $table->date("fecha_entrega");
            $table->date("fecha_alta_solicitud");
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
        Schema::dropIfExists('informacion_prestamos');
    }
}
