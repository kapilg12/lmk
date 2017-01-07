<?php

use Illuminate\Database\Migrations\Migration;

class AddCommentColumnInGpscoordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gpscoordinates', function ($table) {
            $table->string('gpxfile')->nullable()->after('GPSCoordinate_longitude');
            $table->text('comment')->nullable()->after('gpxfile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gpscoordinates', function ($table) {
            $table->text('gpxfile');
            $table->text('comment');
        });
    }
}
