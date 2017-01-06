<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gpscoordinate extends Model
{
    protected $table = 'gpscoordinates';
    protected $fillable = ['id', 'a_survey_id', 'b_survey_id', 'GPSCoordinate_area', 'GPSCoordinate_type', 'GPSCoordinate_point', 'GPSCoordinate_latitude', 'GPSCoordinate_longitude', 'created_at', 'updated_at'];
}
