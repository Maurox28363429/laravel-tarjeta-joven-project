<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertasComerciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas_comercios', function (Blueprint $table) {
            $table->id();
            $table->text('img_array_url')->nullable();
            $table->double('price_total', 30, 2)->default(0);
            $table->double('descuento', 30, 2)->default(0);
            $table->text('description')->nullable();
            $table->string('nombre', 250)->unique();
            $table->date('fecha_tope_descuento')->nullable();
            $table->boolean('active')->default(true);
            $table->bigInteger('comercio_id')->nullable()->unsigned();
            $table->foreign('comercio_id')->references('id')->on('users');
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
        Schema::dropIfExists('ofertas_comercios');
    }
}
