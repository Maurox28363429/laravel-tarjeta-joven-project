<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NoticiasInformativasAddLinkJson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('noticias_informativas', function (Blueprint $table) {
            $table->string('link_youtube',250)->nullable();
            $table->string('link_facebook',250)->nullable();
            $table->string('link_instragram',250)->nullable();
            $table->string('link_web',250)->nullable();
            $table->string('link_otros',250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('noticias_informativas', function (Blueprint $table) {
            //
        });
    }
}
