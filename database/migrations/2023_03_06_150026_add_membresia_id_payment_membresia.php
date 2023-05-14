<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMembresiaIdPaymentMembresia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_menbresias', function (Blueprint $table) {
            $table->bigInteger('membresia_id')->nullable()->unsigned();
            $table->foreign('membresia_id')->references('id')->on('membresias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_menbresias', function (Blueprint $table) {
            //
        });
    }
}
