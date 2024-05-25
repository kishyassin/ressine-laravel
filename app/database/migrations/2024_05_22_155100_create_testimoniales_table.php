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
        Schema::create('testimoniales', function (Blueprint $table) {
            $table->id('idTestimoniale');
            $table->string('message');
            $table->date('jjmmaaaa');
            $table->timestamps();
            $table->unsignedBigInteger('idClient');
            $table->foreign('idClient')->references('idClient')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimoniales');
    }
};