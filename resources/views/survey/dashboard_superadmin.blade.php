@extends('layouts.survey')
@section('content')
<!--{{ dump($ASurveys) }}-->

<div class="row">
    <!--<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1"></div>-->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-8">
                <h4><span style="text-transform: capitalize;">{{Auth::user()->name}}</span>: Welcome to your Dashboard Panel</h4>
            </div>

        </div>
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Audit Details</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                       <tr>
                            <th>No</th>
                            <th>Office</th>
                            <th>Address</th>
                            <th>Is Applied</th>
                            <th>Is Active</th>
                            <!--<th>Is Approved</th>
                            <th>Is Completed</th>
                            <th>Is Certified</th>-->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ASurveys as $key => $ASurvey)


                        @if(in_array($ASurvey->offices['id'],Auth::user()->options['allowedOffices']))
                        <tr >
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{$ASurvey->offices['office_name']}}</td>
                            <td>{{ $ASurvey->postel_address }}</td>
                            <td>@if($ASurvey->is_applied == '1') <span class="label label-success">Applied</span> @else <span class="label label-danger">Not Applied</span> @endif</td>
                            <td>@if($ASurvey->is_active == '1') <span class="label label-success">Active</span> @else <span class="label label-warning">Pending</span> @endif</td>
                            <td>
                             @if(Auth::user()->ability(array('superadmin','devadmin'),array()))
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach($users as $value=>$key)
                                          <li><a href="#" onclick="assignUsers('{{$key}}','{{$ASurvey->id}}')">{{$value}}</a></li>
                                          @endforeach
                                        </ul>
                                    </div>
                                    @if($ASurvey->is_approved == '0')
                                        @if($ASurvey->is_applied == '0' || $ASurvey->is_applied == '1')
                                            <a class="btn btn-primary btn-sm" href="{{ route('survey.edit',$ASurvey->id) }}"><strong><i class="fa fa-pencil"></i></strong></a>
                                        @endif
                                    @endif    
                                @endif
                                @if(Auth::user()->ability(array('torrentadmin'),array()))
                                    @if(isset($ASurvey->bsurveys['id']) && !empty($ASurvey->bsurveys['id'])){
                                     <a class="btn btn-primary btn-sm" href="{{ url('audit/show',$ASurvey->id) }}"><strong><i class="fa fa-eye"></i></strong></a>
                                    @else
                                        <a class="btn btn-primary btn-sm" href="javascript:void(0);">Audit Not Completed</a>
                                    @endif
                                @else
                                    <a class="btn btn-primary btn-sm" href="{{ url('audit/show',$ASurvey->id) }}"><strong><i class="fa fa-eye"></i></strong></a>
                                @endif


                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
   <!--<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1"></div>-->
</div>
@endsection
@section("js")
<script type="text/javascript">
    function assignUsers(key="",aid="")
    {
        $.ajax({
            type:"POST",
            url:"/audit/assignUsers",
            data:{"uid":key,"aid":aid},
            success:function(data){
                alert("Audit assigned successfully.");
            }
        });
    }
</script>
@endsection
