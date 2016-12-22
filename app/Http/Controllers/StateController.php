<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\State;

class StateController extends Controller
{
    public function getStatesList(Request $request)
    {
    	$states = State::where('country_id',$request['country_id'])->lists('title','id');
    	return $states;
    }
}
