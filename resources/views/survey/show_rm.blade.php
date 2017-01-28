@extends('layouts.survey')
@section('content')
{{-- dump($ASurveys) --}}
<div class="row">
<div class="col-md-4">
    @include('layouts.partial.sidebar')
    </div>
    <div class="col-md-8">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#settings" data-toggle="tab">A: Details of Basic Informations</a></li>
        </ul>
            @include('layouts.partial.settings')
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
