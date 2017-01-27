@extends('layouts.survey')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Users Management</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table id="example1" class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Roles</th>
			<th width="280px">Action</th>
		</tr>
		</thead>
	@foreach ($data as $key => $user)
	@if($user->email != "kapilvermasgnr@gmail.com")
	<tbody>
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if(!empty($user->roles))
				@foreach($user->roles as $v)
					<label class="label label-success">{{ $v->display_name }}</label>
				@endforeach
			@endif
		</td>
		<td>
			<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
			@if(Auth::user()->id != $user->id || Auth::user()->hasRole("devadmin"))
			<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
			{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline','onclick'=>'return getConfirmation();']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            @endif
        	{!! Form::close() !!}
		</td>
	</tr>
	</tbody>
	@endif
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
