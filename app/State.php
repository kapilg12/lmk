<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function countries()
    {
    	return $this->belongsTo('App\Country','country_id');
    }
    public function offices()
    {
    	return $this->hasMany('App\Office');
    }
}
