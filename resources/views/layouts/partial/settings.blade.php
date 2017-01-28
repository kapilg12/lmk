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

      <li>
        <i class="fa fa-clock-o bg-gray"></i>
      </li>
    </ul>
  </div><!-- /.tab-pane -->
