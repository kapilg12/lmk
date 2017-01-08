<?php

use Illuminate\Database\Migrations\Migration;

class AddColumnIsAppliedInASurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('a_surveys', function ($table) {
            $table->boolean('is_applied')->default(1)->after('is_certified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('a_surveys', function ($table) {
            $table->dropColumn('is_applied');
        });
    }
}
