<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SurveyLogEnumValueAdded extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                Schema::table('survey_logs', function ($table) {
            $table->dropColumn('is_status');
        });
        Schema::table('survey_logs', function ($table) {
            $table->enum('is_status', ['a_audit_created', 'b_audit_created', 'b_audit_updated', 'c_audit_created', 'c_audit_updated', 'gps_coordinate_created', 'gps_coordinate_update', 'swg_water_created', 'swg_water_update', 'update', 'applied', 'not_applied', 'file_upload', 'active', 'approved', 'completed', 'certified',"audit_assigned_superadmin"])->comment('Set Status')->after('a_survey_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
