<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\ASurvey;
use App\BAttachment;
use App\BSurvey;
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

class ArchitectsController extends Controller
{


	public function getDashboard(Request $request)
    {
        $i = 0;
        
        $ASurveys = ASurvey::with('offices')
            ->where('architect_id', Auth::user()->id)
            ->orderBy('id', 'DESC')->get();
        return view('architect.dashboard', compact('ASurveys', 'i'));
        
    }

    public function show($id)
    {
        $attachmentsValidationRules = '';
        
        $user = Auth::user();
        $ASurveys = ASurvey::with('offices')
            ->with('bsurveys')
            ->with('gpscoordinates')
            ->find($id);

        $AttacmentArr = BAttachment::where('a_survey_id', $id)
            ->where(function($query) {
                return $query->orWhere('user_slug', '=', 'ta')->orWhere('user_slug', '=', 'ar');
            })->get();        

        if (isset($ASurveys->bsurveys) && count($ASurveys->bsurveys) > 0) {
            return view('architect.show', compact('ASurveys', 'AttacmentArr'));
        } else {
            return view('errors.audit_not_completed');
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
        $ExistingRWHStructureArr = array();
       
        if (isset($input['existing_rwh_structure']) && !empty($input['existing_rwh_structure']) && !is_null($input['existing_rwh_structure'][0])) {
            $ExistingRWHStructureArr = $this->multipleUpload($input['existing_rwh_structure'], 'existing_rwh_structure', $a_survey_id, $b_survey_id, $user['id']);
        }
        
        return redirect('/architect/show/' . $a_survey_id);
       
    }
}
