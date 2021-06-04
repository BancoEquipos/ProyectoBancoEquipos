<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->integer('nre');
            $table->text('curso');
            $table->text('cicloFormativo');
            $table->text('motivoSolicitud');
            $table->year('agnoPrestamo');
            $table->string('profesorValidador',254);
            $table->date('validacion');
            $table->date('fechaDevolucionTope');
            $table->date('salida');
            $table->date('fechaAltaSolicitud');
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
        Schema::dropIfExists('loans');
    }
}
