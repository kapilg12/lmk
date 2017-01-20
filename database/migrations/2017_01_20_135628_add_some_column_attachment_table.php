<?php

use Illuminate\Database\Migrations\Migration;

class AddSomeColumnAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('b_attachments', function ($table) {
            $table->string('display_name')->nullable()->after('image_path');
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
            $table->dropColumn('display_name');
        });
    }
}
