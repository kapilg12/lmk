<?php

namespace App\Http\Controllers;

use App\ASurvey;
use App\BAttachment;
use App\BSgWater;
use App\BSurvey;
use App\COneSurvey;
use App\CTwoSurvey;
use App\Gpscoordinate;
use App\Http\Controllers\Controller;
use App\Office;
use App\SurveyLog;
use App\User;
use Auth;
use Illuminate\Http\Request;
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
        'contact_person_name' => 'required|alpha_spaces',
        'designation' => 'required|alpha_spaces',
        'contact_number' => 'required|digits_between:7,10',
        'email' => 'required|email',
        'is_applied' => 'required',
    ];
    protected $ASurveyMessages = [
        'office_id.required' => 'Select your Industrial Area.',
        'is_applied.required' => 'Please Select At Least One.',
    ];
    protected $BSurveyValidationRules = [
        'total_land_area' => 'required',
        'roof_top_area' => 'required',
        'road_paved_area' => 'required',
        'green_belt_area' => 'required',
        'open_land' => 'required',
        'GPSCoordinate_waypoint_plot' => 'required',
        /*'area_location' => 'mimes:jpeg,jpg,pdf',
    'sources_sw_gw' => 'mimes:jpeg,jpg,pdf',
    'existing_rwh_structure' => 'mimes:jpeg,jpg,pdf,doc,docx',
    'site_layout_plan' => 'mimes:jpeg,jpg,pdf',
    'attachgpxfile' => 'mimes:gpx',*/
    ];

    protected $AttachmentValidationRules = [
        /*'area_location' => 'mimes:jpeg,jpg,pdf',
    'sources_sw_gw' => 'mimes:jpeg,jpg,pdf',
    'existing_rwh_structure' => 'mimes:jpeg,jpg,pdf,doc,docx',
    'site_layout_plan' => 'mimes:jpeg,jpg,pdf',
    'attachgpxfile' => 'mimes:gpx',*/
    ];

    public function getSurvey()
    {
        //$user=User::with('roles')->where();
        /*$users = User::whereHas('roles' , function($q){
        $q->where('name', 'devadmin');
        })->get();
        dd($users);*/
        $ASurveyValidationRules = '';
        $Office = Office::allowedoffices()->orderBy('office_name')->pluck('office_name', 'id');
        $Office->prepend('Please Select Industrial Area', '');
        $ASurveyValidationRules = JsValidator::make($this->ASurveyValidationRules, $this->ASurveyMessages);
        return view('survey.index', compact('id', 'Office'))->with(['ASurveyValidationRules' => $ASurveyValidationRules]);
    }
    public function postSurvey(Request $request)
    {
        $v = '';
        $input = $request->all();
        $v = Validator::make($input, $this->ASurveyValidationRules);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }
        $input['user_id'] = Auth::user()->id;
        //$input['torrent_id'] = 0;
        $input['is_active'] = 1;
        $ASurvey = ASurvey::create($input);
        if ($input['is_applied'] == 0) {
            //$input['is_applied'] = 0;
            //dd($input);

            return redirect()->action('SurveyController@getSurveyNotApplied');
        } else {
            //$input['is_applied'] = '1';
            //$ASurvey = ASurvey::create($input);
            $a_survey_id = $ASurvey['id'];
            Session::put('a_survey_id', $a_survey_id);
            return redirect()->action('SurveyController@getSurveyStep', ['step' => 2]);
        }

    }

    public function getSurveyStep(Request $request, $step)
    {
        if ($request->session()->has('a_survey_id')) {
            $BSurveyValidationRules = '';
            switch ($step) {
                case 2:
                    $BSurveyValidationRules = JsValidator::make($this->BSurveyValidationRules);
                    break;
            }
            $Gps = array(
                array('aName' => 'Shed', 'aValue' => 'shad', 'dAttr' => '1'),
                array('aName' => 'Building', 'aValue' => 'building', 'dAttr' => '4'),
                array('aName' => 'Tubewell', 'aValue' => 'tubewell', 'dAttr' => '4'),
            );
            $a_survey_id = Session::get('a_survey_id');
            //$a_survey_id = 1;
            return view('survey.step_' . $step, ['a_survey_id' => $a_survey_id, 'listData' => $Gps])->with(['BSurveyValidationRules' => $BSurveyValidationRules]);
        } else {
            return redirect('/audit');
        }

    }
    public function postSurveyStep(Request $request, $step)
    {
        $v = '';
        //$this->validate($request, $rules);
        $a_survey_id = Session::get('a_survey_id');
        $input = $request->all();
        $user = Auth::user();

        switch ($step) {
            case 2:
                $v = Validator::make($input, $this->BSurveyValidationRules);
                if ($v->fails()) {
                    return redirect()->back()->withErrors($v->errors());
                }
                $BSurvey['a_survey_id'] = $a_survey_id;
                $BSurvey['total_land_area'] = $input['total_land_area'];
                $BSurvey['total_land_area'] = $input['total_land_area'];
                $BSurvey['roof_top_area'] = $input['roof_top_area'];
                $BSurvey['road_paved_area'] = $input['road_paved_area'];
                $BSurvey['green_belt_area'] = $input['green_belt_area'];
                $BSurvey['open_land'] = $input['open_land'];
                if (isset($input['GPSCoordinate_waypoint_plot']) && !empty($input['GPSCoordinate_waypoint_plot'])) {
                    $BSurvey['GPSCoordinate_waypoint_plot'] = $input['GPSCoordinate_waypoint_plot'];
                }
                if (isset($input['GPSCoordinate_waypoint_tubewell']) && !empty($input['GPSCoordinate_waypoint_tubewell'])) {
                    $BSurvey['GPSCoordinate_waypoint_tubewell'] = $input['GPSCoordinate_waypoint_tubewell'];
                }
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

                $BSurvey['water_supply_from_RIICO'] = '';
                $BSurvey = BSurvey::create($BSurvey);
                $b_survey_id = $BSurvey['id'];
                //$b_survey_id = 9;

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
                $GpscoordinatePlot = array();
                $GpscoordinateTubewell = array();
                $i = 0;
                $t = 0;
                if (isset($input['GPSCoordinate_waypoint_plot']) && !empty($input['GPSCoordinate_waypoint_plot'])) {
                    $GPSCoordinateWaypointPlotArr = explode(',', $input['GPSCoordinate_waypoint_plot']);
                    if (is_array($GPSCoordinateWaypointPlotArr)) {
                        foreach ($GPSCoordinateWaypointPlotArr as $GPSCoordinateWaypoint) {
                            $GpscoordinatePlot[$i]['a_survey_id'] = $a_survey_id;
                            $GpscoordinatePlot[$i]['b_survey_id'] = $b_survey_id;
                            $GpscoordinatePlot[$i]['GPSCoordinate_area'] = 'Plot';
                            $GpscoordinatePlot[$i]['GPSCoordinate_type'] = 'Plot';
                            $GpscoordinatePlot[$i]['GPSCoordinate_point'] = $GPSCoordinateWaypoint;
                            $GpscoordinatePlot[$i]['GPSCoordinate_latitude'] = '0';
                            $GpscoordinatePlot[$i]['GPSCoordinate_longitude'] = '0';
                            $GpscoordinatePlot[$i]['gpxfile'] = '';
                            $GpscoordinatePlot[$i]['comment'] = $input['GPSCoordinate_comment'];
                            $GpscoordinatePlot[$i]['created_at'] = date('Y-m-d H:i:s');
                            $GpscoordinatePlot[$i]['updated_at'] = date('Y-m-d H:i:s');
                            ++$i;
                        }
                    }
                }
                $GPSCoordinateWaypointTubewellArr = array();
                if (isset($input['GPSCoordinate_waypoint_tubewell']) && !empty($input['GPSCoordinate_waypoint_tubewell'])) {
                    $GPSCoordinateWaypointTubewellArr = explode(',', $input['GPSCoordinate_waypoint_tubewell']);
                    if (is_array($GPSCoordinateWaypointTubewellArr)) {
                        foreach ($GPSCoordinateWaypointTubewellArr as $GPSCoordinateWaypoint) {
                            $GpscoordinateTubewell[$t]['a_survey_id'] = $a_survey_id;
                            $GpscoordinateTubewell[$t]['b_survey_id'] = $b_survey_id;
                            $GpscoordinateTubewell[$t]['GPSCoordinate_area'] = 'Tubewell';
                            $GpscoordinateTubewell[$t]['GPSCoordinate_type'] = 'Tubewell';
                            $GpscoordinateTubewell[$t]['GPSCoordinate_point'] = $GPSCoordinateWaypoint;
                            $GpscoordinateTubewell[$t]['GPSCoordinate_latitude'] = '0';
                            $GpscoordinateTubewell[$t]['GPSCoordinate_longitude'] = '0';
                            $GpscoordinateTubewell[$t]['gpxfile'] = '';
                            $GpscoordinateTubewell[$t]['comment'] = $input['GPSCoordinate_comment'];
                            $GpscoordinateTubewell[$t]['created_at'] = date('Y-m-d H:i:s');
                            $GpscoordinateTubewell[$t]['updated_at'] = date('Y-m-d H:i:s');
                            ++$t;
                        }
                    }
                } else {
                    $GpscoordinateTubewell = array();
                }

                $GPSCoordinateWaypointArr = array_merge($GPSCoordinateWaypointPlotArr, $GPSCoordinateWaypointTubewellArr);
                $Gpscoordinate = array_merge($GpscoordinatePlot, $GpscoordinateTubewell);
                Gpscoordinate::insert($Gpscoordinate);

                // getting all of the post data

                $finalFileUploadArr = array();
                $WaterSupplyFromRIICOBillArr = array();
                $AreaLocationArr = array();
                $SourcesSWGWArr = array();
                $ExistingRWHStructureArr = array();
                $SiteLayoutPlanArr = array();
                $GPXFileArr = array();

                // checking file is valid.
                //dd($input);
                if (isset($input['WaterSupplyFromRIICOBill']) && !empty($input['WaterSupplyFromRIICOBill']) && !is_null($input['WaterSupplyFromRIICOBill'][0])) {
                    $WaterSupplyFromRIICOBillArr = $this->multipleUpload($input['WaterSupplyFromRIICOBill'], 'WaterSupplyFromRIICOBill', $a_survey_id, $b_survey_id, $user['id']);
                }

                if (isset($input['area_location']) && !empty($input['area_location']) && !is_null($input['area_location'][0])) {
                    $AreaLocationArr = $this->multipleUpload($input['area_location'], 'area_location', $a_survey_id, $b_survey_id, $user['id']);
                }
                if (isset($input['sources_sw_gw']) && !empty($input['sources_sw_gw']) && !is_null($input['sources_sw_gw'][0])) {
                    $SourcesSWGWArr = $this->multipleUpload($input['sources_sw_gw'], 'sources_sw_gw', $a_survey_id, $b_survey_id, $user['id']);
                }
                if (isset($input['existing_rwh_structure']) && !empty($input['existing_rwh_structure']) && !is_null($input['existing_rwh_structure'][0])) {
                    $ExistingRWHStructureArr = $this->multipleUpload($input['existing_rwh_structure'], 'existing_rwh_structure', $a_survey_id, $b_survey_id, $user['id']);
                }
                if (isset($input['site_layout_plan']) && !empty($input['site_layout_plan']) && !is_null($input['site_layout_plan'][0])) {
                    $SiteLayoutPlanArr = $this->multipleUpload($input['site_layout_plan'], 'site_layout_plan', $a_survey_id, $b_survey_id, $user['id']);
                }
                $finalFileUploadArr = array_merge($WaterSupplyFromRIICOBillArr, $AreaLocationArr, $SourcesSWGWArr, $ExistingRWHStructureArr, $SiteLayoutPlanArr);
                if (!empty($finalFileUploadArr)) {
                    BAttachment::insert($finalFileUploadArr);
                }

                if (isset($input['attachgpxfile']) && !empty($input['attachgpxfile'])) {
                    $this->singleUpload($input['attachgpxfile'], 'gpxfile', $a_survey_id, $b_survey_id, $user['id'], $GPSCoordinateWaypointArr);
                    //$GPXFileArr = $this->singleUpload($input['attachgpxfile'], 'gpxfile', $a_survey_id, $b_survey_id, $user['id'], $GPSCoordinateWaypointArr);

                    //dd($GPXFileArr);
                    //BAttachment::create($GPXFileArr);
                }
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
    public function getSurveyNotApplied()
    {
        return view('survey.not_appled');
    }

    public function getDashboard(Request $request)
    {
        $users = User::whereHas("roles", function ($q) {
            $q->where("name", "torrentadmin");
        })->lists("id", "name");

        $architects = User::whereHas("roles", function ($q) {
            $q->where("name", "architect");
        })->lists("id", "name");
        $i = 0;
        if (Auth::user()->hasRole('torrentadmin')) {
            $ASurveys = ASurvey::with('offices')
                ->where('torrent_id', Auth::user()->id)
                ->orderBy('id', 'DESC')->get();
            return view('survey.dashboard_torrent', compact('ASurveys', 'i'));
        } else {

            if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('devadmin')) {
                $ASurveys = ASurvey::with('offices')->orderBy('id', 'DESC')->get();
                return view('survey.dashboard_superadmin', compact('ASurveys', 'i', "users","architects"));
            } else if (Auth::user()->hasRole('rm')) {
                $ASurveys = ASurvey::with('offices')->orderBy('id', 'DESC')->get();
                return view('survey.dashboard_rm', compact('ASurveys', 'i'));
            } else {
                $ASurveys = ASurvey::with('offices')
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('id', 'DESC')->get();
                return view('survey.dashboard', compact('ASurveys', 'i'));
            }
        }
    }
    public function show($id)
    {
        $attachmentsValidationRules = '';
        $attachmentsValidationRules = JsValidator::make($this->AttachmentValidationRules);
        $user = Auth::user();
        if ($user->hasRole('superadmin') == 1) {
            $user_role = 'superadmin';
        } else if ($user->hasRole('torrentadmin') == 1) {
            $user_role = 'torrentadmin';
        } else if ($user->hasRole('rm') == 1) {
            $user_role = 'rm';
        } else {
            $user_role = 'visitor';
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
            $AttacmentArr = BAttachment::where('a_survey_id', $id)->get();    
        }else if ($user_role == 'visitor') {
            $ASurveys = ASurvey::with('offices')
                ->with('bsurveys')
                ->with('bsgwater')
                ->with('gpscoordinates')
                ->with('attachments')
                ->with('conesurveys')
                ->with('ctwosurveys')
                ->find($id);
            $AttacmentArr = BAttachment::where('a_survey_id', $id)
                                ->where('user_slug', '=', 'au')
                                ->get();        
        } else if ($user_role == 'torrentadmin') {
            $ASurveys = ASurvey::with(['bsgwater', 'gpscoordinates', 'bsurveys', 'attachments'])
                ->find($id);
            $AttacmentArr = BAttachment::where('a_survey_id', $id)
            ->where(function($query) {
                return $query->orWhere('user_slug', '=', 'au')->orWhere('user_slug', '=', 'ta');
            })->get();     
        } else if ($user_role == 'rm') {

            $ASurveys = ASurvey::find($id);
            $AttacmentArr = BAttachment::where('a_survey_id', $id)
            ->where(function($query) {
                return $query->orWhere('user_slug', '=', 'sa')->orWhere('user_slug', '=', 'ta');
            })->get();        
        }

        $GPSCoordinate_points = '';
        if (isset($ASurveys->bsurveys->GPSCoordinate_waypoint_plot)) {
            $GPSCoordinate_points .= $ASurveys->bsurveys->GPSCoordinate_waypoint_plot;
        }
        if (isset($ASurveys->bsurveys->GPSCoordinate_waypoint_tubewell)) {
            $GPSCoordinate_points .= ',' . $ASurveys->bsurveys->GPSCoordinate_waypoint_tubewell;
        }
        if ($user_role == 'superadmin') {
            if (isset($ASurveys->bsurveys) && count($ASurveys->bsurveys) > 0) {
                return view('survey.show_superadmin', compact('ASurveys', 'user_role', 'AttacmentArr'))->with(['attachmentsValidationRules' => $attachmentsValidationRules, 'GPSCoordinate_points' => trim($GPSCoordinate_points, ',')]);
            } else {
                return view('errors.audit_not_completed');
            }
        } else if ($user_role == 'torrentadmin') {
            if (isset($ASurveys->bsurveys) && count($ASurveys->bsurveys) > 0) {
                return view('survey.show_torrent', compact('ASurveys', 'user_role', 'AttacmentArr'))->with(['attachmentsValidationRules' => $attachmentsValidationRules, 'GPSCoordinate_points' => trim($GPSCoordinate_points, ',')]);
            } else {
                return view('errors.audit_not_completed');
            }
        } else if ($user_role == 'rm') {
            return view('survey.show_rm', compact('ASurveys', 'user_role', 'AttacmentArr'));
        } else {
            if (isset($ASurveys->bsurveys) && count($ASurveys->bsurveys) > 0) {
                return view('survey.show', compact('ASurveys', 'user_role', 'AttacmentArr'))->with(['attachmentsValidationRules' => $attachmentsValidationRules, 'GPSCoordinate_points' => trim($GPSCoordinate_points, ',')]);
            } else {
                return view('errors.audit_not_completed');
            }
        }

    }

    public function postShow(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        // getting all of the post data
        $attachmentArr = array();
        $attachmentArr['user_id'] = $user['id'];
        //$attachmentArr['user_id'] = 2;
        $a_survey_id = $input['a_survey_id'];
        $b_survey_id = $input['b_survey_id'];
        // checking file is valid.
        $finalFileUploadArr = array();
        $WaterSupplyFromRIICOBillArr = array();
        $AreaLocationArr = array();
        $SourcesSWGWArr = array();
        $ExistingRWHStructureArr = array();
        $SiteLayoutPlanArr = array();
        $GPXFileArr = array();
        if (isset($input['WaterSupplyFromRIICOBill']) && !empty($input['WaterSupplyFromRIICOBill']) && !is_null($input['WaterSupplyFromRIICOBill'][0])) {
            $WaterSupplyFromRIICOBillArr = $this->multipleUpload($input['WaterSupplyFromRIICOBill'], 'WaterSupplyFromRIICOBill', $a_survey_id, $b_survey_id, $user['id']);
        }

        if (isset($input['area_location']) && !empty($input['area_location']) && !is_null($input['area_location'][0])) {
            $AreaLocationArr = $this->multipleUpload($input['area_location'], 'area_location', $a_survey_id, $b_survey_id, $user['id']);
        }
        if (isset($input['sources_sw_gw']) && !empty($input['sources_sw_gw']) && !is_null($input['sources_sw_gw'][0])) {
            $SourcesSWGWArr = $this->multipleUpload($input['sources_sw_gw'], 'sources_sw_gw', $a_survey_id, $b_survey_id, $user['id']);
        }
        if (isset($input['existing_rwh_structure']) && !empty($input['existing_rwh_structure']) && !is_null($input['existing_rwh_structure'][0])) {
            $ExistingRWHStructureArr = $this->multipleUpload($input['existing_rwh_structure'], 'existing_rwh_structure', $a_survey_id, $b_survey_id, $user['id']);
        }
        if (isset($input['site_layout_plan']) && !empty($input['site_layout_plan']) && !is_null($input['site_layout_plan'][0])) {
            $SiteLayoutPlanArr = $this->multipleUpload($input['site_layout_plan'], 'site_layout_plan', $a_survey_id, $b_survey_id, $user['id']);
        }
        $finalFileUploadArr = array_merge($WaterSupplyFromRIICOBillArr, $AreaLocationArr, $SourcesSWGWArr, $ExistingRWHStructureArr, $SiteLayoutPlanArr);
        if (!empty($finalFileUploadArr)) {
            BAttachment::insert($finalFileUploadArr);
        }
        $GPSCoordinateWaypointArr = array();
        if (isset($input['GPSCoordinate_points']) && !empty($input['GPSCoordinate_points'])) {
            $GPSCoordinateWaypointArr = explode(',', $input['GPSCoordinate_points']);
        }
        if (isset($input['attachgpxfile']) && !empty($input['attachgpxfile'])) {
            $this->singleUpload($input['attachgpxfile'], 'gpxfile', $a_survey_id, $b_survey_id, $user['id'], $GPSCoordinateWaypointArr);
            //$GPXFileArr = $this->singleUpload($input['attachgpxfile'], 'gpxfile', $a_survey_id, $b_survey_id, $user['id'], $GPSCoordinateWaypointArr);
            //BAttachment::create($GPXFileArr);
        }
        return redirect('/audit/show/' . $a_survey_id);
       
    }

    public function changeStatus(Request $request)
    {
        if (!empty($request['changeVar'])) {
            $ASurveys = ASurvey::find($request['changeVal']);
            $SurveyLogArray = array(
                'user_id' => Auth::user()->id,
                'a_survey_id' => $ASurveys->id,
                'ip_address' => $_SERVER['REMOTE_ADDR'],
            );
            switch ($request['changeVar']) {
                case 'active':
                    $ASurveys->is_active = 1;
                    $ASurveys->save();
                    //$SurveyLogArray['is_status'] = 'active';
                    //SurveyLog::create($SurveyLogArray);
                    $this->auditLog($ASurveys->id, 'active', 'Audit Active.');
                    break;
                case 'approve':
                    $ASurveys->is_approved = 1;
                    $ASurveys->save();
                    $SurveyLogArray['is_status'] = 'approved';
                    //SurveyLog::create($SurveyLogArray,);
                    $this->auditLog($ASurveys->id, 'approved', 'Audit approved.');
                    break;
                case 'completed':
                    $ASurveys->is_completed = 1;
                    $ASurveys->save();
                    $SurveyLogArray['is_status'] = 'completed';
                    //SurveyLog::create($SurveyLogArray);
                    $this->auditLog($ASurveys->id, 'completed', 'Audit completed.');
                    break;
                case 'certified':
                    $ASurveys->is_certified = 1;
                    $ASurveys->save();
                    $SurveyLogArray['is_status'] = 'certified';
                    //SurveyLog::create($SurveyLogArray);
                    $this->auditLog($ASurveys->id, 'certified', 'Audit certified.');
                    break;
            }
            return view('layouts.partial.access_nav', compact('ASurveys'));
        }
    }
    

    /**
     * Edit the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ASurvey = ASurvey::find($id);
        $Office = Office::where('is_active', true)->orderBy('office_name')->pluck('office_name', 'id');
        return view('survey.edit', compact('ASurvey', 'Office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();
        $ASurvey = ASurvey::find($input['id']);
        $ASurvey->update($input);
        $a_survey_id = $ASurvey['id'];
        Session::put('a_survey_id', $a_survey_id);
        //return redirect()->action('SurveyController@getSurveyStepEdit', ['step' => 2]);
        return redirect("/audit/editstep/2");
    }

    public function getSurveyStepEdit(Request $request, $step)
    {
        $id = Session::get('a_survey_id');
        $user = Auth::user();
        if ($user->hasRole('superadmin') == 1) {
            $user_role = 'superadmin';
        } else if ($user->hasRole('torrentadmin') == 1) {
            $user_role = 'torrentadmin';
        } else {
            $user_role = 'rm';
        }

        if ($request->session()->has('a_survey_id')) {
            $BSurveyValidationRules = '';
            $bsgwaterArr = '';
            $conesurveys = '';
            $ctwosurveys = '';
            switch ($step) {
                case 2:
                    $BSurveyValidationRules = JsValidator::make($this->BSurveyValidationRules);
                    $ASurveys = ASurvey::with('bsurveys')
                        ->with('bsgwater')
                        ->with('gpscoordinates')
                        ->with('attachments')
                        ->find($id);
                    //echo count($ASurveys->bsgwater);
                    $a = count($ASurveys->bsgwater);
                    $v = 1;
                    for ($i = 0; $i < 4; $i++) {
                        if ($v <= $a) {
                            $bsgwaterArr[$i]['tubewell_borewell'] = $ASurveys->bsgwater[$i]['tubewell_borewell'];
                            $bsgwaterArr[$i]['depth_of_s_pump'] = $ASurveys->bsgwater[$i]['depth_of_s_pump'];
                            $bsgwaterArr[$i]['current_water_abstraction'] = $ASurveys->bsgwater[$i]['current_water_abstraction'];
                        } else {

                            $bsgwaterArr[$i]['tubewell_borewell'] = '';
                            $bsgwaterArr[$i]['depth_of_s_pump'] = '';
                            $bsgwaterArr[$i]['current_water_abstraction'] = '';
                        }
                        $v++;
                    }

                    break;
                case 3:
                    $ASurveys = ASurvey::with('conesurveys')->find($id);
                    $a = count($ASurveys->conesurveys);
                    $v = 1;
                    for ($i = 0; $i < 4; $i++) {
                        if ($v <= $a) {
                            $conesurveys[$i]['details_of_water_requirement'] = $ASurveys->conesurveys[$i]['details_of_water_requirement'];
                            $conesurveys[$i]['requirement_CGWA_permission'] = $ASurveys->conesurveys[$i]['requirement_CGWA_permission'];
                            $conesurveys[$i]['existing_requirement'] = $ASurveys->conesurveys[$i]['existing_requirement'];
                            $conesurveys[$i]['no_of_operational_day'] = $ASurveys->conesurveys[$i]['no_of_operational_day'];
                            $conesurveys[$i]['annual_requirement'] = $ASurveys->conesurveys[$i]['annual_requirement'];
                        } else {
                            $conesurveys[$i]['details_of_water_requirement'] = '';
                            $conesurveys[$i]['requirement_CGWA_permission'] = '';
                            $conesurveys[$i]['existing_requirement'] = '';
                            $conesurveys[$i]['no_of_operational_day'] = '';
                            $conesurveys[$i]['annual_requirement'] = '';
                        }
                        $v++;
                    }
                    break;
                case 4:
                    $ASurveys = ASurvey::with('ctwosurveys')->find($id);
                    $a = count($ASurveys->ctwosurveys);
                    $v = 1;
                    for ($i = 0; $i < 8; $i++) {
                        if ($v <= $a) {
                            $ctwosurveys[$i]['breakup_of_recycled_water_usage'] = $ASurveys->ctwosurveys[$i]['breakup_of_recycled_water_usage'];
                            $ctwosurveys[$i]['cum_day'] = $ASurveys->ctwosurveys[$i]['cum_day'];
                            $ctwosurveys[$i]['cum_year'] = $ASurveys->ctwosurveys[$i]['cum_year'];

                        } else {
                            $ctwosurveys[$i]['breakup_of_recycled_water_usage'] = '';
                            $ctwosurveys[$i]['cum_day'] = '';
                            $ctwosurveys[$i]['cum_year'] = '';
                        }
                        $v++;
                    }
                    break;
                default:
                    abort(400, "No rules for this step!");
            }

            $a_survey_id = Session::get('a_survey_id');
            if (isset($ASurveys->bsurveys) && $ASurveys->bsurveys != null) {
                return view('survey.edit_step_' . $step, ['step' => $step, 'a_survey_id' => $a_survey_id, 'ASurveys' => $ASurveys, 'bsgwaterArr' => $bsgwaterArr, 'conesurveys' => $conesurveys, 'ctwosurveys' => $ctwosurveys])->with(['BSurveyValidationRules' => $BSurveyValidationRules]);
            } else {
                return redirect()->action('SurveyController@getSurveyStep', $step);
            }

        } else {
            return redirect('/audit');
        }

    }
    public function getSurveyStepUpdate(Request $request, $step)
    {
        $a_survey_id = Session::get('a_survey_id');
        $input = $request->all();
        $user = Auth::user();
        $d = date('Y-m-d H:i:s');
        switch ($step) {
            case 2:
                $v = Validator::make($input, $this->BSurveyValidationRules);
                if ($v->fails()) {
                    return redirect()->back()->withErrors($v->errors());
                }
                $b_survey_id = $id = $input['id'];

                //$b = BSurvey::find($id);
                BSurvey::where('a_survey_id', $a_survey_id)->update(['is_active' => 0]);
                $BSurvey['a_survey_id'] = $a_survey_id;
                $BSurvey['total_land_area'] = $input['total_land_area'];
                $BSurvey['total_land_area'] = $input['total_land_area'];
                $BSurvey['roof_top_area'] = $input['roof_top_area'];
                $BSurvey['road_paved_area'] = $input['road_paved_area'];
                $BSurvey['green_belt_area'] = $input['green_belt_area'];
                $BSurvey['open_land'] = $input['open_land'];
                if (isset($input['GPSCoordinate_waypoint_plot']) && !empty($input['GPSCoordinate_waypoint_plot'])) {
                    $BSurvey['GPSCoordinate_waypoint_plot'] = $input['GPSCoordinate_waypoint_plot'];
                }
                if (isset($input['GPSCoordinate_waypoint_tubewell']) && !empty($input['GPSCoordinate_waypoint_tubewell'])) {
                    $BSurvey['GPSCoordinate_waypoint_tubewell'] = $input['GPSCoordinate_waypoint_tubewell'];
                }
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
                $BSurvey['water_supply_from_RIICO'] = '';
                $BSurvey = BSurvey::create($BSurvey);
                $new_survey_id = $BSurvey->id;
 
                $this->auditLog($a_survey_id, 'b_audit_updated', 'b_survery table data updated.');
                BSgWater::where('a_survey_id', $a_survey_id)->where('b_survey_id', $id)->update(['is_active' => 0]);
                $BSgWater = array();
                foreach ($input['tubewell_borewell'] as $key => $value) {
                    $BSgWater[$key]['a_survey_id'] = $a_survey_id;
                    $BSgWater[$key]['b_survey_id'] = $new_survey_id;
                    $BSgWater[$key]['tubewell_borewell'] = $input['tubewell_borewell'][$key];
                    $BSgWater[$key]['depth_of_s_pump'] = $input['depth_of_s_pump'][$key];
                    $BSgWater[$key]['current_water_abstraction'] = $input['current_water_abstraction'][$key];
                    $BSgWater[$key]['created_at'] = date('Y-m-d H:i:s');
                    $BSgWater[$key]['updated_at'] = date('Y-m-d H:i:s');
                }

                BSgWater::insert($BSgWater);
                $this->auditLog($a_survey_id, 'swg_water_update', 'SWG Water Updated table.');

                Gpscoordinate::where('a_survey_id', $a_survey_id)->where('b_survey_id', $b_survey_id)->update(['is_active' => 0]);

                $GpscoordinatePlot = array();
                $GpscoordinateTubewell = array();
                $i = 0;
                $t = 0;
                if (isset($input['GPSCoordinate_waypoint_plot']) && !empty($input['GPSCoordinate_waypoint_plot'])) {
                    $GPSCoordinateWaypointPlotArr = explode(',', $input['GPSCoordinate_waypoint_plot']);
                    if (is_array($GPSCoordinateWaypointPlotArr)) {
                        foreach ($GPSCoordinateWaypointPlotArr as $GPSCoordinateWaypoint) {
                            $GpscoordinatePlot[$i]['a_survey_id'] = $a_survey_id;
                            $GpscoordinatePlot[$i]['b_survey_id'] = $new_survey_id;
                            $GpscoordinatePlot[$i]['GPSCoordinate_area'] = 'Plot';
                            $GpscoordinatePlot[$i]['GPSCoordinate_type'] = 'Plot';
                            $GpscoordinatePlot[$i]['GPSCoordinate_point'] = $GPSCoordinateWaypoint;
                            $GpscoordinatePlot[$i]['GPSCoordinate_latitude'] = '0';
                            $GpscoordinatePlot[$i]['GPSCoordinate_longitude'] = '0';
                            $GpscoordinatePlot[$i]['gpxfile'] = '';
                            $GpscoordinatePlot[$i]['comment'] = $input['GPSCoordinate_comment'];
                            $GpscoordinatePlot[$i]['created_at'] = date('Y-m-d H:i:s');
                            $GpscoordinatePlot[$i]['updated_at'] = date('Y-m-d H:i:s');
                            ++$i;
                        }
                    }
                }
                $GPSCoordinateWaypointTubewellArr = array();
                if (isset($input['GPSCoordinate_waypoint_tubewell']) && !empty($input['GPSCoordinate_waypoint_tubewell'])) {
                    $GPSCoordinateWaypointTubewellArr = explode(',', $input['GPSCoordinate_waypoint_tubewell']);
                    if (is_array($GPSCoordinateWaypointTubewellArr)) {
                        foreach ($GPSCoordinateWaypointTubewellArr as $GPSCoordinateWaypoint) {
                            $GpscoordinateTubewell[$t]['a_survey_id'] = $a_survey_id;
                            $GpscoordinateTubewell[$t]['b_survey_id'] = $new_survey_id;
                            $GpscoordinateTubewell[$t]['GPSCoordinate_area'] = 'Tubewell';
                            $GpscoordinateTubewell[$t]['GPSCoordinate_type'] = 'Tubewell';
                            $GpscoordinateTubewell[$t]['GPSCoordinate_point'] = $GPSCoordinateWaypoint;
                            $GpscoordinateTubewell[$t]['GPSCoordinate_latitude'] = '0';
                            $GpscoordinateTubewell[$t]['GPSCoordinate_longitude'] = '0';
                            $GpscoordinateTubewell[$t]['gpxfile'] = '';
                            $GpscoordinateTubewell[$t]['comment'] = $input['GPSCoordinate_comment'];
                            $GpscoordinateTubewell[$t]['created_at'] = date('Y-m-d H:i:s');
                            $GpscoordinateTubewell[$t]['updated_at'] = date('Y-m-d H:i:s');
                            ++$t;
                        }
                    }
                }
                $GPSCoordinateWaypointArr = array_merge($GPSCoordinateWaypointPlotArr, $GPSCoordinateWaypointTubewellArr);
                $Gpscoordinate = array_merge($GpscoordinatePlot, $GpscoordinateTubewell);
                Gpscoordinate::insert($Gpscoordinate);
                $this->auditLog($a_survey_id, 'gps_coordinate_update', 'Plot and Tubewell Way Point updated.');

                // getting all of the post data

                $finalFileUploadArr = array();
                $WaterSupplyFromRIICOBillArr = array();
                $AreaLocationArr = array();
                $SourcesSWGWArr = array();
                $ExistingRWHStructureArr = array();
                $SiteLayoutPlanArr = array();
                $GPXFileArr = array();

                // checking file is valid.
                BAttachment::where('a_survey_id', $a_survey_id)->where('b_survey_id', $b_survey_id)->update(['b_survey_id' => $new_survey_id]);

                if (isset($input['WaterSupplyFromRIICOBill']) && !empty($input['WaterSupplyFromRIICOBill']) && !is_null($input['WaterSupplyFromRIICOBill'][0])) {
                    $WaterSupplyFromRIICOBillArr = $this->multipleUpload($input['WaterSupplyFromRIICOBill'], 'WaterSupplyFromRIICOBill', $a_survey_id, $new_survey_id, $user['id']);
                }

                if (isset($input['area_location']) && !empty($input['area_location']) && !is_null($input['area_location'][0])) {
                    $AreaLocationArr = $this->multipleUpload($input['area_location'], 'area_location', $a_survey_id, $new_survey_id, $user['id']);
                }
                if (isset($input['sources_sw_gw']) && !empty($input['sources_sw_gw']) && !is_null($input['sources_sw_gw'][0])) {
                    $SourcesSWGWArr = $this->multipleUpload($input['sources_sw_gw'], 'sources_sw_gw', $a_survey_id, $new_survey_id, $user['id']);
                }
                if (isset($input['existing_rwh_structure']) && !empty($input['existing_rwh_structure']) && !is_null($input['existing_rwh_structure'][0])) {
                    $ExistingRWHStructureArr = $this->multipleUpload($input['existing_rwh_structure'], 'existing_rwh_structure', $a_survey_id, $new_survey_id, $user['id']);
                }
                if (isset($input['site_layout_plan']) && !empty($input['site_layout_plan']) && !is_null($input['site_layout_plan'][0])) {
                    $SiteLayoutPlanArr = $this->multipleUpload($input['site_layout_plan'], 'site_layout_plan', $a_survey_id, $new_survey_id, $user['id']);
                }
                $finalFileUploadArr = array_merge($WaterSupplyFromRIICOBillArr, $AreaLocationArr, $SourcesSWGWArr, $ExistingRWHStructureArr, $SiteLayoutPlanArr);
                if (!empty($finalFileUploadArr)) {
                    BAttachment::insert($finalFileUploadArr);
                }

                if (isset($input['attachgpxfile']) && !empty($input['attachgpxfile'])) {
                    $this->singleUpload($input['attachgpxfile'], 'gpxfile', $a_survey_id, $new_survey_id, $user['id'], $GPSCoordinateWaypointArr);
                    //$GPXFileArr = $this->singleUpload($input['attachgpxfile'], 'gpxfile', $a_survey_id, $b_survey_id, $user['id'], $GPSCoordinateWaypointArr);
                    //BAttachment::create($GPXFileArr);
                }

                break;
            case 3:
                COneSurvey::where('a_survey_id', $a_survey_id)
                    ->update(['is_active' => 0]);
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
                $this->auditLog($a_survey_id, 'c_audit_updated', 'Step 3 updated.');
                break;
            case 4:
                CTwoSurvey::where('a_survey_id', $a_survey_id)
                    ->update(['is_active' => 0]);
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
                $this->auditLog($a_survey_id, 'c_audit_updated', 'Step 4 updated');
                break;
            default:
                abort(400, "No rules for this step!");
        }

        if ($step == $this->lastStep) {

            $this->auditLog($a_survey_id, 'completed', 'Audit completely Updated.');
            return redirect()->action('SurveyController@getSurveyDone');
        }

        return redirect()->action('SurveyController@getSurveyStepEdit', ['step' => $step + 1]);
    }

    public function assignUsers(Request $request)
    {
        ASurvey::where("id", $request["aid"])->update(["torrent_id" => $request["uid"]]);

        $message = "Audit id " . $request["aid"] . " assigned to Torrent user " . $request["uid"] . " by superadmin user" . Auth::user()->name;
        $this->auditLog($request["aid"], "audit_assigned_superadmin", $message);
    }
    /*
     *
     * status we have:
     * a_audit_created,b_audit_created,b_audit_updated,c_audit_created,c_audit_updated,
     * gps_coordinate_created,gps_coordinate_update,swg_water_created,swg_water_update,
     * update,applied,not_applied,file_upload,active,approved,completed,certified
     *
     */
    private function auditLog($a_survey_id, $status, $comment)
    {
        //echo $comment;die;
        $user = Auth::user();
        $log = array(
            'user_id' => $user['id'],
            'a_survey_id' => $a_survey_id,
            'is_status' => $status,
            'comment' => $comment,
            'ip_address' => $_SERVER['REMOTE_ADDR'],
        );
        SurveyLog::create($log);

    }

    private function multipleUpload($files, $type, $a_survey_id, $b_survey_id, $userId)
    {
        $msg = '';
        $a = '';
        $dname = '';
        if ('WaterSupplyFromRIICOBill' == $type) {
            $msg = 'Water Supply From RIICO, if avaliable, take copy of last 3 bills';
            $a = 'Water Supply From RIICO Bill file uploaded.';
            $dname = 'Water Supply From RIICO Bill Copy';
        } else if ('area_location' == $type) {
            $msg = 'Area Location';
            $a = 'Area Location file uploaded.';
            $dname = 'Area Location';
        } else if ('sources_sw_gw' == $type) {
            $msg = 'Sources SW/GW Water';
            $a = 'Sources SW/GW Water file uploaded.';
            $dname = 'Sources SW/GW Water';
        } else if ('existing_rwh_structure' == $type) {
            $msg = 'Existing RWH Structure';
            $a = 'Existing RWH Structure file uploaded.';
            $dname = 'Existing RWH Structure';
        } else if ('site_layout_plan' == $type) {
            $msg = 'Site Layout Plan';
            $a = 'Site Layout Plan file uploaded.';
            $dname = 'Site Layout Plan';
        }
        $user_slug = $this->getUserSlug();
        $d = date('Y-m-d H:i:s');
        $df = date('YmdHis');
        $attachmentArr = array();
        $uploadcount = 0;
        $file_count = count($files);
        $uploadFileArr = array();
        foreach ($files as $file) {
            if ($file->isValid()) {
                $destinationPath = public_path() . '/uploads'; // upload path
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $orgfileName = $file->getClientOriginalName(); // getting image getClientOriginalName
                $fileName = $uploadcount . '_' . $df . '_' . $orgfileName; // renameing image
                $uploadFileArr[$uploadcount][$type] = $fileName;
                //$upload_success = $file->move($destinationPath, $filename);
                $file->move($destinationPath, $fileName); // uploading file to given path
                $uploadcount++;
            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
            }
        }
        if ($uploadcount == $file_count) {
            // sending back with message
            $i = 0;
            foreach ($uploadFileArr as $uploadFile) {
                $fileName = $uploadFile[$type];
                if (file_exists(public_path() . '/uploads/' . $fileName)) {

                    $attachmentArr[$i]['user_id'] = $userId;
                    $attachmentArr[$i]['a_survey_id'] = $a_survey_id;
                    $attachmentArr[$i]['b_survey_id'] = $b_survey_id;
                    $attachmentArr[$i]['image_path'] = $fileName;
                    $attachmentArr[$i]['display_name'] = $dname;
                    $attachmentArr[$i]['slug'] = $type;
                    $attachmentArr[$i]['user_slug'] = $user_slug;
                    $attachmentArr[$i]['comment'] = $msg . ' Image.';
                    $attachmentArr[$i]['created_at'] = $d;
                    $attachmentArr[$i]['updated_at'] = $d;
                    $msg = $a . ' (' . $fileName . ')';
                    $this->auditLog($a_survey_id, 'file_upload', $msg);
                    Session::flash('success', 'Upload successfully');
                } else {
                    Session::flash('failed', 'Not Uploaded');
                }
                $i++;
            }

        } else {
            Session::flash('failed', 'Not Uploaded');
        }
        return $attachmentArr;
    }

    private function singleUpload($file, $type, $a_survey_id, $b_survey_id, $userId, $GPSCoordinateWaypointArr = array())
    {
        $attachmentArr = array();
        $d = date('Y-m-d H:i:s');

        $user_slug = $this->getUserSlug();
        if ($file->isValid()) {
            $destinationPath = public_path() . '/uploads'; // upload path
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $orgfileName = $file->getClientOriginalName(); // getting image getClientOriginalName
            $fileName = date('YmdHis') . '_' . $orgfileName; // renameing image
            $file->move($destinationPath, $fileName); // uploading file to given path
            // sending back with message
            if (file_exists(public_path() . '/uploads/' . $fileName)) {
                $attachmentArr['attachgpxfile'] = $fileName;
                $attachmentArr['user_id'] = $userId;
                $attachmentArr['a_survey_id'] = $a_survey_id;
                $attachmentArr['b_survey_id'] = $b_survey_id;
                $attachmentArr['image_path'] = $fileName;
                $attachmentArr['display_name'] = 'GPX File';
                $attachmentArr['slug'] = 'gpxfile';
                $attachmentArr['user_slug'] = $user_slug;
                $attachmentArr['comment'] = 'GPX File.';
                $attachmentArr['created_at'] = $d;
                $attachmentArr['updated_at'] = $d;
                $GPSCoordinate_points = $GPSCoordinateWaypointArr;
                $msg = "GPX File uploaded (" . $fileName . ")";
                $this->auditLog($a_survey_id, 'file_upload', $msg);
                if (is_array($GPSCoordinateWaypointArr) && !empty($GPSCoordinateWaypointArr)) {
                    $this->getLatLogFromXML($fileName, $GPSCoordinate_points, $a_survey_id);
                }

                Session::flash('success', 'Upload successfully');
            } else {
                Session::flash('failed', 'Not Uploaded');
            }
        } else {
            // sending back with error message.
            Session::flash('error', 'uploaded file is not valid');
        }

    }

    private function getLatLogFromXML($fileName, $wayPointArr, $aid)
    {
        $fullName = public_path() . '/uploads/' . $fileName;
        $xml = simplexml_load_file($fullName);
        $updateArr = array();
        
        foreach ($xml->wpt as $nodes) {
            if (in_array($nodes->name, $wayPointArr)) {
                $k = (string) $nodes->name;
                $updateArr[$k]['lat'] = (string) $nodes['lat'];
                $updateArr[$k]['lon'] = (string) $nodes['lon'];
                $lat = $nodes['lat'];
                $lon = $nodes['lon'];
                Gpscoordinate::where('GPSCoordinate_point', $k)
                    ->where('a_survey_id', $aid)
                    ->update(['GPSCoordinate_latitude' => $lat, 'GPSCoordinate_longitude' => $lon, 'gpxfile' => $fileName]);
                //Gpscoordinate::where('GPSCoordinate_point', $k)->update(['GPSCoordinate_longitude' => $nodes['lon']]);
            }
        }
    }

    private function getUserSlug(){
        $user_slug='';
        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('devadmin')) {
            $user_slug='sa';

        }else if (Auth::user()->hasRole('torrentadmin')) {
            $user_slug='ta';

        }else if (Auth::user()->hasRole('auditor')) {
            $user_slug='au';

        }else {
            $user_slug='ar';
        }

        return $user_slug;
    }
    

}
