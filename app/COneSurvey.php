<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class COneSurvey extends Model
{
    protected $table = 'c_one_surveys';
    protected $fillable = ['id', 'a_survey_id', 'details_of_water_requirement', 'requirement_CGWA_permission', 'existing_requirement', 'no_of_operational_day', 'annual_requirement', 'created_at', 'updated_at',"is_active"];

    
protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function(Builder $builder) {
            $builder->where('is_active', 1);            
        });        
    }
}
