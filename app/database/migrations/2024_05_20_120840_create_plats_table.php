<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatsTable extends Migration
{
    public function up()
    {
        Schema::create('plats', function (Blueprint $table) {
            $table->id('idPlat');
            $table->string('imagePlat')->nullable();
            $table->foreignId('idCategorie')->constrained('categories');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plats');
    }
}
