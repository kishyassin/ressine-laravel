<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id('numeroFacture');
            $table->string('etat');
            $table->string('adresseLivraison')->nullable();

            $table->boolean('reglee')->default(0);

            $table->unsignedBigInteger('idDate');
            $table->foreign('idDate')->references('idDate')->on('order_dates')->onDelete('cascade');

            $table->unsignedBigInteger('idLivreur')->nullable();
            $table->foreign('idLivreur')->references('idLivreur')->on('livreurs')->onDelete('cascade');

            $table->unsignedBigInteger('idClient');
            $table->foreign('idClient')->references('idClient')->on('clients')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('factures');
    }
}
