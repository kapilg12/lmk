<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class COneSurvey extends Model
{
    protected $table = 'c_one_surveys';
    protected $fillable = ['id', 'a_survey_id', 'details_of_water_requirement', 'requirement_CGWA_permission', 'existing_requirement', 'no_of_operational_day', 'annual_requirement', 'created_at', 'updated_at'];
}
