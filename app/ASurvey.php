<?php

namespace App;

use App\BSgWater;
use Illuminate\Database\Eloquent\Model;

class ASurvey extends Model
{
    protected $casts = [
        'is_active' => 'boolean',
    ];
    protected $table = 'a_surveys';
    protected $fillable = ['user_id', 'torrent_id', 'office_id', 'allow_area', 'establishment_name', 'postel_address', 'pin_code', 'nature_of_establishment', 'contact_person_name', 'designation', 'contact_number', 'email', 'website', 'is_active', 'is_approved', 'is_completed', 'is_certified', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function offices()
    {
        return $this->belongsTo('App\Office', 'office_id', 'id');
    }

    public function bsurveys()
    {
        return $this->hasOne('App\BSurvey', 'a_survey_id', 'id');
    }
    public function bsgwater()
    {
        return $this->hasOne('App\BSgWater', 'a_survey_id', 'id');
    }
    public function gpscoordinates()
    {
        return $this->hasMany('App\Gpscoordinate', 'a_survey_id', 'id');
    }

}
