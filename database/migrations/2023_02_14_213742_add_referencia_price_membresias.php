<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferenciaPriceMembresias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('price_membresias', function (Blueprint $table) {
            $table->bigInteger('membresia_id')->nullable()->unsigned();
            $table->foreign('membresia_id')->references('id')->on('membresias');
            $table->text('description')->nullable();
            $table->string('referencia',250)->nullable();
            $table->double('total', 30, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('price_membresias', function (Blueprint $table) {
            //
        });
    }
}
