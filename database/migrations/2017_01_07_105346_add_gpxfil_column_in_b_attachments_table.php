<?php

use Illuminate\Database\Migrations\Migration;

class AddGpxfilColumnInBAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('b_attachments', function ($table) {
            $table->string('attachgpxfile')->nullable()->after('site_layout_plan');
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
            $table->text('attachgpxfile');
        });
    }
}
