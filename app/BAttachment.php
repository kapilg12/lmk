<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BAttachment extends Model
{
    protected $table = 'b_attachments';
    protected $fillable = ['id', 'user_id', 'a_survey_id', 'b_survey_id', 'area_location', 'sources_sw_gw', 'existing_rwh_structure', 'site_layout_plan', 'attachgpxfile', 'created_at', 'updated_at'];
}
