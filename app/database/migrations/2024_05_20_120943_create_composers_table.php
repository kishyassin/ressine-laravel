<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateComposersTable extends Migration
    {
        public function up()
        {
            Schema::create('composers', function (Blueprint $table) {


                $table->unsignedBigInteger('idPlat');
                $table->foreign('idPlat')->references('idPlat')->on('plats')->onDelete('cascade');         
            
                $table->unsignedBigInteger('idIngredient');
                $table->foreign('idIngredient')->references('idIngredient')->on('ingredients')->onDelete('cascade');         
            
                
                $table->primary(['idPlat', 'idIngredient']);
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('composer');
        }
    }