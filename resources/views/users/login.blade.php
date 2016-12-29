@extends('layouts.survey')

@section('content')
	<!--<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Enter Login Details</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
	        </div>
	    </div>
	</div>-->
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

	<!--<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Password:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
        				<button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
	</div>-->
    <div class="login-box">
      <div class="login-logo">
        <a href="{{ url('/') }}"><b>Bhujal Admin Panel</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
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

        <!--<div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div>--><!-- /.social-auth-links -->

        <!--<a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>-->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@endsection
