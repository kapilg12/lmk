<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BSgWater extends Model
{
    protected $table = 'b_sg_waters';
    protected $fillable = ['id', 'a_survey_id', 'b_survey_id', 'tubewell_borewell', 'depth_of_s_pump', 'current_water_abstraction', 'created_at', 'updated_at'];

    public function sgwater()
    {
        return $this->belongsTo('App\ASurvey', 'b_survey_id');
    }
}
