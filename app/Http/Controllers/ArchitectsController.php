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
        $finalFileUploadArr = array();
        $SiteLayoutPlanArr = array();
       
        if (isset($input['existing_rwh_structure']) && !empty($input['existing_rwh_structure']) && !is_null($input['existing_rwh_structure'][0])) {
            $ExistingRWHStructureArr = $this->multipleUpload($input['existing_rwh_structure'], 'existing_rwh_structure', $a_survey_id, $b_survey_id, $user['id']);
            $finalFileUploadArr = array_merge($ExistingRWHStructureArr, $SiteLayoutPlanArr);
            if (!empty($finalFileUploadArr)) {
                BAttachment::insert($finalFileUploadArr);
            }
        }


        
        return redirect('/architect/show/' . $a_survey_id);
       
    }

    public function assignArchitects(Request $request)
    {
        ASurvey::where("id", $request["aid"])->update(["architect_id" => $request["uid"]]);

        $message = "Audit id " . $request["aid"] . " assigned to Architect user " . $request["uid"] . " by superadmin user" . Auth::user()->name;
    }

    private function multipleUpload($files, $type, $a_survey_id, $b_survey_id, $userId)
    {
        $msg = '';
        $a = '';
        $dname = '';
        if ('existing_rwh_structure' == $type) {
            $msg = 'Existing RWH Structure through Architect.';
            $a = 'Existing RWH Structure file uploaded.';
            $dname = 'Existing RWH Structure';
        }
        $user_slug = 'ar';
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
                //$fileName = $uploadcount . '_' . $df . '_' . $orgfileName; // renameing image
                $fileName = $uploadcount . '_' . $df . '_' . '.'.$extension; // renameing image
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

    
}
