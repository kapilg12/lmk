<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Office;
use App\Country;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Office::orderBy('id', 'DESC')->paginate(5);
        //dd($data);
        return view('offices.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
    	$countries = Country::lists('title','id');
    	return view("offices.create",compact('countries'));
    }
    public function edit($id)
    {
    	$countries = Country::lists('title','id');
    	$office = Office::with(['states','states.countries'])->find($id);
    	return view("offices.create",compact('countries','office'));
    	//dd($office);
    }

    public function getOfficesList(Request $request)
    {
    	$offices = Office::where('state_id',$request['state_id'])->where('parent_id',NULL)->lists('office_name','id');
    	return $offices;
    }
    public function store(Request $request)
    {
    	//dd($request->all());
    	$this->validate($request, [
            'country_id' => 'required',
            'state_id' => 'required',            
            'office_name' => 'required',            
        ]);
        
        $officeArray = array(
        	'state_id'=>$request['state_id'],        	
        	'office_name'=>$request['office_name']
        );
        //dd($officeArray);
        $office = Office::create($officeArray);
        if($request['office_id']!=''){
        	$root = Office::find($request['office_id']);
        	$office->makeChildOf($root);
        }        
        return redirect()->route('offices.index')
            ->with('success', 'Office created successfully');
    }
}
