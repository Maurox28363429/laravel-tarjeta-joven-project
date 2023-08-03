<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosEcommercesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
Schema::create('productos_ecommerces', function (Blueprint $table) {
    $table->id();
    $table->string('nombre', 250);
    $table->string('descripcion', 250)->nullable();
    $table->text('img')->nullable();
    $table->double('precio', 30, 2);
    $table->string('whatsap', 250)->nullable();
    $table->double('stock', 30, 2);
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
        Schema::dropIfExists('productos_ecommerces');
    }
}
