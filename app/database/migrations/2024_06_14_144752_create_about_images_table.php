<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateaboutImagesTable extends Migration
{
    public function up()
    {
        Schema::create('about_images', function (Blueprint $table) {
            $table->id('idImage');
            $table->unsignedBigInteger('idAbout'); // Changed data type
            $table->foreign('idAbout')->references('idAbout')->on('abouts')->onDelete('cascade');            
            $table->string('url');
            $table->string('position');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
}