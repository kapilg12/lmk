<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function(Builder $builder) {
            $builder->where('is_active', 1);
        });
    }
}
