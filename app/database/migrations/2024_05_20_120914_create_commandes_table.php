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
            $table->foreignId('idDate')->constrained('order_dates');
            $table->foreignId('numeroFacture')->constrained('factures');
            $table->foreignId('idLivreur')->constrained('livreurs');
            $table->foreignId('idClient')->constrained('clients');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
