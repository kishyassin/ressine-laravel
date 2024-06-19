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
            $table->string('adresseClient')->nullable();
            $table->string('login')->unique(); // Marked login as unique
            $table->string('password'); // Removed the duplicate and unique constraint
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
