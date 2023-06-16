<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concursos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ganador_id')->nullable()->unsigned();
            $table->foreign('ganador_id')->references('id')->on('users');
            $table->date('init_date');
            $table->date('end_date');
            $table->boolean('active')->default(false);
            $table->text('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('img')->nullable();
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
        Schema::dropIfExists('concursos');
    }
}
