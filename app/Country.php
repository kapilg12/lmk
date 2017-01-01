<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Country extends Model
{
    protected $fillable = [
        'title', 'description'
    ];
    public function states()
    {
    	return $this->hasMany('App\State');
    }
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function(Builder $builder) {
            $builder->where('is_active', 1);
        });
    }
}
