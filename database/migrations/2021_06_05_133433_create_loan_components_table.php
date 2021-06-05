<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_components', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('loan_id')->primary();
            $table->foreign('loan_id')->references('id')->on('loans');

            $table->bigInteger('component_id');
            $table->foreign('component_id')->references('id')->on('component_types');

            $table->bigInteger('specific_component_id');
            $table->foreign('specific_component_id')->references('id')->on('specific_components');
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
        Schema::dropIfExists('loan_components');
    }
}
