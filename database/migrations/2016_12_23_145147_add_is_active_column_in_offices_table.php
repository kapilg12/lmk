<?php

use Illuminate\Database\Migrations\Migration;

class AddIsActiveColumnInOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offices', function ($table) {
            $table->boolean('is_active')->default(0)->after('office_pin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offices', function ($table) {
            $table->dropColumn('is_active');
        });
    }
}
