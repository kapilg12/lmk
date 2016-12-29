@extends('layouts.survey')
@section('content')
<!--{{ dump($ASurveys) }}-->

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-8">
                <h4><span style="text-transform: capitalize;">{{$user_role}}</span>: Welcome to your Dashboard Panel</h4>
            </div>

            <div class="col-md-4">
                <div class="pull-right">
                    @if('rm' == $user_role || 'superadmin' == $user_role)
                        <a class="btn btn-success" href="{{ url('/survey') }}"> Create New survey</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                   <tr>
                        <th>No</th>
                        <th>Office</th>
                        <th>Establishment Name</th>
                        <th>Is Active</th>
                        <th>Is Approved</th>
                        <th>Is Completed</th>
                        <th>Is Certified</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ASurveys as $key => $ASurvey)

                    <tr >
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{$ASurvey->offices['office_name']}}</td>
                        <td>{{ $ASurvey->establishment_name }}</td>
                        <td>@if($ASurvey->is_active == '1') <span class="label label-success">Active</span> @else <span class="label-warning">Pending</span> @endif</td>
                        <td>@if($ASurvey->is_approved == '1') <span class="label label-success">Approved</span> @else <span class="label-warning">Pending</span> @endif</td>
                        <td>@if($ASurvey->is_completed == '1') <span class="label label-success">Completed</span> @else <span class="label-warning">Pending</span> @endif</td>
                        <td>@if($ASurvey->is_certified == '1') <span class="label label-success">Certified</span> @else <span class="label-warning">Pending</span> @endif</td>
                        <td>
                            @if($user_role == 'torrent')
                              <a class="btn btn-info" href="{{ url('survey/show',$ASurvey->bsurveys['id']) }}">Show</a>
                            @else
                                <a class="btn btn-info" href="{{ url('survey/show',$ASurvey->id) }}">Show</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    <div class="col-md-1"></div>
</div>
@endsection
