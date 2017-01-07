<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','options'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'options' => 'array',
    ];
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function(Builder $builder) {
            $builder->where('is_active', 1);            
        });
        /*static::addGlobalScope('mainUser', function(Builder $builder) {
            $builder->where('email', '!=' ,'kapilvermasgnr@gmail.com');           
        });*/
        
    }

    public function ASurveys()
    {
        return $this->hasMany('App\ASurvey');
    }
}
