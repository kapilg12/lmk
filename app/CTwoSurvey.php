<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CTwoSurvey extends Model
{
    protected $table = 'c_two_surveys';
    protected $fillable = ['id', 'a_survey_id', 'breakup_of_recycled_water_usage', 'cum_day', 'cum_year', 'created_at', 'updated_at',"is_active"];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function(Builder $builder) {
            $builder->where('is_active', 1);            
        });        
    }
}
