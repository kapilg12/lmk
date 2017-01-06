<?php

namespace App\Http\Controllers;

use App\ASurvey;
use App\BSgWater;
use App\BSurvey;
use App\COneSurvey;
use App\CTwoSurvey;
use App\Gpscoordinate;
use App\Http\Controllers\Controller;
use App\Office;
use Auth;
use Illuminate\Http\Request;
use Input;
use JsValidator;
use Redirect;
use Session;
use Validator;

class SurveyController extends Controller
{
    protected $lastStep = 4;
    /**
     * Define your validation rules in a property in
     * the controller to reuse the rules.
     */
    protected $ASurveyValidationRules = [
        'office_id' => 'required',
        'allow_area' => 'required|numeric',
        'establishment_name' => 'required',
        'postel_address' => 'required',
        'pin_code' => 'required|digits_between:6,8',
        'nature_of_establishment' => 'required',
        'contact_person_name' => 'required|alpha',
        'designation' => 'required|alpha',
        'contact_number' => 'required|digits_between:7,10',
        'email' => 'required|email',
        'website' => 'required|url',
    ];
    protected $ASurveyMessages = [
        'office_id.required' => 'Select your Industrial Area.',
    ];
    protected $BSurveyValidationRules = [
        'total_land_area' => 'required|numeric',
        'roof_top_area' => 'required|numeric',
        'road_paved_area' => 'required|numeric',
        'green_belt_area' => 'required|numeric',
        'open_land' => 'required|numeric',
        'GPSCoordinate_area' => 'required',
        'GPSCoordinate_latitude["A"]' => 'required',
    ];

    public function getSurvey()
    {
        $Office = Office::where('is_active', true)->orderBy('office_name')->pluck('office_name', 'id');
        $Office->prepend('Please Select Industrial Area', '');
        $ASurveyValidationRules = JsValidator::make($this->ASurveyValidationRules, $this->ASurveyMessages);
        return view('survey.index', compact('id', 'Office'))->with(['ASurveyValidationRules' => $ASurveyValidationRules]);
    }
    public function postSurvey(Request $request)
    {
        $input = $request->all();
        $v = Validator::make($input, $this->ASurveyValidationRules);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }

        //$ASurvey = ASurvey::create($input);
        //$a_survey_id = $ASurvey['id'];
        //Session::put('a_survey_id', $a_survey_id);
        //return redirect()->action('SurveyController@getSurveyStep', ['step' => 2]);
    }

    public function getSurveyStep(Request $request, $step)
    {
        $BSurveyValidationRules = '';
        switch ($step) {
            case 2:
                $BSurveyValidationRules = JsValidator::make($this->BSurveyValidationRules);
                break;
        }
        $a_survey_id = Session::get('a_survey_id');
        return view('survey.step_' . $step, ['a_survey_id' => $a_survey_id])->with(['BSurveyValidationRules' => $BSurveyValidationRules]);

    }
    public function postSurveyStep(Request $request, $step)
    {

        //$this->validate($request, $rules);
        $a_survey_id = Session::get('a_survey_id');
        //$a_survey_id = 1;
        //$b_survey_id = 4;
        $input = $request->all();
        switch ($step) {
            case 2:
                $v = Validator::make($input, $this->BSurveyValidationRules);
                if ($v->fails()) {
                    return redirect()->back()->withErrors($v->errors());
                }
                $BSurvey['a_survey_id'] = 1;
                $BSurvey['total_land_area'] = $input['total_land_area'];
                $BSurvey['total_land_area'] = $input['total_land_area'];
                $BSurvey['roof_top_area'] = $input['roof_top_area'];
                $BSurvey['road_paved_area'] = $input['road_paved_area'];
                $BSurvey['green_belt_area'] = $input['green_belt_area'];
                $BSurvey['open_land'] = $input['open_land'];
                $BSurvey['average_annual_rainfall'] = $input['average_annual_rainfall'];
                $BSurvey['number_of_rainy_day'] = $input['number_of_rainy_day'];
                $BSurvey['nature_of_aquifer'] = $input['nature_of_aquifer'];
                $BSurvey['nature_of_terrain'] = $input['nature_of_terrain'];
                $BSurvey['nature_of_soil'] = $input['nature_of_soil'];
                $BSurvey['recharge_well_depth'] = $input['recharge_well_depth'];
                $BSurvey['recharge_well_diameter'] = $input['recharge_well_diameter'];
                $BSurvey['recharge_pit_depth'] = $input['recharge_pit_depth'];
                $BSurvey['recharge_pit_diameter'] = $input['recharge_pit_diameter'];
                $BSurvey['recharge_trenches_l'] = $input['recharge_trenches_l'];
                $BSurvey['recharge_trenches_w'] = $input['recharge_trenches_w'];
                $BSurvey['recharge_trenches_d'] = $input['recharge_trenches_d'];
                $BSurvey['water_bodies_ponds_depth'] = $input['water_bodies_ponds_depth'];
                $BSurvey['water_bodies_ponds_diameter'] = $input['water_bodies_ponds_diameter'];
                $BSurvey['source_of_availability_of_surface_water'] = $input['source_of_availability_of_surface_water'];
                $BSurvey['water_supply_from_RIICO'] = $input['water_supply_from_RIICO'];
                $BSurvey = BSurvey::create($BSurvey);
                $b_survey_id = $BSurvey['id'];

                $BSgWater = array();
                foreach ($input['tubewell_borewell'] as $key => $value) {
                    $BSgWater[$key]['a_survey_id'] = $a_survey_id;
                    $BSgWater[$key]['b_survey_id'] = $b_survey_id;
                    $BSgWater[$key]['tubewell_borewell'] = $input['tubewell_borewell'][$key];
                    $BSgWater[$key]['depth_of_s_pump'] = $input['depth_of_s_pump'][$key];
                    $BSgWater[$key]['current_water_abstraction'] = $input['current_water_abstraction'][$key];
                    $BSgWater[$key]['created_at'] = date('Y-m-d H:i:s');
                    $BSgWater[$key]['updated_at'] = date('Y-m-d H:i:s');
                }
                BSgWater::insert($BSgWater);
                $Gpscoordinate = array();
                $i = 0;
                foreach ($input['GPSCoordinate_latitude'] as $key => $value) {
                    $Gpscoordinate[$i]['a_survey_id'] = $a_survey_id;
                    $Gpscoordinate[$i]['b_survey_id'] = $b_survey_id;
                    $Gpscoordinate[$i]['GPSCoordinate_area'] = $input['GPSCoordinate_area'];
                    $Gpscoordinate[$i]['GPSCoordinate_type'] = $input['GPSCoordinate_area'];
                    $Gpscoordinate[$i]['GPSCoordinate_point'] = trim($key, '"');
                    $Gpscoordinate[$i]['GPSCoordinate_latitude'] = $input['GPSCoordinate_latitude'][$key];
                    $Gpscoordinate[$i]['GPSCoordinate_longitude'] = $input['GPSCoordinate_longitude'][$key];
                    $Gpscoordinate[$i]['created_at'] = date('Y-m-d H:i:s');
                    $Gpscoordinate[$i]['updated_at'] = date('Y-m-d H:i:s');
                    ++$i;
                }
                Gpscoordinate::insert($Gpscoordinate);
                break;
            case 3:
                //$rules = ['color' => 'required|min:3'];
                $COneSurvey = array();
                foreach ($input['details_of_water_requirement'] as $key => $value) {
                    $COneSurvey[$key]['a_survey_id'] = $a_survey_id;
                    $COneSurvey[$key]['details_of_water_requirement'] = $input['details_of_water_requirement'][$key];
                    $COneSurvey[$key]['requirement_CGWA_permission'] = $input['requirement_CGWA_permission'][$key];
                    $COneSurvey[$key]['existing_requirement'] = $input['existing_requirement'][$key];
                    $COneSurvey[$key]['no_of_operational_day'] = $input['no_of_operational_day'][$key];
                    $COneSurvey[$key]['annual_requirement'] = $input['annual_requirement'][$key];
                    $COneSurvey[$key]['created_at'] = date('Y-m-d H:i:s');
                    $COneSurvey[$key]['updated_at'] = date('Y-m-d H:i:s');
                }
                COneSurvey::insert($COneSurvey);
                break;
            case 4:
                //$rules = ['pet' => 'required|in:Cats,Dogs'];
                // dd($request->all());
                $CTwoSurvey = array();
                foreach ($input['breakup_of_recycled_water_usage'] as $key => $value) {

                    if (!empty($input['breakup_of_recycled_water_usage'][$key]) && !empty($input['cum_day'][$key]) && !empty($input['cum_year'][$key])) {
                        $CTwoSurvey[$key]['a_survey_id'] = $a_survey_id;
                        $CTwoSurvey[$key]['breakup_of_recycled_water_usage'] = $input['breakup_of_recycled_water_usage'][$key];
                        $CTwoSurvey[$key]['cum_day'] = $input['cum_day'][$key];
                        $CTwoSurvey[$key]['cum_year'] = $input['cum_year'][$key];
                        $CTwoSurvey[$key]['created_at'] = date('Y-m-d H:i:s');
                        $CTwoSurvey[$key]['updated_at'] = date('Y-m-d H:i:s');
                    }
                }

                CTwoSurvey::insert($CTwoSurvey);
                break;
            default:
                abort(400, "No rules for this step!");
        }

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
            $ASurveys = ASurvey::with(['bsgwater', 'gpscoordinates', 'bsurveys', 'attachments'])

                ->find($id);
            //$ASurveys = BSurvey::with('bsgwater, gpscoordinates')->where('a_survey_id', $id)->get();
        }
        return view('survey.show', compact('ASurveys', 'user_role'));
        //$ASurvey = ASurvey::with('bsurveys')->where('user_id', 1)->get();

    }

}
