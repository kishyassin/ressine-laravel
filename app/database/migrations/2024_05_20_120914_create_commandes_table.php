<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id('idCommande');
            $table->string('etat');


                          
            $table->unsignedBigInteger('idDate');
            $table->foreign('idDate')->references('idDate')->on('order_dates')->onDelete('cascade');         
            
            $table->unsignedBigInteger('numeroFacture');
            $table->foreign('numeroFacture')->references('numeroFacture')->on('factures')->onDelete('cascade');         
                        
            $table->unsignedBigInteger('idLivreur');
            $table->foreign('idLivreur')->references('idLivreur')->on('livreurs')->onDelete('cascade');         
                                    
            $table->unsignedBigInteger('idClient');
            $table->foreign('idClient')->references('idClient')->on('clients')->onDelete('cascade');         
                                                
            $table->unsignedBigInteger('idPlat');
            $table->foreign('idPlat')->references('idPlat')->on('plats')->onDelete('cascade');         
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
