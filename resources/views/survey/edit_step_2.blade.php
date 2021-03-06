@extends('layouts.survey')
@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">

    <h2>Step 2:- General Data Sheet for Industry Establishment</h2>
    {!! Form::open(['method' => 'PATCH','url' => ['audit/updatestep', $step],'files'=>'true']) !!}
    {{ Form::hidden('a_survey_id', $a_survey_id) }}

        {{ Form::hidden('id', $ASurveys->bsurveys->id) }}



        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
         <h3>B: Area Specifications</h3>
           <div class="form-group">
                {!! Form::label('total_land_area', trans('total land area (Sqm)'), array('class' => '')) !!}
                {!! Form::text('total_land_area', $ASurveys->bsurveys->total_land_area, array('id' => 'total_land_area', 'class' => 'form-control', 'placeholder' => trans('total land area'), 'title' => trans('total land area'))) !!}
            </div>
            <div class="form-group">
                {!! Form::label('roof_top_area', trans('roof top area (Sqm)'), array('class' => '')) !!}
                {!! Form::text('roof_top_area', $ASurveys->bsurveys->roof_top_area, array('id' => 'roof top area', 'class' => 'form-control', 'placeholder' => trans('roof top area'), 'title' => trans('roof top area'))) !!}
            </div>

            <div class="form-group">
                {!! Form::label('road_paved_area', trans('road paved area (Sqm)'), array('class' => '')) !!}
                {!! Form::text('road_paved_area', $ASurveys->bsurveys->road_paved_area, array('id' => 'road paved area', 'class' => 'form-control', 'placeholder' => trans('road paved area'), 'title' => trans('road paved area'))) !!}
            </div>
            <div class="form-group">
                {!! Form::label('green_belt_area', trans('green belt area (Sqm)'), array('class' => '')) !!}
                {!! Form::text('green_belt_area', $ASurveys->bsurveys->green_belt_area, array('id' => 'green_belt_area', 'class' => 'form-control', 'placeholder' => trans('green belt area'), 'title' => trans('green belt area'))) !!}
            </div>
            <div class="form-group">
                {!! Form::label('open_land', trans('open land (Sqm)'), array('class' => '')) !!}
                {!! Form::text('open_land', $ASurveys->bsurveys->open_land, array('id' => 'open_land', 'class' => 'form-control', 'placeholder' => trans('open land'), 'title' => trans('open land'))) !!}
            </div>
        </fieldset>
        <fieldset style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <h3>GPSCoordinate:</h3>
              <div class="form-group" id="waypoint">
                {!! Form::label('GPSCoordinate_waypoint_plot', trans('Way Point Plot'), array('class' => '')) !!}
                <div class="row">
                    <div class="col-md-12 gpsCord" id="0">
                         {!! Form::text('GPSCoordinate_waypoint_plot', $ASurveys->bsurveys->GPSCoordinate_waypoint_plot, array('id' => 'GPSCoordinate_waypoint_plot', 'class' => 'form-control', 'placeholder' => trans('Way point: 085,086,087'), 'title' => trans('latitude'))) !!}
                    </div>
                 </div>
            </div>
            <div class="form-group" id="waypoint">
                {!! Form::label('GPSCoordinate_waypoint_tubewell', trans('Way Point Tubewell'), array('class' => '')) !!}
                <div class="row">
                    <div class="col-md-12 gpsCord" id="0">
                         {!! Form::text('GPSCoordinate_waypoint_tubewell', $ASurveys->bsurveys->GPSCoordinate_waypoint_tubewell, array('id' => 'GPSCoordinate_waypoint_tubewell', 'class' => 'form-control', 'placeholder' => trans('Way point: 085,086,087'), 'title' => trans('latitude'))) !!}
                    </div>
                 </div>
            </div>
            <div class="form-group" id="waypointcomment">
                {!! Form::label('GPSCoordinate_comment', trans('Comment'), array('class' => '')) !!}
                <div class="row">
                    <div class="col-md-12 gpsCord" id="GPSCoordinatecomments">
                        <textarea rows="5" cols="20" class="form-control" name="GPSCoordinate_comment" id="GPSCoordinate_comment"></textarea>
                    </div>
                 </div>
            </div>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <h3>Average Annual Rainfall :</h3>
            <div class="form-group">
                {!! Form::label('average_annual_rainfall', trans('average annual rainfall'), array('class' => '')) !!}
                {!! Form::text('average_annual_rainfall', $ASurveys->bsurveys->average_annual_rainfall, array('id' => 'average_annual_rainfall', 'class' => 'form-control', 'placeholder' => trans('average annual rainfall'), 'title' => trans('average annual rainfall'))) !!}
            </div>
            <div class="form-group">
                {!! Form::label('number_of_rainy_day', trans('number of rainy day'), array('class' => '')) !!}
                {!! Form::text('number_of_rainy_day', $ASurveys->bsurveys->number_of_rainy_day, array('id' => 'number_of_rainy_day', 'class' => 'form-control', 'placeholder' => trans('number of rainy day'), 'title' => trans('number of rainy day'))) !!}
            </div>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <h3>Nature :</h3>
            <div class="form-group">
                {!! Form::label('nature_of_aquifer', trans('nature of aquifer'), array('class' => '')) !!}
                 {{--*/ $nature_of_aquifer = explode(',', $ASurveys->bsurveys->nature_of_aquifer); /*--}}
                {!! Form::select('nature_of_aquifer', [ '' => 'Please Select Nature of
                Aquifer', 'impermeable-area' => 'Impermeable Area','non_porous_area' => 'NON Porous Area', 'hard_rock_area' => 'Hard Rock Area', 'alluvial_area' => 'Alluvial Area'], $nature_of_aquifer, array('multiple' => true,'id' => 'nature_of_aquifer', 'class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {{--*/ $a = explode(',', $ASurveys->bsurveys->nature_of_terrain); /*--}}

                {!! Form::label('nature_of_terrain', trans('nature of terrain'), array('class' => '')) !!}
                {!! Form::select('nature_of_terrain', [ '' => 'Please Select Nature of
                Terrain', 'Hilly' => 'Hilly','Rocky' => 'Rocky', 'Undulating' => 'Undulating', 'Uniform' => 'Uniform', 'Flat' => 'Flat'], $a, array('multiple' => true,'id' => 'nature_of_terrain', 'class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nature_of_soil', trans('nature of soil'), array('class' => '')) !!}
                {!! Form::select('nature_of_soil', [ '' => 'Please Select Nature of
                Soil', 'alluvial' => 'Alluvial','sandy' => 'Sandy', 'loamy' => 'Loamy', 'gravel' => 'Gravel', 'silty' => 'Silty'], array($ASurveys->bsurveys->nature_of_soil), array('id' => 'nature_of_soil', 'class' => 'form-control')) !!}
            </div>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <h3>Recharge :</h3>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::label('recharge_well_depth', trans('recharge well depth(m)'), array('class' => '')) !!}
                        {!! Form::text('recharge_well_depth', $ASurveys->bsurveys->recharge_well_depth, array('id' => 'recharge_well_depth', 'class' => 'form-control', 'placeholder' => trans('recharge well depth'), 'title' => trans('recharge well depth'))) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('recharge_well_diameter', trans('recharge well diameter(m)'), array('class' => '')) !!}
                        {!! Form::text('recharge_well_diameter', $ASurveys->bsurveys->recharge_well_diameter, array('id' => 'recharge_well_diameter', 'class' => 'form-control', 'placeholder' => trans('recharge well diameter'), 'title' => trans('recharge well diameter'))) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::label('recharge_pit_depth', trans('recharge pit depth(m)'), array('class' => '')) !!}
                        {!! Form::text('recharge_pit_depth', $ASurveys->bsurveys->recharge_pit_depth, array('id' => 'recharge_pit_depth', 'class' => 'form-control', 'placeholder' => trans('recharge pit depth'), 'title' => trans('recharge pit depth'))) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('recharge_pit_diameter', trans('recharge pit diameter(m)'), array('class' => '')) !!}
                        {!! Form::text('recharge_pit_diameter', $ASurveys->bsurveys->recharge_pit_diameter, array('id' => 'recharge_pit_diameter', 'class' => 'form-control', 'placeholder' => trans('recharge pit diameter'), 'title' => trans('recharge pit diameter'))) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        {!! Form::label('recharge_trenches_l', trans('recharge_trenches {l)'), array('class' => '')) !!}
                        {!! Form::text('recharge_trenches_l', $ASurveys->bsurveys->recharge_trenches_l, array('id' => 'recharge_trenches_l', 'class' => 'form-control', 'placeholder' => trans('recharge_trenches_l'), 'title' => trans('recharge_trenches_l'))) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('recharge_trenches_w', trans('recharge trenches (w)'), array('class' => '')) !!}
                        {!! Form::text('recharge_trenches_w', $ASurveys->bsurveys->recharge_trenches_w, array('id' => 'recharge_trenches_w', 'class' => 'form-control', 'placeholder' => trans('recharge trenches w'), 'title' => trans('recharge trenches w'))) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('recharge_trenches_d', trans('recharge trenches (d)'), array('class' => '')) !!}
                        {!! Form::text('recharge_trenches_d', $ASurveys->bsurveys->recharge_trenches_d, array('id' => 'recharge_trenches_d', 'class' => 'form-control', 'placeholder' => trans('recharge trenches d'), 'title' => trans('recharge trenches d'))) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
               <div class="row">
                    <div class="col-md-6">
                        {!! Form::label('water_bodies_ponds_depth', trans('water bodies ponds depth(m)'), array('class' => '')) !!}
                        {!! Form::text('water_bodies_ponds_depth', $ASurveys->bsurveys->water_bodies_ponds_depth, array('id' => 'water_bodies_ponds_depth', 'class' => 'form-control', 'placeholder' => trans('water bodies ponds depth'), 'title' => trans('water bodies ponds depth'))) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('water_bodies_ponds_diameter', trans('water bodies ponds diameter(m)'), array('class' => '')) !!}
                        {!! Form::text('water_bodies_ponds_diameter', $ASurveys->bsurveys->water_bodies_ponds_diameter, array('id' => 'water_bodies_ponds_diameter', 'class' => 'form-control', 'placeholder' => trans('water bodies ponds diameter'), 'title' => trans('water bodies ponds diameter'))) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <h3>C: Source of Water</h3>
            <div class="form-group">
                {!! Form::label('source_of_availability_of_surface_water', trans('source of availability of surface water'), array('class' => '')) !!}
                {!! Form::text('source_of_availability_of_surface_water', $ASurveys->bsurveys->source_of_availability_of_surface_water, array('id' => 'source_of_availability_of_surface_water', 'class' => 'form-control', 'placeholder' => trans('source of availability of surface water'), 'title' => trans('source of_availability of surface water'))) !!}
            </div>
            <fieldset>
                <h4>Source of Ground water (** General Water Level – Village wise)</h4>
                <div class="set1 alert1 alert" data-count="0" style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
                    <div class="form-group">
                        {!! Form::label('tubewell_borewell', trans('tubewell borewell'), array('class' => '')) !!}
                        {!! Form::select('tubewell_borewell[]', [ '' => 'Please Select Source of Ground water', 'tubewell' => 'Tubewell','borewell' => 'Borewell'], array($bsgwaterArr[0]['tubewell_borewell']), array('id' => 'tubewell_borewell', 'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('depth_of_s_pump', trans('depth of s pump(m)'), array('class' => '')) !!}
                        {!! Form::text('depth_of_s_pump[]', $bsgwaterArr[0]['depth_of_s_pump'], array('id' => 'depth_of_s_pump', 'class' => 'form-control', 'placeholder' => trans('depth of s pump'), 'title' => trans('depth of s pump'))) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('current_water_abstraction', trans('current water abstraction (Discharge x working hr)'), array('class' => '')) !!}
                        {!! Form::text('current_water_abstraction[]', $bsgwaterArr[0]['current_water_abstraction'], array('id' => 'current_water_abstraction', 'class' => 'form-control', 'placeholder' => trans('current water abstraction'), 'title' => trans('current water abstraction'))) !!}
                    </div>
                </div>
                <div class="set2 hide alert1 alert alert-success" style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
                    <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="form-group">
                        {!! Form::label('tubewell_borewell', trans('tubewell borewell'), array('class' => '')) !!}
                        {!! Form::select('tubewell_borewell[]', [ '' => 'Please Select Source of Ground water', 'tubewell' => 'Tubewell','borewell' => 'Borewell'], array($bsgwaterArr[1]['tubewell_borewell']), array('id' => 'tubewell_borewell', 'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('depth_of_s_pump', trans('depth of s pump'), array('class' => '')) !!}
                        {!! Form::text('depth_of_s_pump[]', $bsgwaterArr[1]['current_water_abstraction'], array('id' => 'depth_of_s_pump', 'class' => 'form-control', 'placeholder' => trans('depth of s pump'), 'title' => trans('depth of s pump'))) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('current_water_abstraction', trans('current water abstraction'), array('class' => '')) !!}
                        {!! Form::text('current_water_abstraction[]', $bsgwaterArr[1]['current_water_abstraction'], array('id' => 'current_water_abstraction', 'class' => 'form-control', 'placeholder' => trans('current water abstraction'), 'title' => trans('current water abstraction'))) !!}
                    </div>
                </div>
               <div class="set3 hide alert1 alert alert-info" style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="form-group">
                        {!! Form::label('tubewell_borewell', trans('tubewell borewell'), array('class' => '')) !!}
                        {!! Form::select('tubewell_borewell[]', [ '' => 'Please Select Source of Ground water', 'tubewell' => 'Tubewell','borewell' => 'Borewell'], array($bsgwaterArr[2]['tubewell_borewell']), array('id' => 'tubewell_borewell', 'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('depth_of_s_pump', trans('depth of s pump'), array('class' => '')) !!}
                        {!! Form::text('depth_of_s_pump[]', $bsgwaterArr[2]['depth_of_s_pump'], array('id' => 'depth_of_s_pump', 'class' => 'form-control', 'placeholder' => trans('depth of s pump'), 'title' => trans('depth of s pump'))) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('current_water_abstraction', trans('current water abstraction'), array('class' => '')) !!}
                        {!! Form::text('current_water_abstraction[]', $bsgwaterArr[2]['current_water_abstraction'], array('id' => 'current_water_abstraction', 'class' => 'form-control', 'placeholder' => trans('current water abstraction'), 'title' => trans('current water abstraction'))) !!}
                    </div>
                </div>
                <div class="set4 hide alert1 alert alert-warning" style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="form-group">
                        {!! Form::label('tubewell_borewell', trans('tubewell borewell'), array('class' => '')) !!}
                        {!! Form::select('tubewell_borewell[]', [ '' => 'Please Select Source of Ground water', 'tubewell' => 'Tubewell','borewell' => 'Borewell'], array($bsgwaterArr[3]['tubewell_borewell']), array('id' => 'tubewell_borewell', 'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('depth_of_s_pump', trans('depth of s pump'), array('class' => '')) !!}
                        {!! Form::text('depth_of_s_pump[]', $bsgwaterArr[3]['depth_of_s_pump'], array('id' => 'depth_of_s_pump', 'class' => 'form-control', 'placeholder' => trans('depth of s pump'), 'title' => trans('depth of s pump'))) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('current_water_abstraction', trans('current water abstraction'), array('class' => '')) !!}
                        {!! Form::text('current_water_abstraction[]', $bsgwaterArr[3]['current_water_abstraction'], array('id' => 'current_water_abstraction', 'class' => 'form-control', 'placeholder' => trans('current water abstraction'), 'title' => trans('current water abstraction'))) !!}
                    </div>
                </div>

                <a href="javascript:void(0);" id="addmore">Add more...</a>
            </fieldset>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <h3>Uploads :</h3>
             @include('layouts.partial.file_upload_fields')
        </fieldset>

        <fieldset style="margin-top: 20px;margin-bottom: 5px;">
          <input type="submit" name="submit" class="next btn btn-info" value="Submit" />
        </fieldset>
    {!! Form::close() !!}
    </div>
    <div class="col-md-1"></div>
</div>
<!-- Laravel Javascript Validation -->
 <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
 {!! $BSurveyValidationRules !!}
<script type="text/javascript">
    var c = $('.set1').data('count');
    $('#addmore').click(function() {
       c += 1;
       $('.set1').attr('data-count',c);
        $('.set'+c).removeClass('hide');
        if(c > 3){
            $('#addmore').addClass('hide');
        }
    });
    $('.close').click(function() {
        c -= 1;
        $('.set1').attr('data-count',c);
        if($('.set1').data('count') < 4){
            $('#addmore').removeClass('hide');
        }
        $(this).parent('div').addClass('hide');
    });
    $('select#area_type').on('change', function() {
        var pointCordinates = $('select#area_type option[value="'+this.value+'"]').attr('data-point');
        console.log(pointCordinates);
        $("#gps .row .gpsCord").addClass('hide');
        for (i = 0; i < pointCordinates; i++) {
            $("#gps .row #"+i).removeClass('hide');
        }
    });
</script>
@endsection
