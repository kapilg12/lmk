@extends('layouts.survey')

@section('content')
	<div class="row">
	    <div class="box">
	    	<div class="box-header">
	    		<h3 class="box-title">{{$officeDetail->office_name}}</h3>
	    	</div>
	    	<div class="box-body no-padding">
              <table class="table">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  
                  <th>Label</th>
                </tr>
                </thead>
                <tbody>
                @foreach($officeDetail->children as $subOfficeDetail)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$subOfficeDetail->office_name}}</td>
                  
                  <td>
                  	<a class="btn btn-primary" href="{{ route('offices.edit',$subOfficeDetail->id) }}">Edit</a>
					{!! Form::open(['method' => 'DELETE','route' => ['offices.destroy', $subOfficeDetail->id],'style'=>'display:inline']) !!}
		            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
		        	{!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                </div>
	    </div>
	</div>
@endsection