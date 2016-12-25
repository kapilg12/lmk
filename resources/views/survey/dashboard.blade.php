@extends('layouts.survey')
@section('content')
{{ dump($ASurveys) }}

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <h1>{{$user_role}}: Welcome to your Dashboard Panel</h1>
        <fieldset style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">

        <table class="table table-bordered">
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
                <tr class="active">
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{$ASurvey->offices->office_name}}</td>
                    <td>{{ $ASurvey->establishment_name }}</td>
                    <td>{{ $ASurvey->is_active }}</td>
                    <td>{{ $ASurvey->is_approved }}</td>
                    <td>{{ $ASurvey->is_completed }}</td>
                    <td>{{ $ASurvey->is_certified }}</td>





                    <td>
                        @if($user_role == 'torrent')
                            <a class="btn btn-info" href="{{ url('survey/show',$ASurvey->bsurveys[0]->BSurvey['id']) }}">Show</a>
                        @else
                            <a class="btn btn-info" href="{{ url('survey/show',$ASurvey->id) }}">Show</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                <!--<tr>
                    <th scope="row">2</th>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="success">
                    <th scope="row">3</th>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="info">
                    <th scope="row">5</th>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                    <tr> <th scope="row">6</th>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="warning">
                    <th scope="row">7</th>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>
                <tr class="danger">
                    <th scope="row">9</th>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                </tr>-->
            </tbody>
        </table>
        </fieldset>
    </div>
    <div class="col-md-1"></div>
</div>
@endsection
