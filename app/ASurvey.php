<?php

namespace App;

use App\BSgWater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ASurvey extends Model
{
    protected $casts = [
        'is_active' => 'boolean',
    ];
    protected $table = 'a_surveys';
    protected $fillable = ['user_id', 'torrent_id', 'office_id', 'allow_area', 'establishment_name', 'postel_address', 'pin_code', 'nature_of_establishment', 'contact_person_name', 'designation', 'contact_number', 'email', 'website', 'is_active', 'is_approved', 'is_completed', 'is_certified', 'is_applied', 'created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function(Builder $builder) {
            $builder->where('is_active', 1);            
        });        
    }

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
        return $this->hasMany('App\BSgWater', 'a_survey_id', 'id');
    }
    public function gpscoordinates()
    {
        return $this->hasMany('App\Gpscoordinate', 'a_survey_id', 'id');
    }
    public function attachments()
    {
        return $this->hasMany('App\BAttachment', 'a_survey_id', 'id');
    }
    public function conesurveys()
    {
        return $this->hasMany('App\COneSurvey', 'a_survey_id', 'id');
    }
    public function ctwosurveys()
    {
        return $this->hasMany('App\CTwoSurvey', 'a_survey_id', 'id');
    }

}
