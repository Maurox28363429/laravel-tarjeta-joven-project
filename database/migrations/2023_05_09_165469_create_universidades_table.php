<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universidades', function (Blueprint $table) {
            $table->id();
            $table->text('img_array_url')->nullable();
            $table->text('description')->nullable();
            $table->string('nombre', 250)->unique();
            $table->boolean('active')->default(true);
            $table->bigInteger('universidad_id')->nullable()->unsigned();
            $table->foreign('universidad_id')->references('id')->on('users');
            $table->text('link_map')->nullable();
            $table->string('dir', 250);
            $table->integer('prioridad')->default(0);
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
        Schema::dropIfExists('universidades');
    }
}
  