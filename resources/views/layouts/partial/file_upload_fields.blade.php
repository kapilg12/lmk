<div class="form-group">
                {!! Form::label('area_location', trans('Area Location (Only JPG and PDF Extension File)'), array('class' => '')) !!}
                {!! Form::file('area_location', array('id' => 'area_location', 'class' => 'form-control')) !!}
                <p class="errors">{!!$errors->first('area_location')!!}</p>
            </div>
           <div class="form-group">
                {!! Form::label('sources_sw_gw', trans('Source SW GW (Only JPG and PDF Extension File)'), array('class' => '')) !!}
                {!! Form::file('sources_sw_gw', array('id' => 'sources_sw_gw', 'class' => 'form-control')) !!}
                <p class="errors">{!!$errors->first('sources_sw_gw')!!}</p>
            </div>
            <div class="form-group">
                {!! Form::label('existing_rwh_structure', trans('existing rwh structure (Only JPG, PDF, Doc and Docx Extension File)'), array('class' => '')) !!}
                {!! Form::file('existing_rwh_structure', array('id' => 'existing_rwh_structure', 'class' => 'form-control')) !!}
                <p class="errors">{!!$errors->first('existing_rwh_structure')!!}</p>
            </div>
            <div class="form-group">
                {!! Form::label('site_layout_plan', trans('site layout plan (Only JPG and PDF Extension File)'), array('class' => '')) !!}
                {!! Form::file('site_layout_plan', array('id' => 'site_layout_plan', 'class' => 'form-control')) !!}
                <p class="errors">{!!$errors->first('site_layout_plan')!!}</p>
            </div>
            {{-- <div class="form-group">
                {!! Form::label('attachgpxfile', trans('Attach GPX File (Only gpx Extension File)'), array('class' => '')) !!}
                {!! Form::file('attachgpxfile',  array('id' => 'attachgpxfile', 'class' => 'form-control')) !!}
                <p class="errors">{!!$errors->first('attachgpxfile')!!}</p>
            </div> --}}
