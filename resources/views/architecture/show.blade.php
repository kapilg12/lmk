@extends('layouts.architecture')
@section('content')
{{-- dump($ASurveys) --}}
<div class="row">
<div class="col-md-3">
    @include('layouts.partial.sidebar')
    </div>
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#settings" data-toggle="tab">A: Details of Basic Informations</a></li>
        </ul>
            @include('layouts.partial.architecture_settings')
        </div><!-- /.tab-content -->
      </div><!-- /.nav-tabs-custom -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('js')

@endsection
