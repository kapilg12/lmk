<?php

use Illuminate\Database\Migrations\Migration;

class AddColumnSlugInBAttacmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('b_attachments', function ($table) {
            $table->string('image_path')->nullable()->after('b_survey_id');
            $table->string('slug')->nullable()->after('image_path');
            $table->string('comment')->nullable()->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('b_attachments', function ($table) {
            $table->dropColumn('image_path');
            $table->dropColumn('slug');
            $table->dropColumn('comment');
        });
    }
}
