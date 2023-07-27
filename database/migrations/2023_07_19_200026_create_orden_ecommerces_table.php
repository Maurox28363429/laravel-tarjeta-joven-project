<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenEcommercesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_ecommerces', function (Blueprint $table) {
            $table->id();
            $table->text('json_productos');
            $table->bigInteger('client_id')->nullable()->unsigned();
            $table->foreign('client_id')->references('id')->on('users');
            $table->double('total', 8, 2);
            $table->string('estado')->default('pendiente');
            $table->string('tipo_pago')->default('efectivo');
            $table->text('img')->default('https://placehold.co/600x400/png');
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
        Schema::dropIfExists('orden_ecommerces');
    }
}
