@extends('layouts.survey')

@section('content')
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
    <div class="login-box">
      <div class="login-logo">
        <a href="{{ url('/') }}"><b>Bhujal Admin Panel</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <p class="login-box-msg">
          @if ($message = Session::get('warning'))
            <div class="alert alert-warning">
              <p>{{ $message }}</p>
            </div>
          @endif
      </p>
        <p class="login-box-msg">Sign in to start your session</p>
        {!! Form::open(array('method'=>'POST')) !!}
          <div class="form-group has-feedback">
            <!--<input type="email" class="form-control" placeholder="Email">-->
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            <!--<input type="password" class="form-control" placeholder="Password">-->
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">            
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
       {!! Form::close() !!}
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@endsection
