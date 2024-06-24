<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRessineTablesTable extends Migration
{
    public function up()
    {
        Schema::create('ressineTables', function (Blueprint $table) {
            $table->id('numeroTable');
            $table->integer('nbPlaces');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ressineTables');
    }
}
