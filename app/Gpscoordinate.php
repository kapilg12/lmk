<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Gpscoordinate extends Model
{
    protected $table = 'gpscoordinates';
    protected $fillable = ['id', 'a_survey_id', 'b_survey_id', 'GPSCoordinate_area', 'GPSCoordinate_type', 'GPSCoordinate_point', 'GPSCoordinate_latitude', 'GPSCoordinate_longitude', 'created_at', 'updated_at',"is_active"];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function(Builder $builder) {
            $builder->where('is_active', 1);            
        });        
    }
}
