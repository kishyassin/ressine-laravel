<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id('idAbout');
            $table->string('title');
            $table->string('welcome_text');
            $table->text('description');
            $table->text('additional_info');
            $table->string('email');
            $table->string('address');
            $table->string('telephone');
            $table->integer('starting_year');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}