
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
              </ul>

            </div><!-- /.box-body -->
          </div><!-- /.box -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <!--<img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">-->
              <h3 class="profile-username text-center">Status Of Audit </h3>
        
              <ul class="list-group list-group-unbordered">
              
                <li class="list-group-item">
                  <b>Is Applied</b> <a class="pull-right">@if($ASurveys->is_applied == '1') <span class="label label-success">Applied</span> @else <span class="label label-warning">Not Applied</span> @endif</a>
                </li>
                 <li class="list-group-item">
                  <b>Is Active</b> <a class="pull-right">@if($ASurveys->is_active == '1') <span class="label label-success">Active</span> @else <span class="label label-warning"> Pending</span> @endif</a>
                </li>
                <li class="list-group-item">
                  <b>Is Approved</b> <a class="pull-right">@if($ASurveys->is_approved == '1') <span class="label label-success">Approved</span> @else <span class="label label-warning"> Pending</span> @endif</a>
                </li>
                <li class="list-group-item">
                  <b>Is Completed</b> <a class="pull-right">@if($ASurveys->is_completed == '1') <span class="label label-success">Completed</span> @else <span class="label label-warning"> Pending</span> @endif</a>
                </li>
                <li class="list-group-item">
                  <b>Is Certified</b> <a class="pull-right">@if($ASurveys->is_certified == '1') <span class="label label-success">Certified</span> @else <span class="label label-warning"> Pending</span> @endif</a>
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
