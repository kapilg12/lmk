<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyLog extends Model
{
    public $fillable = ['user_id', 'a_survey_id','is_status','ip_address',"comment"];
}
