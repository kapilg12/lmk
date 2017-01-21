@extends('layouts.survey')
@section('content')
{{-- dump($ASurveys) --}}
@if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('devadmin'))
<div class="row" id="access_nav">
   @include('layouts.partial.access_nav')
</div>
<div class="bottom-buffer"></div>
@endif
<div class="row">
     @include('layouts.partial.sidebar')
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            @include('layouts.partial.tabbar')
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    @include('layouts.partial.activity')
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                    @include('layouts.partial.timeline')
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
    </div><!-- /.col -->
</div><!-- /.row -->

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
