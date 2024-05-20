<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDatesTable extends Migration
{
    public function up()
    {
        Schema::create('order_dates', function (Blueprint $table) {
            $table->id('idDate');
            $table->date('jjmmaaaa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_dates');
    }
}
