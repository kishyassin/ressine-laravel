<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenirsTable extends Migration
{
    public function up()
    {
        Schema::create('contenir', function (Blueprint $table) {

                                    
            $table->unsignedBigInteger('idPlat');
            $table->foreign('idPlat')->references('idPlat')->on('plats')->onDelete('cascade');         
                                                
            $table->unsignedBigInteger('idCommande');
            $table->foreign('idCommande')->references('idCommande')->on('commandes')->onDelete('cascade');         
            
            $table->primary(['idPlat', 'idCommande']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contenir');
    }
}
