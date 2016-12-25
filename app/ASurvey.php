<?php

namespace App;

use App\BSgWater;
use App\BSurvey;
use App\Gpscoordinate;
use Illuminate\Database\Eloquent\Model;

class ASurvey extends Model
{
    protected $table = 'a_surveys';
    protected $fillable = ['user_id', 'torrent_id', 'office_id', 'allow_area', 'establishment_name', 'postel_address', 'pin_code', 'nature_of_establishment', 'contact_person_name', 'designation', 'contact_number', 'email', 'website', 'is_active', 'is_approved', 'is_completed', 'is_certified', 'created_at', 'updated_at'];

    public function users()
    {
        //return $this->belongsTo('App\User', 'user_id');
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function offices()
    {
        //return $this->belongsTo('App\Office', 'office_id');
        return $this->belongsTo(Office::class, 'office_id', 'id');
    }
    /*public function ASurvey()
    {
    return $this->hasManyThrough('App\ASurvey');
    }*/
    public function bsurveys()
    {
        return $this->hasMany(BSurvey::class, 'a_survey_id', 'id');
    }
    public function bsgwater()
    {
        return $this->hasMany(BSgWater::class, 'a_survey_id', 'id');
    }
    public function gpscoordinate()
    {
        return $this->hasMany(Gpscoordinate::class, 'a_survey_id', 'id');
    }

    /*public function torrents()
{
return $this->belongsTo('App\User', 'torrent_id');
}
public function offices()
{
return $this->belongsTo('App\Office', 'office_id');
}*/
}
