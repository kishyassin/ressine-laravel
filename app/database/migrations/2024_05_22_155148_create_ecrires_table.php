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
        Schema::create('ecrires', function (Blueprint $table) {
            $table->unsignedBigInteger('idClient');
            $table->foreign('idClient')->references('idClient')->on('clients')->onDelete('cascade');         
        
            $table->unsignedBigInteger('idTestimoniale');
            $table->foreign('idTestimoniale')->references('idTestimoniale')->on('testimoniales')->onDelete('cascade');         
        
                    
            $table->unsignedBigInteger('idDate');
            $table->foreign('idDate')->references('idDate')->on('order_dates')->onDelete('cascade');         
        
            
        
            $table->primary(['idClient', 'idTestimoniale', 'idDate']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecrires');
    }
};
