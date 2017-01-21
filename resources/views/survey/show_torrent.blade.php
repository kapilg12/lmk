@extends('layouts.survey')
@section('content')
{{-- dump($ASurveys) --}}
<div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">B: Area Specification</a></li>
            <li><a href="#timeline" data-toggle="tab">C: Details Of Water</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="activity">
                @include('layouts.partial.activity')
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                @include('layouts.partial.timeline')
            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
      </div><!-- /.nav-tabs-custom -->
    </div><!-- /.col -->
</div><!-- /.row -->
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! $attachmentsValidationRules !!}
@endsection
@section('js')
<script type="text/javascript">
  function changeMe($changeVar,$changeVal)
  {
    if(confirm("Are sure want to perform this action ? Step can't changed !")){
    $.ajax({
        type:'POST',
        url:'/audit/changeStatus',
        data:{'changeVar':$changeVar,'changeVal':$changeVal},
        success:function(data){
          $("#access_nav").html(data);
        }
    });
  }
  }
</script>
@endsection
