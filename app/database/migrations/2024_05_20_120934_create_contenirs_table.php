<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenirsTable extends Migration
{
    public function up()
    {
        Schema::create('contenir', function (Blueprint $table) {
            $table->foreignId('idPlat')->constrained('plats');
            $table->foreignId('idCommande')->constrained('commandes');
            $table->primary(['idPlat', 'idCommande']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contenir');
    }
}
