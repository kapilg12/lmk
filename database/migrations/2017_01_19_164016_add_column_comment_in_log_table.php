<?php

use Illuminate\Database\Migrations\Migration;

class AddColumnCommentInLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_logs', function ($table) {
            $table->text('comment')->nullable()->after('is_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survey_logs', function ($table) {
            $table->dropColumn('comment');
        });
    }
}
