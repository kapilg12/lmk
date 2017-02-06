<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BAttachment extends Model
{
    protected $table = 'b_attachments';
    protected $fillable = ['id', 'user_id', 'a_survey_id', 'b_survey_id', 'image_path', 'slug', 'user_slug', 'comment', 'is_active', 'created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function(Builder $builder) {
            $builder->where('is_active', 1);            
        });        
    }

}
