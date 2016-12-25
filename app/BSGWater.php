<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BSgWater extends Model
{
    //
    public function sgwater()
    {
        return $this->belongsTo('App\ASurvey', 'b_survey_id');
    }
}
