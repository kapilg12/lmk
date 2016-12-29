<?php

namespace App\Http\Controllers;

use App\ASurvey;
use App\BSurvey;
use App\Http\Controllers\Controller;
use App\Office;
use Auth;
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
        //$ASurvey = ASurvey::create($input);
        //$a_survey_id = $ASurvey['id'];
        //Session::put('a_survey_id', $a_survey_id);

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
        return view('survey.success');
    }
    public function getDashboard(Request $request)
    {
        $user = Auth::user();
        //echo $user->hasRole('superadmin');die;
        //$user_role = "superadmin";
        if ($user->hasRole('superadmin') == 1) {
            $user_role = 'superadmin';
        } else if ($user->hasRole('torrent') == 1) {
            $user_role = 'torrent';
        } else {
            $user_role = 'rm';
        }

        if ($user->hasRole('torrent') == 1) {
            $torrent_id = 2;
            $ASurveys = ASurvey::with('offices')
                ->with('bsurveys')
                ->where('torrent_id', $torrent_id)
                ->where('is_active', 1)
                ->orderBy('id', 'DESC')
                ->paginate(5)->all();
            //echo "<pre>";
            //print_r($ASurveys);
            // dd($ASurveys[0]['bsurveys']->id);
            return view('survey.dashboard', compact('ASurveys', 'user_role'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
        } else {
            $ASurveys = ASurvey::with('offices')->orderBy('id', 'DESC')->paginate(5);
            return view('survey.dashboard', compact('ASurveys', 'user_role'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
        }

    }
    public function show($id)
    {
        $user = Auth::user();
        if ($user->hasRole('superadmin') == 1) {
            $user_role = 'superadmin';
        } else if ($user->hasRole('torrent') == 1) {
            $user_role = 'torrent';
        } else {
            $user_role = 'rm';
        }
        if ($user_role == 'superadmin') {
            $ASurveys = ASurvey::with('offices')
                ->with('bsurveys')
                ->with('bsgwater')
                ->with('gpscoordinates')
                ->with('attachments')
                ->with('conesurveys')
                ->with('ctwosurveys')
                ->find($id);
        } else if ($user_role == 'rm') {
            $ASurveys = ASurvey::find($id);
        } else if ($user_role == 'torrent') {
            $ASurveys = BSurvey::with('bsgwater')
                ->with('gpscoordinates')
                ->find($id);
            //$ASurveys = BSurvey::with('bsgwater, gpscoordinates')->where('a_survey_id', $id)->get();
        }
        return view('survey.show', compact('ASurveys', 'user_role'));
        //$ASurvey = ASurvey::with('bsurveys')->where('user_id', 1)->get();

    }

}
