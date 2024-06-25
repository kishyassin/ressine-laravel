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

            $table->unsignedBigInteger('numeroFacture');
            $table->foreign('numeroFacture')->references('numeroFacture')->on('factures')->onDelete('cascade');

            $table->unsignedBigInteger('idPlat');
            $table->foreign('idPlat')->references('idPlat')->on('plats')->onDelete('cascade');

            $table->decimal('prixVente', 8, 2);
            $table->integer('quantite');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
