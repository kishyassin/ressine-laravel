<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPlatsTable extends Migration
{
    public function up()
    {
        Schema::table('plats', function (Blueprint $table) {
            $table->string('designationPlat')->nullable();
            $table->text('descriptionPlat')->nullable();
            $table->decimal('prixUnitaire', 8, 2)->nullable(); // Adjust precision and scale as needed
            $table->unsignedTinyInteger('etoiles')->nullable(); // Assuming etoiles is a rating out of 5
        });
    }

    public function down()
    {
        Schema::table('plats', function (Blueprint $table) {
            $table->dropColumn('designationPlat');
            $table->dropColumn('descriptionPlat');
            $table->dropColumn('prixUnitaire');
            $table->dropColumn('etoiles');
        });
    }
}
