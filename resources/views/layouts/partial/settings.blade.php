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
              <b>Email</b> <a class="pull-right">{{ $ASurveys->email }}</a>
            </li>
            <li class="list-group-item">
              <b>Website</b> <a class="pull-right">{{ $ASurveys->website }}</a>
            </li>
            <li class="list-group-item">
              <b>Is Applied</b> <a class="pull-right">@if($ASurveys->is_applied == '1') <span class="label label-success">Applied</span> @else <span class="label label-warning">Not Applied</span> @endif</a>
            </li>
            <li class="list-group-item">
              <b>Is Active</b> <a class="pull-right">@if($ASurveys->is_active == '1') <span class="label label-success">Active</span> @else <span class="label label-warning">Pending</span> @endif</a>
            </li>
            <li class="list-group-item">
              <b>Is Approved</b> <a class="pull-right">@if($ASurveys->is_approved == '1') <span class="label label-success">Approved</span> @else <span class="label label-warning">Pending</span> @endif</a>
            </li>
            <li class="list-group-item">
              <b>Is Completed</b> <a class="pull-right">@if($ASurveys->is_completed == '1') <span class="label label-success">Completed</span> @else <span class="label label-warning">Pending</span> @endif</a>
            </li>
            <li class="list-group-item">
              <b>Is Certified</b> <a class="pull-right">@if($ASurveys->is_certified == '1') <span class="label label-success">Certified</span> @else <span class="label label-warning">Pending</span> @endif</a>
            </li>
          </ul>
        </div><!-- /.box-body -->
        </div>
      </li>
      <!-- END timeline item -->
      @if(Auth::user()->hasRole('rm'))
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
                          <th>Author</th>
                          <th>Image/file</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                     <tbody>
                    {{--*/ $i = 0 /*--}}
                     @foreach ($AttacmentArr as $key => $attachment)
                        <tr>
                          <td>{{++$i}}</td>
                          <td class="center">{{$attachment->display_name}}</td>
                          <td class="center">
                            @if($attachment->user_slug == 'sa')
                              Super Admin
                            @elseif($attachment->user_slug == 'ta')
                              Torrent
                            @elseif($attachment->user_slug == 'au')
                              Auditor
                            @else
                              Architecture
                            @endif
                          </td>
                          <td class="center"><a href="{!! asset('public/uploads/').'/'.$attachment->image_path !!}" target="_new">{{$attachment->image_path}}</a></td>
                          <td class="center"><a href="{!! asset('public/uploads/').'/'.$attachment->image_path !!}" target="_new"> <strong><i class="fa fa-eye"></i></strong></a></td>
                        </tr>
                    @endforeach
                     </tbody>
                </table>

              </div>
        </div>
      </li>
      @endif
      <li>
        <i class="fa fa-clock-o bg-gray"></i>
      </li>
    </ul>
  </div><!-- /.tab-pane -->
