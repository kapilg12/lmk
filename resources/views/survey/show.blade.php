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
    @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('rm') || Auth::user()->hasRole('devadmin'))
    <div class="col-md-3">
        <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <!--<img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">-->
              <h3 class="profile-username text-center">{{ $ASurveys->offices->office_name }}</h3>
              <p class="text-muted text-center">{{ $ASurveys->contact_person_name }} ({{ $ASurveys->designation }})</p>


              <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                  <b>Allow Area</b> <a class="pull-right">{{ $ASurveys->allow_area }} Sq m</a>
                </li>
                <li class="list-group-item">
                  <b>Establishment name</b> <a class="pull-right">{{ $ASurveys->establishment_name }}</a>
                </li>
                <li class="list-group-item">
                  <b>Nature of <br />Establishment</b>
                  <a class="pull-right">{{ $ASurveys->nature_of_establishment }}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{ $ASurveys->email }}</a>
                </li>
                <li class="list-group-item">
                  <b>Website</b> <a class="pull-right">{{ $ASurveys->website }}</a>
                </li>
              </ul>

            </div><!-- /.box-body -->
          </div><!-- /.box -->
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Basic Information</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-map-marker margin-r-5"></i> Postal Address</strong>
              <p class="text-muted">{{ $ASurveys->postel_address}} - {{ $ASurveys->pin_code}}</p>

              <hr>

              <strong><i class="fa fa-phone margin-r-5">Contact</i></strong>
              <p class="text-muted">{{ $ASurveys->contact_number}}</p>

              <hr>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

    </div><!-- /.col -->
    @endif
    @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('rm') || Auth::user()->hasRole('devadmin'))
    <div class="col-md-9">
    @else
        <div class="col-md-12">
    @endif
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          @if(Auth::user()->ability(array('superadmin'),array()) || Auth::user()->ability(array('devadmin'),array()))
          <li class="active"><a href="#activity" data-toggle="tab">B: Area Specification</a></li>
          <li><a href="#timeline" data-toggle="tab">C: Details Of Water</a></li>
          @elseif($user_role == 'torrent')
            <li class="active"><a href="#activity" data-toggle="tab">B: Area Specification</a></li>
          @else
            <li class="active"><a href="#settings" data-toggle="tab">A: Details of Basic Informations</a></li>
          @endif
        </ul>

@if(Auth::user()->ability(array('rm'),array()))
            <div class="active tab-pane" id="settings">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-red">
                  Basic Information
                </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->

              <li>
                <i class="fa fa-home bg-red"></i>
                <div class="timeline-item">
                <!-- Profile Image -->
                <div class="box-body box-profile">
                 <ul class="list-group ">
                    <li class="list-group-item">
                      <b>Allow Area Sq m</b> <a class="pull-right">{{ $ASurveys->allow_area }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Establishment name</b> <a class="pull-right">{{ $ASurveys->establishment_name }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Nature of Establishment</b> <a class="pull-right">{{ $ASurveys->nature_of_establishment }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Is Active</b> <a class="pull-right">@if($ASurveys->is_active == '1') <span class="label label-success">Active</span> @else <span class="label-warning">Pending</span> @endif</a>
                    </li>
                    <li class="list-group-item">
                      <b>Is Approved</b> <a class="pull-right">@if($ASurveys->is_approved == '1') <span class="label label-success">Approved</span> @else <span class="label-warning">Pending</span> @endif</a>
                    </li>
                    <li class="list-group-item">
                      <b>Is Completed</b> <a class="pull-right">@if($ASurveys->is_completed == '1') <span class="label label-success">Completed</span> @else <span class="label-warning">Pending</span> @endif</a>
                    </li>
                    <li class="list-group-item">
                      <b>Is Certified</b> <a class="pull-right">@if($ASurveys->is_certified == '1') <span class="label label-success">Certified</span> @else <span class="label-warning">Pending</span> @endif</a>
                    </li>
                  </ul>
                </div><!-- /.box-body -->
                </div>
              </li>
              <!-- END timeline item -->

              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
          </div><!-- /.tab-pane -->
         @endif

        <div class="tab-content">
        @if(Auth::user()->ability(array('superadmin'),array()) || Auth::user()->ability(array('torrent'),array()) || Auth::user()->ability(array('rm'),array()) || Auth::user()->ability(array('devadmin'),array()))        
          <div class="active tab-pane" id="activity">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-red">
                  Details of Area
                </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->

              <li>
                <i class="fa fa-home bg-red"></i>
                <div class="timeline-item">
                <!-- Profile Image -->
                <div class="box-body box-profile">
                 <ul class="list-group ">
                    <li class="list-group-item">
                      <b>Total Land Area Sq m</b> <a class="pull-right">{{ $ASurveys->bsurveys->total_land_area }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Roof Top Area of Building/Sheds Sq m</b> <a class="pull-right">{{ $ASurveys->bsurveys->roof_top_area }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Road/Paved Area in Sq m</b> <a class="pull-right">{{ $ASurveys->bsurveys->road_paved_area }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Green Belt Area Sq m</b> <a class="pull-right">{{ $ASurveys->bsurveys->green_belt_area }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Open Lead in Sq m</b> <a class="pull-right">{{ $ASurveys->bsurveys->open_land }}</a>
                    </li>
                  </ul>
                </div><!-- /.box-body -->
                </div>
              </li>
              <!-- END timeline item -->
              <!-- GMS Coordinates -->
              <li class="time-label">
                <span class="bg-blue">
                 GPS Coordinates
                </span>
              </li>
              <li>
                <i class="fa fa-map-marker bg-blue"></i>
                <div class="timeline-item">
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                  <th>GPSCoordinate Point</th>
                                  <th>Latitude</th>
                                  <th>Longitude</th>
                                </tr>
                                @foreach ($ASurveys->gpscoordinates as $key => $gpscoordinate)
                                    <tr>
                                      <td><b>Point {{$gpscoordinate->GPSCoordinate_point}}</b></td>
                                      <td><span class="badge bg-red">{{$gpscoordinate->GPSCoordinate_latitude}}</span></td>
                                      <td><span class="badge bg-red">{{$gpscoordinate->GPSCoordinate_longitude}}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                         
                </div><!-- /.box-body -->
                </div>
              </li>
              <!-- END GMS Coordinates -->
              <!-- Rinfall -->
              <li class="time-label">
                <span class="bg-aqua">
                    Rainfall
                </span>
              </li>
              <li>
                <i class="fa fa-bolt bg-aqua"></i>
                <div class="timeline-item">
                    <div class="box-body box-profile">
                         <ul class="list-group ">
                            <li class="list-group-item">
                              <b>Average Annual Railfall in the area in mm</b> <a class="pull-right">{{ $ASurveys->bsurveys->average_annual_rainfall }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Number of Rainy days in a year</b> <a class="pull-right">{{ $ASurveys->bsurveys->number_of_rainy_day }}</a>
                            </li>

                          </ul>
                    </div><!-- /.box-body -->
                </div>
              </li>
              <!-- END Railfall -->
              <!-- Nature item -->
              <li class="time-label">
                <span class="bg-green">
                    Nature
                </span>
              </li>
              <li>
                <i class="fa fa-stack-overflow bg-green"></i>
                <div class="timeline-item">
                    <div class="box-body box-profile">
                         <ul class="list-group ">
                            <li class="list-group-item">
                              <b>Nature of Aquifer:</b> <a class="pull-right">{{ $ASurveys->bsurveys->nature_of_aquifer }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Nature of Terrain:</b> <a class="pull-right">{{ $ASurveys->bsurveys->nature_of_terrain }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Nature of Soil:</b> <a class="pull-right">{{ $ASurveys->bsurveys->nature_of_soil }}</a>
                            </li>
                        </ul>
                    </div><!-- /.box-body -->
                </div>
              </li>
              <!-- END Nature item -->
              <!-- Recharge item -->
              <li class="time-label">
                <span class="bg-yellow">
                    Reacharge
                </span>
              </li>
              <li>
                <i class="fa fa-stack-overflow bg-yellow"></i>
                <div class="timeline-item">
                    <div class="box-body box-profile">
                         <ul class="list-group ">
                            <li class="list-group-item">
                              <b>Reacharge Structures Available: </b> <a class="pull-right"></a>
                            </li>
                            <li class="list-group-item">
                              <b>Recharge well (T/W or H/P) – working / abandoned <br />[Depth(m), Diameter(m)]</b> <a class="pull-right">Depth(m): {{ $ASurveys->bsurveys->recharge_well_depth }}, Diameter(m): {{ $ASurveys->bsurveys->recharge_well_diameter }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Recharge Pit – working / abandoned <br />[Depth(m), Diameter(m)]</b> <a class="pull-right">Depth(m): {{ $ASurveys->bsurveys->recharge_pit_depth }} Diameter(m):{{ $ASurveys->bsurveys->recharge_pit_diameter }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Recharge Trenches – working / abandoned <br />[Dimension – L x W x D]</b> <a class="pull-right">L: {{ $ASurveys->bsurveys->recharge_trenches_l }} X W:{{ $ASurveys->bsurveys->recharge_trenches_w }} X D:{{ $ASurveys->bsurveys->recharge_trenches_d }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Water bodies ponds etc.– working / abandoned <br />[Depth(m), Diameter(m)]</b> <a class="pull-right">Depth(m): {{ $ASurveys->bsurveys->water_bodies_ponds_depth }}, Diameter(m):{{ $ASurveys->bsurveys->water_bodies_ponds_diameter }}</a>
                            </li>
                          </ul>
                    </div><!-- /.box-body -->
                </div>
              </li>
              <!-- END Recharge item -->
              <!-- Source of Water item -->
              <li class="time-label">
                <span class="bg-aqua">
                    Source of Water
                </span>
              </li>
              <li>
                <i class="fa fa-cloud bg-aqua"></i>
                <div class="timeline-item">
                      <h3 class="timeline-header">Source of Availability of surface water for industrial use, if any, give details</h3>
                      <div class="timeline-body">{{ $ASurveys->bsurveys->source_of_availability_of_surface_water }}</div>
                </div>
              </li>
              <!-- END Source of Water item -->
              <!-- Source of Ground water item -->
              <li class="time-label">
                <span class="bg-red">
                    Source of Ground water
                </span>
              </li>
              <li>
                <i class="fa fa-cloud bg-red"></i>
                <div class="timeline-item">
                      <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">Source of Ground water</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tr>
                                      <th style="width: 10px">#</th>
                                      <th>Tubewell / Borewell (Working only)</th>
                                      <th>Depth of S/pump & water level (m)**, Diameter(m)</th>
                                      <th>Current Water Abstraction (Discharge Rate x working hr)</th>
                                    </tr>
                                    {{--*/ $i = 0 /*--}}
                                     @foreach ($ASurveys->bsgwater as $key => $bsgwater)
                                        <tr>
                                          <td>{{++$i}}</td>
                                          <td><b>Point {{$bsgwater->tubewell_borewell}}</b></td>
                                          <td>{{$bsgwater->depth_of_s_pump}}</td>
                                          <td>{{$bsgwater->current_water_abstraction}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->
                </div>
              </li>
              <!-- END Source of Ground water item -->
              <!-- SWater Supply from RIICO item -->
              <li class="time-label">
                <span class="bg-aqua">
                    Water Supply
                </span>
              </li>
              <li>
                <i class="fa fa-cloud bg-aqua"></i>
                <div class="timeline-item">
                      <h3 class="timeline-header">Water Supply from RIICO, if available, take copy of last 3 bills</h3>
                      <div class="timeline-body">{{ $ASurveys->bsurveys->water_supply_from_RIICO }}</div>
                </div>
              </li>
              <!-- END Water Supply from RIICO item -->
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-purple">
                 Sitemap/Plan Pictures
                </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-area-chart bg-purple"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header">Area/Location Site Layout Pians uploaded Picutes</h3>
                  <div class="timeline-body">
                    <table class="table table-striped">
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Area Location</th>
                          <th>Sources SW GW</th>
                          <th>Concept plan-RWHS</th>
                          <th>Site Layout Plan</th>
                          <th>GPX File</th>
                        </tr>
                        {{--*/ $i = 0 /*--}}
                         @foreach ($ASurveys->attachments as $key => $attachment)
                            <tr>
                              <td>{{++$i}}</td>
                              <td><a href="{!! asset('uploads/').'/'.$attachment->area_location !!}" target="_new">{{$attachment->area_location}}</a></td>
                              <td><a href="{!! asset('uploads/').'/'.$attachment->sources_sw_gw !!}" target="_new">{{$attachment->sources_sw_gw}}</a></td>
                              <td><a href="{!! asset('uploadsimg/').'/'.$attachment->existing_rwh_structure !!}" target="_new">{{$attachment->existing_rwh_structure}}</a></td>
                              <td><a href="{!! asset('uploads/').'/'.$attachment->site_layout_plan !!}" target="_new">{{$attachment->site_layout_plan}}</a></td>
                              <td><a href="{!! asset('uploads/').'/'.$attachment->attachgpxfile !!}" target="_new">{{$attachment->attachgpxfile}}</a></td>
                            </tr>
                        @endforeach
                    </table>
                   <!-- <img src="{!! asset('dist/img/docx_mac.png') !!}" width="100" height="100" alt="..." class="margin">
                    <img src="{!! asset('dist/img/p1.png') !!}" width="100" height="100" alt="..." class="margin">
                    <img src="{!! asset('dist/img/icone-projet-web.png') !!}"  width="100" height="100" alt="..." class="margin">-->
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-cloud-upload bg-purple"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header">Uploads section</h3>
                  <div class="timeline-body">
                    {!! Form::open(array('url'=>'audit/upload', 'files'=>'true')) !!}
                    {{ Form::hidden('a_survey_id', $ASurveys->id) }}
                    {{ Form::hidden('b_survey_id', $ASurveys->bsurveys->id) }}
                    {{ Form::hidden('GPSCoordinate_points', $GPSCoordinate_points) }}

                        @include('layouts.partial.file_upload_fields')
                        <input type="submit" name="submit" class="next btn btn-info" value="Submit" />
                    {!! Form::close() !!}
                  </div>
                </div>
              </li>
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
          </div><!-- /.tab-pane -->
          @endif          
          @if(Auth::user()->ability(array('superadmin'),array()) || Auth::user()->ability(array('torrent'),array()) || Auth::user()->ability(array('devadmin'),array()))
          <div class="tab-pane" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-red">Data Sheet for Medium / Large Scale Industries and WATER Instensive Inds</span>
              </li>
               <!-- timeline item -->
              <li>
                <i class="fa fa-cloud bg-red"></i>
                <div class="timeline-item">
                      <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">1.</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                              <table class="table table-striped">
                                <tbody><tr>
                                  <th style="width: 10px">#</th>
                                  <th> Details of Water requirement / recycled water usage: (Demand a flow chart of activities and requirement of water at each stage)</th>
                                  <th>Requirement as per CGWA permission**/##  (Cum/day)</th>
                                  <th>Existing Requirement (Cum/day)</th>
                                  <th>No. of operational days (Cum/day)</th>
                                  <th>Annual requirement (Cum/year)</th>
                                </tr>
                                {{--*/ $i = 0 /*--}}
                                 @foreach ($ASurveys->conesurveys as $key => $conesurvey)
                                    <tr>
                                      <td>{{++$i}}</td>
                                      <td>{{$conesurvey->details_of_water_requirement}}</td>
                                      <td>{{$conesurvey->requirement_CGWA_permission}}</td>
                                      <td>{{$conesurvey->existing_requirement}}</a></td>
                                      <td>{{$conesurvey->no_of_operational_day}}</td>
                                      <td>{{$conesurvey->annual_requirement}}</td>
                                    </tr>
                                @endforeach

                              </tbody></table>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->
                </div>
              </li>
              <!-- END timeline item -->
                  <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-red">Details of Water requirement / recycled water usage</span>
              </li>
               <!-- timeline item -->
              <li>
                <i class="fa fa-cloud bg-red"></i>
                <div class="timeline-item">
                      <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">2.</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                              <table class="table table-striped">
                                <tbody><tr>
                                  <th style="width: 10px">#</th>
                                  <th> Breakup of Recycled water usage:</th>
                                  <th>Cum/Day</th>
                                  <th>Cum/Year</th>
                                </tr>
                                {{--*/ $i = 0 /*--}}
                                 @foreach ($ASurveys->ctwosurveys as $key => $ctwosurvey)
                                    <tr>
                                      <td>{{++$i}}</td>
                                      <td>{{$ctwosurvey->breakup_of_recycled_water_usage}}</td>
                                      <td>{{$ctwosurvey->cum_day}}</td>
                                      <td>{{$ctwosurvey->cum_year}}</a></td>
                                    </tr>
                                @endforeach
                              </tbody></table>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->
                </div>
              </li>
              <!-- END timeline item -->

              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
          </div><!-- /.tab-pane -->
           @endif

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
    alert($(this).data('val'));
    $.ajax({
        type:'POST',
        url:'/audit/changeStatus',
        data:{'changeVar':$changeVar,'changeVal':$changeVal},
        success:function(data){
          $("#access_nav").html(data);
        }
    });
  }
</script>
@endsection
