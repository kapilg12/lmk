<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;
use Illuminate\Database\Eloquent\Builder;

class Permission extends EntrustPermission
{
    public $fillable = ['name', 'display_name', 'description'];
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function(Builder $builder) {
            $builder->where('is_active', 1);
        });
    }
}
