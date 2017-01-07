@extends('layouts.survey')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Office Management</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-success" href="{{ route('offices.create') }}"> Create New Office</a>
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>			
			<th width="280px">Action</th>
		</tr>
	@foreach ($data as $key => $office)
		
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $office->office_name }}</td>				
				<td>
					<a class="btn btn-info" href="{{ route('offices.show',$office->id) }}">Show</a>
					<a class="btn btn-primary" href="{{ route('offices.edit',$office->id) }}">Edit</a>
					{!! Form::open(['method' => 'DELETE','route' => ['offices.destroy', $office->id],'style'=>'display:inline']) !!}
		            {!! Form::submit('Delete', ['class' => 'btn btn-danger','onclick'=>'return getConfirmation();']) !!}
		        	{!! Form::close() !!}
				</td>
			</tr>
		
	@endforeach
	</table>
	{!! $data->render() !!}	
@endsection
@section('js')
<script type="text/javascript">
		function getConfirmation()
		{
			if(confirm("Are sure want to delete ?"))
			{
				return true;
			}else{
				return false;
			}
		}
	</script>
@endsection
