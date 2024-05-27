<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('idClient');
            $table->string('nom');
            $table->string('prenom');
            $table->string('imageClient')->nullable();
            $table->string('telephone', 20); 
            $table->string('adresse')->nullable();
            $table->string('login'); // Ajout du champ login
            $table->string('password')->unique(); // Ajout du champ password unique
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
