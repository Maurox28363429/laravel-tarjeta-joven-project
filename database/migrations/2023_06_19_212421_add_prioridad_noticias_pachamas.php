<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrioridadNoticiasPachamas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        if (Schema::hasTable('noticias_pachamas') && !Schema::hasColumn('noticias_pachamas', 'prioridad')) {
            Schema::table('noticias_pachamas', function (Blueprint $table) {
                $table->integer('prioridad')->default(1);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('noticias_pachamas', function (Blueprint $table) {
            //
        });
    }
}
