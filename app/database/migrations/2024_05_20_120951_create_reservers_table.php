<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReserversTable extends Migration
{
    public function up()
    {
        Schema::create('reservers', function (Blueprint $table) {


            $table->unsignedBigInteger('idClient');
            $table->foreign('idClient')->references('idClient')->on('clients')->onDelete('cascade');         
        
            $table->unsignedBigInteger('numeroTable');
            $table->foreign('numeroTable')->references('numeroTable')->on('tables')->onDelete('cascade');         
        
                    
            $table->unsignedBigInteger('idDate');
            $table->foreign('idDate')->references('idDate')->on('order_dates')->onDelete('cascade');         
        
            
            $table->string('repa');
            $table->primary(['idClient', 'numeroTable', 'idDate']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reserver');
    }
}