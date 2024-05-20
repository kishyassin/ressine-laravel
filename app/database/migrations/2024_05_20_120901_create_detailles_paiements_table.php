<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetaillesPaiementsTable extends Migration
{
    public function up()
    {
        Schema::create('detailles_paiements', function (Blueprint $table) {
            $table->id('idMp');
            $table->string('numeroCarte', 19);
            $table->foreignId('idPaiement')->unique()->constrained('paiements');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detailles_paiements');
    }
}
