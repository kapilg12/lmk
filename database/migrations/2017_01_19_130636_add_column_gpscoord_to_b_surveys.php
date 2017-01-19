<?php

use Illuminate\Database\Migrations\Migration;

class AddColumnGpscoordToBSurveys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('b_surveys', function ($table) {
            $table->string('GPSCoordinate_waypoint_plot')->nullable()->after('open_land');
            $table->string('GPSCoordinate_waypoint_tubewell')->nullable()->after('GPSCoordinate_waypoint_plot');
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
            $table->dropColumn('GPSCoordinate_waypoint_plot');
            $table->dropColumn('GPSCoordinate_waypoint_tubewell');
        });
    }
}
