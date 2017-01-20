<?php

use Illuminate\Database\Migrations\Migration;

class RemoveColumnToBAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('b_attachments', function ($table) {
            $table->dropColumn('WaterSupplyFromRIICOBill');
            $table->dropColumn('area_location');
            $table->dropColumn('sources_sw_gw');
            $table->dropColumn('existing_rwh_structure');
            $table->dropColumn('site_layout_plan');
            $table->dropColumn('attachgpxfile');
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
            $table->string('WaterSupplyFromRIICOBill')->nullable()->comment("Area/Location Attchment");
            $table->string('area_location')->nullable()->comment("Area/Location Attchment");
            $table->string('sources_sw_gw')->nullable()->comment("Sources – SW/GW");
            $table->string('existing_rwh_structure')->nullable()->comment("Existing RWH Structure");
            $table->string('site_layout_plan')->nullable()->comment("Site Layout plan");
            $table->string('attachgpxfile')->nullable()->comment("Site Layout plan");
        });
    }
}
