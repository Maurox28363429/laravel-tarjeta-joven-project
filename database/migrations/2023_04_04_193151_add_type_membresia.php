<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeMembresia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('membresias', function (Blueprint $table) {
            $table->bigInteger('membresia_id')->nullable()->unsigned();
            $table->foreign('membresia_id')->references('id')->on('price_membresias');
            $table->string('type',200)->nullable()->default('Prueba');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('membresias', function (Blueprint $table) {
            //
        });
    }
}
