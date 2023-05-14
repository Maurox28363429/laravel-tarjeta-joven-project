<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteDataPriceMembresias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('price_membresias', function (Blueprint $table) {
            //

            $table->dropColumn('total');
            $table->dropColumn('referencia');
            $table->dropColumn('description');
            $table->dropForeign('membresia_id');
            $table->dropColumn('membresia_id');
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
