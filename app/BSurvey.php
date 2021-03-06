<?php

namespace App;

use App\BSgWater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BSurvey extends Model
{
    protected $table = 'b_surveys';
    protected $fillable = ['id', 'a_survey_id', 'total_land_area', 'roof_top_area', 'road_paved_area', 'green_belt_area', 'open_land', 'average_annual_rainfall', 'number_of_rainy_day', 'nature_of_aquifer', 'nature_of_terrain', 'nature_of_soil', 'recharge_well_depth', 'recharge_well_diameter', 'recharge_pit_depth', 'recharge_pit_diameter', 'recharge_trenches_l ', 'recharge_trenches_w', 'recharge_trenches_d', 'water_bodies_ponds_depth', 'water_bodies_ponds_diameter', 'source_of_availability_of_surface_water', 'water_supply_from_RIICO', 'created_at', 'updated_at',"GPSCoordinate_waypoint_plot","GPSCoordinate_waypoint_tubewell"];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function(Builder $builder) {
            $builder->where('is_active', 1);            
        });        
    }

    public function surveys()
    {
        return $this->belongsTo('App\ASurvey', 'a_survey_id');
    }

    public function bsgwater()
    {
        return $this->hasMany('App\BSgWater', 'b_survey_id', 'id');
    }

    public function gpscoordinates()
    {
        return $this->hasMany('App\Gpscoordinate', 'b_survey_id', 'id');
    }
    public function attachments()
    {
        return $this->hasMany('App\BAttachment', 'a_survey_id', 'id');
    }
    public function conesurveys()
    {
        return $this->hasMany('App\COneSurvey', 'b_survey_id', 'id');
    }
    public function ctwosurveys()
    {
        return $this->hasMany('App\CTwoSurvey', 'b_survey_id', 'id');
    }
}
