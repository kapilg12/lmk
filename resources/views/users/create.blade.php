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
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
    {!! Form::open(array( "name"=>"frmaddUser","id"=>"frmaddUser", 'method'=>'POST')) !!}
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
                      <input type="checkbox">
                      {{$value->title}}
                    </label>                  
                </div>
            </div>
            @foreach($value->states as $key => $stateValue)
                <div class="col-xs-12 col-sm-12 col-md-12">                    
                    <div class="form-group">                  
                        <label>
                          <input type="checkbox">
                          {{$stateValue->title}}
                        </label>                  
                    </div>
                </div>
                @foreach($stateValue->offices as $key => $stateRO)
                    {{-- <pre>{{print_r($stateRO->children->toArray())}}</pre> --}}
                    @if(!empty($stateRO->children->toArray()))
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">                  
                                <label>
                                  <input type="checkbox">
                                  {{$stateRO->office_name}}
                                </label>                  
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            @foreach($stateRO->children as $key => $subOffice)
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">                  
                                        <label>
                                          <input type="checkbox">
                                          {{$subOffice->office_name}}
                                        </label>                  
                                    </div>  
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">                  
                                <label>
                                  <input type="checkbox">
                                  {{$stateRO->office_name}}
                                </label>                  
                            </div>
                        </div>    
                    @endif
                @endforeach    
            @endforeach

        @endforeach

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Multiple</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                  <option>Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
        </div>






        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            
				<button type="submit" class="btn btn-primary btn-flat form-control">Submit</button>
            
        </div>
	</div>
	{!! Form::close() !!}

@endsection
@section('js')

     <script type="text/javascript" src="{!! asset('plugins/select2/select2.full.min.js') !!}"></script>

    <script type="text/javascript">
        $(function () {
        $(".select2").select2();
    });
    </script>
@endsection