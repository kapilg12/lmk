@extends('layouts.survey')
@section('content')
<!--{{ dump($ASurveys) }}-->

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-8">
                <h4><span style="text-transform: capitalize;">{{Auth::user()->name}}</span>: Welcome to your Dashboard Panel</h4>
            </div>

            <div class="col-md-4">
                <div class="pull-right">
                    @if(Auth::user()->ability(array('rm','superadmin','devadmin'),array()))
                        <a class="btn btn-success" href="{{ url('/audit') }}"> Create New Audit</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Audit Details</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                   <tr>
                        <th>No</th>
                        <th>Office</th>
                        <!--<th>Establishment Name</th>-->
                        <th>Is Applied</th>
                        <th>Is Active</th>
                        <th>Is Approved</th>
                        <th>Is Completed</th>
                        <th>Is Certified</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ASurveys as $key => $ASurvey)
                    @if(in_array($ASurvey->offices['id'],Auth::user()->options['allowedOffices']))
                    <tr >
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{$ASurvey->offices['office_name']}}</td>
                        <!--<td>{{ $ASurvey->establishment_name }}</td>-->
                        <td>@if($ASurvey->is_applied == '1') <span class="label label-success">Applied</span> @else <span class="label label-danger">Not Applied</span> @endif</td>
                        <td>@if($ASurvey->is_active == '1') <span class="label label-success">Active</span> @else <span class="label label-warning">Pending</span> @endif</td>
                        <td>@if($ASurvey->is_approved == '1') <span class="label label-success">Approved</span> @else <span class="label label-warning">Pending</span> @endif</td>
                        <td>@if($ASurvey->is_completed == '1') <span class="label label-success">Completed</span> @else <span class="label label-warning">Pending</span> @endif</td>
                        <td>@if($ASurvey->is_certified == '1') <span class="label label-success">Certified</span> @else <span class="label label-warning">Pending</span> @endif</td>
                        <td>
                            @if(Auth::user()->ability(array('torrent'),array()))
                              <a class="btn btn-primary btn-sm" href="{{ url('audit/show',$ASurvey->bsurveys['id']) }}"><strong><i class="fa fa-eye"></i></strong></a>
                            @else
                                <a class="btn btn-primary btn-sm" href="{{ url('audit/show',$ASurvey->id) }}"><strong><i class="fa fa-eye"></i></strong></a>
                            @endif
                            @if($ASurvey->is_applied == '0')
                                <a class="btn btn-primary btn-sm" href="{{ route('survey.edit',$ASurvey->id) }}"><strong><i class="fa fa-pencil"></i></strong></a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
              </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    <div class="col-md-1"></div>
</div>
@endsection
