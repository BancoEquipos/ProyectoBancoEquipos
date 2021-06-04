<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentTypeTable extends Migration
{

    public function up()
    {
        Schema::create('component_type', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombreComponente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('component_type');
    }
}
