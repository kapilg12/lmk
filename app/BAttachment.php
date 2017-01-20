<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BAttachment extends Model
{
    protected $table = 'b_attachments';
    protected $fillable = ['id', 'user_id', 'a_survey_id', 'b_survey_id', 'image_path', 'slug', 'comment', 'is_active', 'created_at', 'updated_at'];

}
