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
