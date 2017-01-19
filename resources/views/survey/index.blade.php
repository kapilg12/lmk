@extends('layouts.survey')
@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <h1>Welcome to My Audit</h1>
    @include('errors.list')
     {!! Form::open() !!}
      <fieldset style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
        <h4>Step 1: General Data Sheet for Industry Establishment</h4>
        <div class="form-group">
            {!! Form::label('office_id', trans('Industrial Area'), array('class' => '')) !!}
            {!! Form::select('office_id', $Office, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('allow_area', trans('Allow Area (Sqm)'), array('class' => '')) !!}
            {!! Form::text('allow_area', null, array('id' => 'allow_area', 'class' => 'form-control', 'placeholder' => trans('Allow Area'), 'title' => trans('Allow Area'))) !!}
        </div>

        <div class="form-group">
            {!! Form::label('establishment_name', trans('Establishment Name'), array('class' => '')) !!}
            {!! Form::text('establishment_name', null, array('id' => 'establishment_name', 'class' => 'form-control', 'placeholder' => trans('Establishment Name'), 'title' => trans('Establishment Name'))) !!}
        </div>
        <div class="form-group">
            {!! Form::label('postel_address', trans('Postel Address'), array('class' => '')) !!}
            {!! Form::text('postel_address', null, array('id' => 'postel_address', 'class' => 'form-control', 'placeholder' => trans('Postel Address'), 'title' => trans('Postel Address'))) !!}
        </div>
        <div class="form-group">
            {!! Form::label('pin_code', trans('Pin Code'), array('class' => '')) !!}
            {!! Form::text('pin_code', null, array('id' => 'pin_code', 'class' => 'form-control', 'placeholder' => trans('Pin Code'), 'title' => trans('Pin Code'))) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nature_of_establishment', trans('Nature of Establishment'), array('class' => '')) !!}
            {!! Form::select('nature_of_establishment', [ '' => 'Please Select Nature of Establishment', 'proprietorship' => 'Proprietorship','partnership_firm' => 'Partnership Firm', 'private_limited' => 'Private Limited', 'public_limited' => 'Public Limited'], null, array('id' => 'nature_of_establishment', 'class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('contact_person_name', trans('Contact Person Name'), array('class' => '')) !!}
            {!! Form::text('contact_person_name', null, array('id' => 'contact_person_name', 'class' => 'form-control', 'placeholder' => trans('Contact Person Name'), 'title' => trans('Contact Person Name'))) !!}
        </div>
        <div class="form-group">
            {!! Form::label('designation', trans('Designation'), array('class' => '')) !!}
            {!! Form::text('designation', null, array('id' => 'designation', 'class' => 'form-control', 'placeholder' => trans('Designation'), 'title' => trans('Designation'))) !!}
        </div>
        <div class="form-group">
            {!! Form::label('contact_number', trans('Contact Number'), array('class' => '')) !!}
            {!! Form::text('contact_number', null, array('id' => 'contact_number', 'class' => 'form-control', 'placeholder' => trans('Contact Number'), 'title' => trans('Contact Number'))) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', trans('What is your email?'), array('class' => '')) !!}
            {!! Form::text('email', null, array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('Email'), 'title' => trans('Email'))) !!}
        </div>
        <div class="form-group">
            {!! Form::label('website', trans('Website'), array('class' => '')) !!}
            {!! Form::text('website', null, array('id' => 'Website', 'class' => 'form-control', 'placeholder' => trans('Website'), 'title' => trans('Website'))) !!}
        </div>
      </fieldset>
       <fieldset style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">

            <div class="form-group">
                <label class="radio-inline"><input type="radio" name="is_applied" value="1">Apply</label>
                <label class="radio-inline"><input type="radio" name="is_applied" value="0">Not Apply</label>
            </div>
        </fieldset>
       <fieldset style="margin-top: 20px;margin-bottom: 5px;">
          <input type="submit" name="submit" class="next btn btn-info" value="Submit" />
        </fieldset>
    {!! Form::close() !!}
    </div>
    <div class="col-md-1"></div>
</div>
<!-- Laravel Javascript Validation -->
 <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
 {!! $ASurveyValidationRules !!}
@endsection
