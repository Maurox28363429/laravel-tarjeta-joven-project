<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComercioOfertaClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comercio_oferta_clientes', function (Blueprint $table) {
            $table->id();
            //comercio
            $table->bigInteger('comercio_id')->nullable()->unsigned();
            $table->foreign('comercio_id')->references('id')->on('users');
            //usuarios
            $table->bigInteger('client_id')->nullable()->unsigned();
            $table->foreign('client_id')->references('id')->on('users');
            //oferta
            $table->double('total', 30, 2)->default(0);
            $table->double('total_descuento', 30, 2)->default(0);
            $table->text('ofertas')->nullable();
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
        Schema::dropIfExists('comercio_oferta_clientes');
    }
}
