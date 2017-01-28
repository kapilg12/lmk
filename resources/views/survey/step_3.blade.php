@extends('layouts.survey')
@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">

    <h3>Step 3:- Data Sheet for Medium / Large Scale Industries and WATER Instensive Inds</h3>
    {!! Form::open() !!}
    
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <div class="set1">
                <div class="form-group">
                    {!! Form::label('details_of_water_requirement', trans('Details of Water requirement / recycled water usage: (Demand a flow chart of activities and requirement of water at each stage)'), array('class' => '')) !!}
                    {!! Form::select('details_of_water_requirement[]', [ '' => 'Please Select Source of Ground water', 'industrial' => 'Industrial','residential ' => 'Residential','domestic ' => 'Domestic','greenbelt_development ' => 'Greenbelt development','other_uses ' => 'Other uses (specify)'], null, array('id' => 'details_of_water_requirement', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('requirement_CGWA_permission', trans('Requirement as per CGWA permission**/## (Cum/day)'), array('class' => '')) !!}
                    {!! Form::text('requirement_CGWA_permission[]', null, array('id' => 'depth_of_s_pump', 'class' => 'form-control', 'placeholder' => trans('requirement CGWA permission'), 'title' => trans('requirement CGWA permission'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('existing_requirement', trans('Existing Requirement (Cum/day)'), array('class' => '')) !!}
                    {!! Form::text('existing_requirement[]', null, array('id' => 'existing_requirement', 'class' => 'form-control', 'placeholder' => trans('existing requirement'), 'title' => trans('existing requirement'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('no_of_operational_day', trans('No. of operational days (Cum/day)'), array('class' => '')) !!}
                    {!! Form::text('no_of_operational_day[]', null, array('id' => 'no_of_operational_day', 'class' => 'form-control', 'placeholder' => trans('no of operational day'), 'title' => trans('no of operational day'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('annual_requirement', trans('Annual requirement (Cum/year)'), array('class' => '')) !!}
                    {!! Form::text('annual_requirement[]', null, array('id' => 'annual_requirement', 'class' => 'form-control', 'placeholder' => trans('annual requirement'), 'title' => trans('annual requirement'), 'autocomplete' => 'off')) !!}
                </div>
            </div>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <div class="set2">
                <div class="form-group">
                    {!! Form::label('details_of_water_requirement', trans('Details of Water requirement / recycled water usage: (Demand a flow chart of activities and requirement of water at each stage)'), array('class' => '')) !!}
                    {!! Form::select('details_of_water_requirement[]', [ '' => 'Please Select Source of Ground water', 'industrial' => 'Industrial','residential ' => 'Residential','domestic ' => 'Domestic','greenbelt_development ' => 'Greenbelt development','other_uses ' => 'Other uses (specify)'], null, array('id' => 'details_of_water_requirement', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('requirement_CGWA_permission', trans('Requirement as per CGWA permission**/## (Cum/day)'), array('class' => '')) !!}
                    {!! Form::text('requirement_CGWA_permission[]', null, array('id' => 'depth_of_s_pump', 'class' => 'form-control', 'placeholder' => trans('requirement CGWA permission'), 'title' => trans('requirement CGWA permission'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('existing_requirement', trans('Existing Requirement (Cum/day)'), array('class' => '')) !!}
                    {!! Form::text('existing_requirement[]', null, array('id' => 'existing_requirement', 'class' => 'form-control', 'placeholder' => trans('existing requirement'), 'title' => trans('existing requirement'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('no_of_operational_day', trans('No. of operational days (Cum/day)'), array('class' => '')) !!}
                    {!! Form::text('no_of_operational_day[]', null, array('id' => 'no_of_operational_day', 'class' => 'form-control', 'placeholder' => trans('no of operational day'), 'title' => trans('no of operational day'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('annual_requirement', trans('Annual requirement (Cum/year)'), array('class' => '')) !!}
                    {!! Form::text('annual_requirement[]', null, array('id' => 'annual_requirement', 'class' => 'form-control', 'placeholder' => trans('annual requirement'), 'title' => trans('annual requirement'), 'autocomplete' => 'off')) !!}
                </div>
            </div>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
           <div class="set3">
               <div class="form-group">
                    {!! Form::label('details_of_water_requirement', trans('Details of Water requirement / recycled water usage: (Demand a flow chart of activities and requirement of water at each stage)'), array('class' => '')) !!}
                    {!! Form::select('details_of_water_requirement[]', [ '' => 'Please Select Source of Ground water', 'industrial' => 'Industrial','residential ' => 'Residential','domestic ' => 'Domestic','greenbelt_development ' => 'Greenbelt development','other_uses ' => 'Other uses (specify)'], null, array('id' => 'details_of_water_requirement', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('requirement_CGWA_permission', trans('Requirement as per CGWA permission**/## (Cum/day)'), array('class' => '')) !!}
                    {!! Form::text('requirement_CGWA_permission[]', null, array('id' => 'depth_of_s_pump', 'class' => 'form-control', 'placeholder' => trans('requirement CGWA permission'), 'title' => trans('requirement CGWA permission'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('existing_requirement', trans('Existing Requirement (Cum/day)'), array('class' => '')) !!}
                    {!! Form::text('existing_requirement[]', null, array('id' => 'existing_requirement', 'class' => 'form-control', 'placeholder' => trans('existing requirement'), 'title' => trans('existing requirement'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('no_of_operational_day', trans('No. of operational days (Cum/day)'), array('class' => '')) !!}
                    {!! Form::text('no_of_operational_day[]', null, array('id' => 'no_of_operational_day', 'class' => 'form-control', 'placeholder' => trans('no of operational day'), 'title' => trans('no of operational day'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('annual_requirement', trans('Annual requirement (Cum/year)'), array('class' => '')) !!}
                    {!! Form::text('annual_requirement[]', null, array('id' => 'annual_requirement', 'class' => 'form-control', 'placeholder' => trans('annual requirement'), 'title' => trans('annual requirement'), 'autocomplete' => 'off')) !!}
                </div>
            </div>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <div class="set4">
                <div class="form-group">
                    {!! Form::label('details_of_water_requirement', trans('Details of Water requirement / recycled water usage: (Demand a flow chart of activities and requirement of water at each stage)'), array('class' => '')) !!}
                    {!! Form::select('details_of_water_requirement[]', [ '' => 'Please Select Source of Ground water', 'industrial' => 'Industrial','residential ' => 'Residential','domestic ' => 'Domestic','greenbelt_development ' => 'Greenbelt development','other_uses ' => 'Other uses (specify)'], null, array('id' => 'details_of_water_requirement', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('requirement_CGWA_permission', trans('Requirement as per CGWA permission**/## (Cum/day)'), array('class' => '')) !!}
                    {!! Form::text('requirement_CGWA_permission[]', null, array('id' => 'depth_of_s_pump', 'class' => 'form-control', 'placeholder' => trans('requirement CGWA permission'), 'title' => trans('requirement CGWA permission'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('existing_requirement', trans('Existing Requirement (Cum/day)'), array('class' => '')) !!}
                    {!! Form::text('existing_requirement[]', null, array('id' => 'existing_requirement', 'class' => 'form-control', 'placeholder' => trans('existing requirement'), 'title' => trans('existing requirement'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('no_of_operational_day', trans('No. of operational days (Cum/day)'), array('class' => '')) !!}
                    {!! Form::text('no_of_operational_day[]', null, array('id' => 'no_of_operational_day', 'class' => 'form-control', 'placeholder' => trans('no of operational day'), 'title' => trans('no of operational day'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('annual_requirement', trans('Annual requirement (Cum/year)'), array('class' => '')) !!}
                    {!! Form::text('annual_requirement[]', null, array('id' => 'annual_requirement', 'class' => 'form-control', 'placeholder' => trans('annual requirement'), 'title' => trans('annual requirement'), 'autocomplete' => 'off')) !!}
                </div>
            </div>
        </fieldset>
        <fieldset style="margin-top: 20px;margin-bottom: 5px;">
          <input type="submit" name="submit" class="next btn btn-info" value="Submit" />
        </fieldset>
    {!! Form::close() !!}
    </div>
    <div class="col-md-1"></div>
</div>
@endsection
