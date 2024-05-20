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
            $table->unsignedBigInteger('idCategorie'); // Changed data type
            $table->foreign('idCategorie')->references('idCategorie')->on('categories')->onDelete('cascade');            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plats');
    }
}
