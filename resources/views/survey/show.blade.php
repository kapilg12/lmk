@extends('layouts.survey')
@section('content')
{{ dump($ASurveys) }}

<div class="row">
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

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Basic Information</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-map-marker margin-r-5"></i> Postel Address</strong>
          <p class="text-muted">{{ $ASurveys->postel_address}} - {{ $ASurveys->pin_code}}</p>

          <hr>

          <strong><i class="fa fa-phone margin-r-5">Contact</i></strong>
          <p class="text-muted">{{ $ASurveys->contact_number}}</p>

          <hr>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div><!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#activity" data-toggle="tab">B: Area Specification</a></li>
          <li><a href="#timeline" data-toggle="tab">C: Details Of Water</a></li>
          <li><a href="#settings" data-toggle="tab">C: Breakup of Recycled</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-red">
                  Details of Arae
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
                      <b>Total Land Area Sq m</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <b>Roof Top Area of Building/Sheds Sq m</b> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item">
                      <b>Road/Paved Area in Sq m</b> <a class="pull-right">13,287</a>
                    </li>
                    <li class="list-group-item">
                      <b>Green Belt Area Sq m</b> <a class="pull-right">13,287</a>
                    </li>
                    <li class="list-group-item">
                      <b>Open Lead in Sq m</b> <a class="pull-right">13,287</a>
                    </li>
                  </ul>
                </div><!-- /.box-body -->
                </div>
              </li>
              <!-- END timeline item -->
              <!-- GMS Coordinates -->
              <li class="time-label">
                <span class="bg-blue">
                 GMS Coordinates
                </span>
              </li>
              <li>
                <i class="fa fa-map-marker bg-blue"></i>
                <div class="timeline-item">
                    <div class="box-body box-profile">
                 <ul class="list-group ">
                    <li class="list-group-item">
                      <b>Point A</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <b>Point B</b> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item">
                      <b>Point C</b> <a class="pull-right">13,287</a>
                    </li>
                    <li class="list-group-item">
                      <b>Point D</b> <a class="pull-right">13,287</a>
                    </li>
                    <li class="list-group-item">
                      <b>Space available in north east cornor of the area (L x W)</b> <a class="pull-right">13,287</a>
                    </li>
                  </ul>
                </div><!-- /.box-body -->
                </div>
              </li>
              <!-- END GMS Coordinates -->
              <!-- Rinfall -->
              <li class="time-label">
                <span class="bg-aqua">
                    Railfall
                </span>
              </li>
              <li>
                <i class="fa fa-bolt bg-aqua"></i>
                <div class="timeline-item">
                    <div class="box-body box-profile">
                         <ul class="list-group ">
                            <li class="list-group-item">
                              <b>Average Annual Railfall in the area in mm</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                              <b>Number of Rainy days in a year</b> <a class="pull-right">543</a>
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
                              <b>Average Annual Railfall in the area in mm</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                              <b>Number of Rainy days in a year</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                              <b>Average Annual Railfall in the area in mm</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                              <b>Number of Rainy days in a year</b> <a class="pull-right">543</a>
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
                              <b>Reacharge Structures Available: </b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                              <b>Recharge well (T/W or H/P) – working / abandoned    [Depth(m), Diameter(m)]</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                              <b>Recharge Pit – working / abandoned [Depth(m), Diameter(m)]</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                              <b>Recharge Trenches – working / abandoned [Dimension – L x W x D]</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                              <b>Water bodies ponds etc.– working / abandoned [Depth(m), Diameter(m)]</b> <a class="pull-right">543</a>
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
                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
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
                                <tr>
                                  <td>1.</td>
                                  <td>Tubewell</td>
                                  <td>50000 * 50
                                  </td>
                                  <td><span class="badge bg-red">50</span></td>
                                </tr>
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
                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
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
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
          </div><!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-red">
                  10 Feb. 2014
                </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                  <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                  <div class="timeline-body">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                    quora plaxo ideeli hulu weebly balihoo...
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs">Read more</a>
                    <a class="btn btn-danger btn-xs">Delete</a>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-user bg-aqua"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                  <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                  <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                  <div class="timeline-body">
                    Take me to your leader!
                    Switzerland is small and neutral!
                    We are more like Germany, ambitious and misunderstood!
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-green">
                  3 Jan. 2014
                </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-camera bg-purple"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                  <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                  <div class="timeline-body">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
          </div><!-- /.tab-pane -->

          <div class="tab-pane" id="settings">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-red">
                  10 Feb. 2014
                </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                  <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                  <div class="timeline-body">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                    quora plaxo ideeli hulu weebly balihoo...
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs">Read more</a>
                    <a class="btn btn-danger btn-xs">Delete</a>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-user bg-aqua"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                  <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                  <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                  <div class="timeline-body">
                    Take me to your leader!
                    Switzerland is small and neutral!
                    We are more like Germany, ambitious and misunderstood!
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-green">
                  3 Jan. 2014
                </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-camera bg-purple"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                  <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                  <div class="timeline-body">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
          </div><!-- /.tab-pane -->

        </div><!-- /.tab-content -->
      </div><!-- /.nav-tabs-custom -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
