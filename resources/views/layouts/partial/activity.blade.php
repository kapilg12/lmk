
    <!-- The timeline -->
    <ul class="timeline timeline-inverse">
        <!-- timeline time label -->
        <li class="time-label">
            <span class="bg-red">Details of Area</span>
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
                  <b>Average Annual Rainfall in the area in mm</b> <a class="pull-right">{{ $ASurveys->bsurveys->average_annual_rainfall }}</a>
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Type</th>
                          <th>Image/file</th>
                          <th>Comment</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                     <tbody>
                    {{--*/ $i = 0 /*--}}
                     @foreach ($ASurveys->attachments as $key => $attachment)
                        <tr>
                          <td>{{++$i}}</td>
                          <td class="center">{{$attachment->display_name}}</a>
                           </td>
                           <td class="center"><a href="{!! asset('uploads/').'/'.$attachment->image_path !!}" target="_new">{{$attachment->image_path}}</a>
                           </td>
                           <td class="center">{{$attachment->comment}}</td>
                           <td class="center"><a href="{!! asset('uploads/').'/'.$attachment->image_path !!}" target="_new"> <strong><i class="fa fa-eye"></i></strong></a>
                           </td>
                        </tr>
                    @endforeach
                     </tbody>
                </table>

              </div>
        </div>
        </li>
        <!-- END timeline item -->
        @if(Auth::user()->hasRole('torrentadmin') || Auth::user()->hasRole('devadmin'))
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

                {!! Form::close() !!}
              </div>
            </div>
        </li>
        @endif
        <li>
            <i class="fa fa-clock-o bg-gray"></i>
        </li>
    </ul>
