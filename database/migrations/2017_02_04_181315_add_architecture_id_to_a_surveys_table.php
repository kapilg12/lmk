<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArchitectureIdToASurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('a_surveys', function ($table) {
            $table->integer('architecture_id')->unsigned()->index()->after('torrent_id');
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
            $table->dropColumn('architecture_id');
        });
    }
}
