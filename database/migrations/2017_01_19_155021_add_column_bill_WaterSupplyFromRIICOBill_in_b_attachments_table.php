<?php

use Illuminate\Database\Migrations\Migration;

class AddColumnBillWaterSupplyFromRIICOBillInBAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('b_attachments', function ($table) {
            $table->string('WaterSupplyFromRIICOBill')->nullable()->after('b_survey_id');
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
            $table->dropColumn('WaterSupplyFromRIICOBill');
        });

    }
}
