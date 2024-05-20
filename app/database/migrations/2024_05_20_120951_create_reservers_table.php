<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReserverTable extends Migration
{
    public function up()
    {
        Schema::create('reserver', function (Blueprint $table) {
            $table->foreignId('idClient')->constrained('clients');
            $table->foreignId('numeroTable')->constrained('tables');
            $table->foreignId('idDate')->constrained('order_dates');
            $table->string('repa');
            $table->primary(['idClient', 'numeroTable', 'idDate']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reserver');
    }
}