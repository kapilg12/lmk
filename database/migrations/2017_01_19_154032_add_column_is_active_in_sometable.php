<?php

use Illuminate\Database\Migrations\Migration;

class AddColumnIsActiveInSometable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('b_surveys', function ($table) {
            $table->boolean('is_active')->default(1)->after('water_supply_from_RIICO');
        });
        Schema::table('gpscoordinates', function ($table) {
            $table->boolean('is_active')->default(1)->after('gpxfile');
        });
        Schema::table('b_sg_waters', function ($table) {
            $table->boolean('is_active')->default(1)->after('current_water_abstraction');
        });
        Schema::table('b_attachments', function ($table) {
            $table->boolean('is_active')->default(1)->after('attachgpxfile');
        });
        Schema::table('c_one_surveys', function ($table) {
            $table->boolean('is_active')->default(1)->after('annual_requirement');
        });
        Schema::table('c_two_surveys', function ($table) {
            $table->boolean('is_active')->default(1)->after('cum_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('b_surveys', function ($table) {
            $table->dropColumn('is_active');
        });
        Schema::table('gpscoordinates', function ($table) {
            $table->dropColumn('is_active');
        });
        Schema::table('b_sg_waters', function ($table) {
            $table->dropColumn('is_active');
        });
        Schema::table('b_attachments', function ($table) {
            $table->dropColumn('is_active');
        });
        Schema::table('c_one_surveys', function ($table) {
            $table->dropColumn('is_active');
        });
        Schema::table('c_two_surveys', function ($table) {
            $table->dropColumn('is_active');
        });
    }
}
