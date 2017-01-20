@extends('layouts.survey')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Create New User</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
    {!! Form::open(array("url"=>"users/store",  "name"=>"frmaddUser","id"=>"frmaddUser", 'method'=>'POST')) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('roles', $roles,null, array('placeholder'=>'Select Role','class' => 'form-control')) !!}
            </div>
        </div>

        @foreach($globalOffices as $key => $value)
            <div class="col-xs-12 col-sm-12 col-md-12">                    
                <div class="form-group">                  
                    <label>
                      <input type="checkbox" name="country[]" value="{{$value->id}}" class="country_{{$value->id}}" data-val="country_{{$value->id}}">
                      {{$value->title}}
                    </label>                  
                </div>
            </div>
            @foreach($value->states as $key => $stateValue)
                <div class="col-xs-12 col-sm-12 col-md-12">                    
                    <div class="form-group">                  
                        <label>
                          <input type="checkbox" name="state[]" value="{{$stateValue->id}}" class="country_{{$value->id}} state_{{$stateValue->id}}" data-val="state_{{$stateValue->id}}">
                          {{$stateValue->title}}
                        </label>                  
                    </div>
                </div>
                @foreach($stateValue->offices as $key => $stateRO)
                    {{-- <pre>{{print_r($stateRO->children->toArray())}}</pre> --}}
                    @if(($stateRO->isRoot()))
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">                  
                                <label>
                                  <input type="checkbox" name="allowedOffices[]" value="{{$stateRO->id}}" class="country_{{$value->id}} state_{{$stateValue->id}} stateRO_{{$stateRO->id}}"  data-val="stateRO_{{$stateRO->id}}">
                                  {{$stateRO->office_name}}
                                </label>                  
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            @foreach($stateRO->children as $key => $subOffice)
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">                  
                                        <label>
                                          <input type="checkbox" name="allowedOffices[]" value="{{$subOffice->id}}" class="country_{{$value->id}} state_{{$stateValue->id}} stateRO_{{$stateRO->id}}">
                                          {{$subOffice->office_name}}
                                        </label>                  
                                    </div>  
                                </div>
                            @endforeach
                        </div>                    
                    @endif
                @endforeach    
            @endforeach
        @endforeach
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary btn-flat form-control">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}

@endsection
@section('js')
    <script type="text/javascript">        
        $('input[type=checkbox]').click(function(){
            $("."+$(this).data('val')).prop('checked',$(this).is(':checked'));
        });
    </script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! $userValidationRules !!}
@endsection