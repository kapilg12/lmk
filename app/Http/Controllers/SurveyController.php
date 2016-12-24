<?php

namespace App\Http\Controllers;

use App\ASurvey;
use App\Http\Controllers\Controller;
use App\Office;
use Illuminate\Http\Request;
use Session;

//use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    protected $lastStep = 4;

    public function getSurvey()
    {
        $Office = Office::where('is_active', true)->orderBy('office_name')->pluck('office_name', 'id');
        $Office->prepend('Please Select Industrial Area', '');
        return view('survey.index', compact('id', 'Office'));
    }
    public function postSurvey(Request $request)
    {
        /*$Office = Office::where('is_active', true)->orderBy('office_name')->pluck('office_name', 'id');
        $Office->prepend('Please Select Industrial Area', '');
        $ASurvey = new ASurvey;
        $validator = Validator::make($request->all(), $ASurvey->rules);
        if ($validator->fails()) {
        return view('survey.index', compact('id', 'Office'))->withErrors($validator);
        }*/
        $input = $request->all();
        $ASurvey = ASurvey::create($input);
        $a_survey_id = $ASurvey['id'];
        Session::put('a_survey_id', $a_survey_id);

        return redirect()->action('SurveyController@getSurveyStep', ['step' => 2]);
    }

    public function getSurveyStep(Request $request, $step)
    {
        $a_survey_id = Session::get('a_survey_id');
        return view('survey.step_' . $step, ['a_survey_id' => $a_survey_id]);
        //return view('survey.step_' . $step);
    }
    public function postSurveyStep(Request $request, $step)
    {
        /*switch ($step) {
        case 2:
        $rules = ['name' => 'required|min:2|max:50'];
        break;
        case 3:
        $rules = ['color' => 'required|min:3'];
        break;
        case 4:
        $rules = ['pet' => 'required|in:Cats,Dogs'];
        break;
        default:
        abort(400, "No rules for this step!");
        }

        $this->validate($request, $rules);*/

        //$request->session()->get('survey')->update($request->all());
        if ($step == $this->lastStep) {
            return redirect()->action('SurveyController@getSurveyDone');
        }

        return redirect()->action('SurveyController@getSurveyStep', ['step' => $step + 1]);
    }
    public function getSurveyDone()
    {
        return '<h1>Thanks! You have completed the survey</h1>';
    }
}
