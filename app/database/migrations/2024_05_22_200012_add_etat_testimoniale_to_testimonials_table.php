<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEtatTestimonialeToTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testimoniales', function (Blueprint $table) {
            $table->boolean('etatTestimoniale')->default(false)->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testimoniales', function (Blueprint $table) {
            $table->dropColumn('etatTestimoniale');
        });
    }
}

