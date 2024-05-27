<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id('idImage');
            $table->unsignedBigInteger('idPlat');
            $table->foreign('idPlat')->references('idPlat')->on('plats')->onDelete('cascade');         
            $table->string('imageSlide')->nullable();
            $table->string('imageHero')->nullable();
            $table->string('imageIcon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
