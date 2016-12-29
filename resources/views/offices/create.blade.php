@extends('layouts.survey')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Add Regional Office</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('offices.index') }}"> Back</a>
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
    {!! Form::open(array("url"=>"offices/store", "name"=>"frmaddOffice","id"=>"frmaddOffice", 'method'=>'POST')) !!}

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Country:</strong>
                {!! Form::select('country_id', $countries,null, array('placeholder'=>'Select Country','class' => 'form-control','onchange'=>'loadState();','id'=>'country_id')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>State:</strong>
                <select name="state_id" id="state_id" class="form-control" onchange="loadOffices()">
                    <option value="">Select State</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Regional Offices:</strong>
                <select name="office_id" id="office_id" class="form-control">
                    <option value="">Select Offices</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Area Office:</strong>
                <input type="text" name="office_name" id="office_name" placeholder="Office Name" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Officer Name:</strong>
                <input type="text" name="officer_name" id="officer_name" placeholder="Officer Name" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Office Address:</strong>
                <textarea name="office_address" id="office_address" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pin:</strong>
                <input type="text" name="office_pin" id="office_pin" placeholder="Pin" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Office Phone:</strong>
                <input type="text" name="office_phone" id="office_phone" placeholder="Office Phone" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Office Mobile:</strong>
                <input type="text" name="office_mobile" id="office_mobile" placeholder="Office Mobile" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Office Email:</strong>
                <input type="text" name="office_email" id="office_email" placeholder="Office Email" class="form-control" />
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
    <script type="text/javascript">
    function loadState(){
        $.ajax({
            type:'POST',
            url:'/states/getStates',
            data:{'country_id':$("#country_id").val()},
            success:function(data){
                $.each(data, function(index, state) {
                    $("#state_id").append('<option value="' + index + '">' + state + '</option>');
                });
            }
        });
    }
    function loadOffices()
    {
        $.ajax({
            type:'POST',
            url:'/offices/getOffices',
            data:{'state_id':$("#state_id").val()},
            success:function(data){
                $.each(data,function(index,office){
                    $("#office_id").append('<option value="'+index+'">'+office+'</option>');
                });
            }
        });
    }
</script>
@endsection
