<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Office;
use App\Country;
use App\State;
class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Office::with('children')->where('parent_id',null)->orderBy('id', 'DESC')->paginate(5);
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
    	$states = State::where('country_id',$office->states['country_id'])->lists('title','id');
    	$offices = Office::where('state_id',$office->state_id)->where('parent_id',NULL)->lists('office_name','id');
    	return view("offices.edit",compact('countries','office','states','offices'));
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
        	'office_name'=>$request['office_name'],
        	'officer_name'=>$request['officer_name'],
        	'office_address'=>$request['office_address'],
        	'office_phone'=>$request['office_phone'],
        	'office_mobile'=>$request['office_mobile'],
        	'office_email'=>$request['office_email'],
        	'office_pin'=>$request['office_pin'],
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
    public function update(Request $request)
    {
    	$this->validate($request, [
            'country_id' => 'required',
            'state_id' => 'required',            
            'office_name' => 'required',            
        ]);
        $officeArray = Office::find($request['id']);
    	//$officeArray->id=$request['office_id'];
    	$officeArray->state_id=$request['state_id'];        	
    	$officeArray->office_name=$request['office_name'];
    	$officeArray->officer_name=$request['officer_name'];
    	$officeArray->office_address=$request['office_address'];
    	$officeArray->office_phone=$request['office_phone'];
    	$officeArray->office_mobile=$request['office_mobile'];
    	$officeArray->office_email=$request['office_email'];
    	$officeArray->office_pin=$request['office_pin'];
        
        $office = $officeArray->update();        
        if($request['office_id']!=''){
            $root = Office::find($request['office_id']);            
            $officeArray->makeChildOf($root);
        }
        return redirect()->route('offices.index')
            ->with('success', 'Office updated successfully');
    }
    public function show($id)
    {
        $officeDetail = Office::with('children')->where('id',$id)->first();
        return view("offices.show",compact('officeDetail'))->with('i');
        
    }

    public function destroy($id)
    {
        Office::where('id',$id)->update(['is_active'=>0]);
        return redirect()->route('offices.index')
            ->with('success', 'Office deleted successfully');
    }
}
