<?php

namespace App;

use App\BSgWater;
use App\Gpscoordinate;
use Illuminate\Database\Eloquent\Model;

class BSurvey extends Model
{
    protected $table = 'b_surveys';
    protected $fillable = ['id', 'a_survey_id', 'total_land_area', 'roof_top_area', 'road_paved_area', 'green_belt_area', 'open_land', 'average_annual_rainfall', 'number_of_rainy_day', 'nature_of_aquifer', 'nature_of_terrain', 'nature_of_soil', 'recharge_well_depth', 'recharge_well_diameter', 'recharge_pit_depth', 'recharge_pit_diameter', 'recharge_trenches_l ', 'recharge_trenches_w', 'recharge_trenches_d', 'water_bodies_ponds_depth', 'water_bodies_ponds_diameter', 'source_of_availability_of_surface_water', 'water_supply_from_RIICO', 'created_at', 'updated_at'];

    public function surveys()
    {
        return $this->belongsTo(ASurvey::class, 'a_survey_id');
    }

    public function bsgwater()
    {
        return $this->hasMany(BSgWater::class, 'b_survey_id', 'id');
    }
    public function gpscoordinates()
    {
        return $this->hasMany(Gpscoordinate::class, 'b_survey_id', 'id');
    }
}
