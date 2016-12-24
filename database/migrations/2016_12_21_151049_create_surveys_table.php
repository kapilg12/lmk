<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('torrent_id')->unsigned()->index();
            $table->integer('office_id')->unsigned()->index();
            $table->string('allow_area')->comment('Client allow area in Sq m');
            $table->string('establishment_name');
            $table->string('postel_address');
            $table->string('pin_code');
            $table->enum('nature_of_establishment', ['proprietorship', 'partnership_firm', 'private_limited', 'public_limited'])->comment('Proprietorship/Partnership firm/Private Limited/Public Limited');
            $table->string('contact_person_name');
            $table->string('designation');
            $table->string('contact_number');
            $table->string('email');
            $table->string('website');
            $table->boolean('is_active')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->boolean('is_certified')->default(0);
            //$table->morphs('a_surveysable');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('office_id')
                ->references('id')->on('offices')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
        Schema::create('b_surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('a_surveys_id')->unsigned()->index();
            $table->string('total_land_area')->comment('Total Land Area in Sq m');
            $table->string('roof_top_area')->comment('Roof Top Area of Buildings/Sheds in Sq m');
            // columns to store answers
            $table->string('road_paved_area')->nullable()->comment('Road/Paved Area in Sq m');
            $table->string('green_belt_area')->nullable()->comment('Green Belt Area in Sq m');
            $table->string('open_land')->nullable()->comment('Open Land in Sq m');
            //$table->string('area_type_GPSCoordinate')->nullable()->comment('Area for GPS Coordinates Like bulding, Shed and tubewell');
            //$table->string('GPSCoordinate_A')->nullable()->comment('GPS Coordinates A : Space available in north east corner of the area  L x W');
            //$table->string('GPSCoordinate_B')->nullable()->comment('GPS Coordinates B : Space available in north east corner of the area  L x W');
            //$table->string('GPSCoordinate_C')->nullable()->comment('GPS Coordinates C : Space available in north east corner of the area  L x W');
            //$table->string('GPSCoordinate_D')->nullable()->comment('GPS Coordinates D : Space available in north east corner of the area  L x W');
            //$table->string('space_available')->nullable()->comment('Space available in north east corner of the area  L x W');

            $table->string('average_annual_rainfall')->nullable()->comment('Average Annual Rainfall in the area in mm');
            $table->string('number_of_rainy_day')->nullable()->comment('Number of Rainy days in a Year');
            $table->enum('nature_of_aquifer', ['impermeable-area', 'non_porous_area', 'hard_rock_area', 'alluvial_area'])->comment('Is it Impermeable/non-porous/hard rock/Alluvial area?');
            $table->enum('nature_of_terrain', ['hilly', 'hocky', 'undulating', 'uniform', 'flat'])->comment('Nature of Terrain: Hilly/Rocky or Undulating, Uniform or flat');
            $table->enum('nature_of_soil', ['alluvial', 'sandy', 'loamy', 'gravel', 'silty'])->comment('Nature of Soil: Alluvial, Sandy, Loamy, gravel, silty');

            $table->string('recharge_well_depth')->nullable()->comment('Recharge well (T/W or H/P) – working / abandoned [Depth(m), Diameter(m)]');
            $table->string('recharge_well_diameter')->nullable()->comment('Recharge well (T/W or H/P) – working / abandoned [Depth(m), Diameter(m)]');

            $table->string('recharge_pit_depth')->nullable()->comment('Recharge Pit – working / abandoned [Depth(m), Diameter(m)]');
            $table->string('recharge_pit_diameter')->nullable()->comment('Recharge Pit – working / abandoned [Depth(m), Diameter(m)]');

            $table->string('recharge_trenches_l')->nullable()->comment('Recharge Trenches – working / abandoned [Dimension – L x W x D]');
            $table->string('recharge_trenches_w')->nullable()->comment('Recharge Trenches – working / abandoned [Dimension – L x W x D]');
            $table->string('recharge_trenches_d')->nullable()->comment('Recharge Trenches – working / abandoned [Dimension – L x W x D]');

            $table->string('water_bodies_ponds_depth')->nullable()->comment('Water bodies ponds etc.– working / abandoned [Depth(m), Diameter(m)]');
            $table->string('water_bodies_ponds_diameter')->nullable()->comment('Water bodies ponds etc.– working / abandoned [Depth(m), Diameter(m)]');

            $table->string('source_of_availability_of_surface_water')->nullable()->comment('Source of Availability of surface water for industrial use, if any, give details');
            $table->string('water_supply_from_RIICO')->nullable()->comment('Water Supply from RIICO, if available, take copy of last 3 bills');

            //$table->morphs('b_surveysable');
            $table->timestamps();
            $table->foreign('a_surveys_id')
                ->references('id')->on('a_surveys')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('b_sg_waters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('b_surveys_id')->unsigned()->index();
            $table->string('tubewell_borewell')->nullable()->comment("Tubewell / Borewell (Working only)");
            $table->string('depth_of_s_pump')->nullable()->comment("Depth of S/pump & water level (m)**, Diameter(m)");
            $table->string('current_water_abstraction')->nullable()->comment("Current Water Abstraction - Discharge Rate x working hr");
            //$table->morphs('b_sg_waters');
            $table->timestamps();
            $table->foreign('b_surveys_id')
                ->references('id')->on('b_surveys')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('b_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('b_surveys_id')->unsigned()->index();
            $table->string('area_location')->nullable()->comment("Area/Location Attchment");
            $table->string('sources_sw_gw')->nullable()->comment("Sources – SW/GW");
            $table->string('existing_rwh_structure')->nullable()->comment("Existing RWH Structure");
            $table->string('site_layout_plan')->nullable()->comment("Site Layout plan");
            //$table->morphs('b_attachmentsable');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('b_surveys_id')
                ->references('id')->on('b_surveys')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });

        Schema::create('c_one_surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('a_surveys_id')->unsigned()->index();
            $table->enum('details_of_water_requirement', ['industrial', 'residential', 'domestic', 'greenbelt_development', 'other_uses_specify', 'total'])->comment('Details of Water requirement / recycled water usage: (Demand a flow chart of activities and requirement of water at each stage)');
            $table->string('requirement_CGWA_permission')->nullable()->comment('Requirement as per CGWA permission**/##(Cum/day)');
            $table->string('existing_requirement')->nullable()->comment('Existing Requirement (Cum/day)');
            $table->string('no_of_operational_day')->nullable()->comment('No. of operational days (Cum/day)');
            $table->string('annual_requirement')->nullable()->comment('Annual requirement (Cum/year)');
            //$table->morphs('c_one_surveysable');
            $table->timestamps();
            $table->foreign('a_surveys_id')
                ->references('id')->on('a_surveys')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::create('c_two_surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('c_one_surveys_id')->unsigned()->index();
            $table->string('breakup_of_recycled_water_usage')->nullable()->comment('Breakup of Recycled water usage');
            $table->string('cum_day')->nullable()->comment('Cum/day');
            $table->string('cum_year')->nullable()->comment('Cum/Year');

            //$table->morphs('c_two_surveysable');
            $table->timestamps();
            $table->foreign('c_one_surveys_id')
                ->references('id')->on('c_one_surveys')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('GPSCoordinates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('b_surveys_id')->unsigned()->index();
            $table->string('GPSCoordinate_area')->nullable()->comment('bulding,shed,tubewell');
            $table->string('GPSCoordinate_type')->nullable()->comment('residential, non residential');
            $table->string('GPSCoordinate_point')->nullable()->comment('A,B,C,D');
            $table->string('GPSCoordinate_latitude')->nullable()->comment('latitude');
            $table->string('GPSCoordinate_longitude')->nullable()->comment('longitude');
            //$table->morphs('c_two_surveysable');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('b_surveys_id')
                ->references('id')->on('b_surveys')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('GPSCoordinate_points', function (Blueprint $table) {
            $table->increments('id');
            $table->string('GPSCoordinate_area')->nullable()->comment('bulding,shed,tubewell');
            $table->string('GPSCoordinate_type')->nullable()->comment('residential, non residential');
            $table->integer('GPSCoordinate_point')->nullable()->default(0)->comment('1,2,3,4,5');
            //$table->morphs('c_two_surveysable');
            $table->timestamps();
        });

        Schema::create('survey_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('a_surveys_id')->unsigned()->index();
            $table->enum('is_status', ['active', 'approved', 'completed', 'certified'])->comment('Set Status');
            $table->string('ip_address')->nullable()->comment('Track Ip Address');
            //$table->morphs('c_two_surveysable');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('a_surveys_id')
                ->references('id')->on('a_surveys')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('a_surveys');
        Schema::drop('b_surveys');
        Schema::drop('b_sg_waters');
        Schema::drop('b_attachments');
        Schema::drop('c_one_surveys');
        Schema::drop('c_two_surveys');
        Schema::drop('survey_logs');
    }
}
