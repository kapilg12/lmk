<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ASurvey extends Model
{
    public $rules = [
        'email' => 'required|email',
        'designation' => 'required',
        'website' => 'required',
    ];
    protected $fillable = ['establishment_name', 'email', 'website', 'designation'];
}
