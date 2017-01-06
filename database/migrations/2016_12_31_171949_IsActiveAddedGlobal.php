<?php

use Illuminate\Database\Migrations\Migration;

class IsActiveAddedGlobal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function ($table) {
            $table->boolean('is_active')->default(1);
        });
        Schema::table('states', function ($table) {
            $table->boolean('is_active')->default(1);
        });
        Schema::table('permissions', function ($table) {
            $table->boolean('is_active')->default(1);
        });
        Schema::table('roles', function ($table) {
            $table->boolean('is_active')->default(1);
        });
        Schema::table('users', function ($table) {
            $table->boolean('is_active')->default(1);
        });
        Schema::table('offices', function ($table) {
            $table->boolean('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function ($table) {
            $table->dropColumn('is_active');
        });
        Schema::table('states', function ($table) {
            $table->dropColumn('is_active');
        });
        Schema::table('permissions', function ($table) {
            $table->dropColumn('is_active');
        });
        Schema::table('roles', function ($table) {
            $table->dropColumn('is_active');
        });
        Schema::table('users', function ($table) {
            $table->dropColumn('is_active');
        });
        Schema::table('offices', function ($table) {
            $table->dropColumn('is_active');
        });
    }
}
