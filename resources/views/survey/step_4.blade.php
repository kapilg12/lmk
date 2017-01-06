@extends('layouts.survey')
@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

    <h2>Step 3:- Data Sheet for Medium / Large Scale Industries and WATER Instensive Inds</h2>
    {!! Form::open() !!}
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <div class="set1">
                <div class="form-group">
                    {!! Form::label('breakup_of_recycled_water_usage', trans('Breakup of Recycled water usage:'), array('class' => '')) !!}
                    {!! Form::select('breakup_of_recycled_water_usage[]',
                    [ '' => 'Please Select Breakup of Recycled water usage',
                    'Total waste water generated' => 'Total waste water generated',
                    'Quantity of treated water generated ' => 'Quantity of treated water generated',
                    'Reuse in Industrial activity ' => 'Reuse in Industrial activity',
                    'Reuse in green belt development ' => 'Reuse in green belt development',
                    'Domestic ' => 'Domestic',
                    'Other uses ' => 'Other uses',
                    'Total Treated water utilised ' => 'Total Treated water utilised',
                    'Water Testing Report of Treated Water ' => 'Water Testing Report of Treated Water'],

                    null, array('id' => 'breakup_of_recycled_water_usage', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_day', trans('Cum/day'), array('class' => '')) !!}
                    {!! Form::text('cum_day[]', null, array('id' => 'cum_day', 'class' => 'form-control', 'placeholder' => trans('Cum/day'), 'title' => trans('Cum/day'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_year', trans('Cum/Year'), array('class' => '')) !!}
                    {!! Form::text('cum_year[]', null, array('id' => 'cum_year', 'class' => 'form-control', 'placeholder' => trans('Cum/Year'), 'title' => trans('Cum/Year'), 'autocomplete' => 'off')) !!}
                </div>
            </div>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <div class="set2">
                <div class="form-group">
                    {!! Form::label('breakup_of_recycled_water_usage', trans('Breakup of Recycled water usage:'), array('class' => '')) !!}
                    {!! Form::select('breakup_of_recycled_water_usage[]',
                    [ '' => 'Please Select Breakup of Recycled water usage',
                    'Total waste water generated' => 'Total waste water generated',
                    'Quantity of treated water generated ' => 'Quantity of treated water generated',
                    'Reuse in Industrial activity ' => 'Reuse in Industrial activity',
                    'Reuse in green belt development ' => 'Reuse in green belt development',
                    'Domestic ' => 'Domestic',
                    'Other uses ' => 'Other uses',
                    'Total Treated water utilised ' => 'Total Treated water utilised',
                    'Water Testing Report of Treated Water ' => 'Water Testing Report of Treated Water'],

                    null, array('id' => 'breakup_of_recycled_water_usage', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_day', trans('Cum/day'), array('class' => '')) !!}
                    {!! Form::text('cum_day[]', null, array('id' => 'cum_day', 'class' => 'form-control', 'placeholder' => trans('Cum/day'), 'title' => trans('Cum/day'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_year', trans('Cum/Year'), array('class' => '')) !!}
                    {!! Form::text('cum_year[]', null, array('id' => 'cum_year', 'class' => 'form-control', 'placeholder' => trans('Cum/Year'), 'title' => trans('Cum/Year'), 'autocomplete' => 'off')) !!}
                </div>
            </div>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
           <div class="set3">
               <div class="form-group">
                    {!! Form::label('breakup_of_recycled_water_usage', trans('Breakup of Recycled water usage:'), array('class' => '')) !!}
                    {!! Form::select('breakup_of_recycled_water_usage[]',
                    [ '' => 'Please Select Breakup of Recycled water usage',
                    'Total waste water generated' => 'Total waste water generated',
                    'Quantity of treated water generated ' => 'Quantity of treated water generated',
                    'Reuse in Industrial activity ' => 'Reuse in Industrial activity',
                    'Reuse in green belt development ' => 'Reuse in green belt development',
                    'Domestic ' => 'Domestic',
                    'Other uses ' => 'Other uses',
                    'Total Treated water utilised ' => 'Total Treated water utilised',
                    'Water Testing Report of Treated Water ' => 'Water Testing Report of Treated Water'],

                    null, array('id' => 'breakup_of_recycled_water_usage', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_day', trans('Cum/day'), array('class' => '')) !!}
                    {!! Form::text('cum_day[]', null, array('id' => 'cum_day', 'class' => 'form-control', 'placeholder' => trans('Cum/day'), 'title' => trans('Cum/day'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_year', trans('Cum/Year'), array('class' => '')) !!}
                    {!! Form::text('cum_year[]', null, array('id' => 'cum_year', 'class' => 'form-control', 'placeholder' => trans('Cum/Year'), 'title' => trans('Cum/Year'), 'autocomplete' => 'off')) !!}
                </div>
            </div>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <div class="set4">
                <div class="form-group">
                    {!! Form::label('breakup_of_recycled_water_usage', trans('Breakup of Recycled water usage:'), array('class' => '')) !!}
                    {!! Form::select('breakup_of_recycled_water_usage[]',
                    [ '' => 'Please Select Breakup of Recycled water usage',
                    'Total waste water generated' => 'Total waste water generated',
                    'Quantity of treated water generated ' => 'Quantity of treated water generated',
                    'Reuse in Industrial activity ' => 'Reuse in Industrial activity',
                    'Reuse in green belt development ' => 'Reuse in green belt development',
                    'Domestic ' => 'Domestic',
                    'Other uses ' => 'Other uses',
                    'Total Treated water utilised ' => 'Total Treated water utilised',
                    'Water Testing Report of Treated Water ' => 'Water Testing Report of Treated Water'],

                    null, array('id' => 'breakup_of_recycled_water_usage', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_day', trans('Cum/day'), array('class' => '')) !!}
                    {!! Form::text('cum_day[]', null, array('id' => 'cum_day', 'class' => 'form-control', 'placeholder' => trans('Cum/day'), 'title' => trans('Cum/day'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_year', trans('Cum/Year'), array('class' => '')) !!}
                    {!! Form::text('cum_year[]', null, array('id' => 'cum_year', 'class' => 'form-control', 'placeholder' => trans('Cum/Year'), 'title' => trans('Cum/Year'), 'autocomplete' => 'off')) !!}
                </div>
            </div>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <div class="set5">
                <div class="form-group">
                    {!! Form::label('breakup_of_recycled_water_usage', trans('Breakup of Recycled water usage:'), array('class' => '')) !!}
                    {!! Form::select('breakup_of_recycled_water_usage[]',
                    [ '' => 'Please Select Breakup of Recycled water usage',
                    'Total waste water generated' => 'Total waste water generated',
                    'Quantity of treated water generated ' => 'Quantity of treated water generated',
                    'Reuse in Industrial activity ' => 'Reuse in Industrial activity',
                    'Reuse in green belt development ' => 'Reuse in green belt development',
                    'Domestic ' => 'Domestic',
                    'Other uses ' => 'Other uses',
                    'Total Treated water utilised ' => 'Total Treated water utilised',
                    'Water Testing Report of Treated Water ' => 'Water Testing Report of Treated Water'],

                    null, array('id' => 'breakup_of_recycled_water_usage', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_day', trans('Cum/day'), array('class' => '')) !!}
                    {!! Form::text('cum_day[]', null, array('id' => 'cum_day', 'class' => 'form-control', 'placeholder' => trans('Cum/day'), 'title' => trans('Cum/day'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_year', trans('Cum/Year'), array('class' => '')) !!}
                    {!! Form::text('cum_year[]', null, array('id' => 'cum_year', 'class' => 'form-control', 'placeholder' => trans('Cum/Year'), 'title' => trans('Cum/Year'), 'autocomplete' => 'off')) !!}
                </div>
            </div>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <div class="set6">
                <div class="form-group">
                    {!! Form::label('breakup_of_recycled_water_usage', trans('Breakup of Recycled water usage:'), array('class' => '')) !!}
                    {!! Form::select('breakup_of_recycled_water_usage[]',
                    [ '' => 'Please Select Breakup of Recycled water usage',
                    'Total waste water generated' => 'Total waste water generated',
                    'Quantity of treated water generated ' => 'Quantity of treated water generated',
                    'Reuse in Industrial activity ' => 'Reuse in Industrial activity',
                    'Reuse in green belt development ' => 'Reuse in green belt development',
                    'Domestic ' => 'Domestic',
                    'Other uses ' => 'Other uses',
                    'Total Treated water utilised ' => 'Total Treated water utilised',
                    'Water Testing Report of Treated Water ' => 'Water Testing Report of Treated Water'],

                    null, array('id' => 'breakup_of_recycled_water_usage', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_day', trans('Cum/day'), array('class' => '')) !!}
                    {!! Form::text('cum_day[]', null, array('id' => 'cum_day', 'class' => 'form-control', 'placeholder' => trans('Cum/day'), 'title' => trans('Cum/day'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_year', trans('Cum/Year'), array('class' => '')) !!}
                    {!! Form::text('cum_year[]', null, array('id' => 'cum_year', 'class' => 'form-control', 'placeholder' => trans('Cum/Year'), 'title' => trans('Cum/Year'), 'autocomplete' => 'off')) !!}
                </div>
            </div>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
           <div class="set7">
               <div class="form-group">
                    {!! Form::label('breakup_of_recycled_water_usage', trans('Breakup of Recycled water usage:'), array('class' => '')) !!}
                    {!! Form::select('breakup_of_recycled_water_usage[]',
                    [ '' => 'Please Select Breakup of Recycled water usage',
                    'Total waste water generated' => 'Total waste water generated',
                    'Quantity of treated water generated ' => 'Quantity of treated water generated',
                    'Reuse in Industrial activity ' => 'Reuse in Industrial activity',
                    'Reuse in green belt development ' => 'Reuse in green belt development',
                    'Domestic ' => 'Domestic',
                    'Other uses ' => 'Other uses',
                    'Total Treated water utilised ' => 'Total Treated water utilised',
                    'Water Testing Report of Treated Water ' => 'Water Testing Report of Treated Water'],

                    null, array('id' => 'breakup_of_recycled_water_usage', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_day', trans('Cum/day'), array('class' => '')) !!}
                    {!! Form::text('cum_day[]', null, array('id' => 'cum_day', 'class' => 'form-control', 'placeholder' => trans('Cum/day'), 'title' => trans('Cum/day'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_year', trans('Cum/Year'), array('class' => '')) !!}
                    {!! Form::text('cum_year[]', null, array('id' => 'cum_year', 'class' => 'form-control', 'placeholder' => trans('Cum/Year'), 'title' => trans('Cum/Year'), 'autocomplete' => 'off')) !!}
                </div>
            </div>
        </fieldset>
        <fieldset  style="border: 1px solid #ccc;border-radius: 4px;padding: 20px;margin-bottom: 5px;">
            <div class="set8">
                <div class="form-group">
                    {!! Form::label('breakup_of_recycled_water_usage', trans('Breakup of Recycled water usage:'), array('class' => '')) !!}
                    {!! Form::select('breakup_of_recycled_water_usage[]',
                    [ '' => 'Please Select Breakup of Recycled water usage',
                    'Total waste water generated' => 'Total waste water generated',
                    'Quantity of treated water generated ' => 'Quantity of treated water generated',
                    'Reuse in Industrial activity ' => 'Reuse in Industrial activity',
                    'Reuse in green belt development ' => 'Reuse in green belt development',
                    'Domestic ' => 'Domestic',
                    'Other uses ' => 'Other uses',
                    'Total Treated water utilised ' => 'Total Treated water utilised',
                    'Water Testing Report of Treated Water ' => 'Water Testing Report of Treated Water'],

                    null, array('id' => 'breakup_of_recycled_water_usage', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_day', trans('Cum/day'), array('class' => '')) !!}
                    {!! Form::text('cum_day[]', null, array('id' => 'cum_day', 'class' => 'form-control', 'placeholder' => trans('Cum/day'), 'title' => trans('Cum/day'), 'autocomplete' => 'off')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cum_year', trans('Cum/Year'), array('class' => '')) !!}
                    {!! Form::text('cum_year[]', null, array('id' => 'cum_year', 'class' => 'form-control', 'placeholder' => trans('Cum/Year'), 'title' => trans('Cum/Year'), 'autocomplete' => 'off')) !!}
                </div>
            </div>
        </fieldset>
        <fieldset style="margin-top: 20px;margin-bottom: 5px;">
          <input type="submit" name="submit" class="next btn btn-info" value="Submit" />
        </fieldset>
    {!! Form::close() !!}
    </div>
    <div class="col-md-2"></div>
</div>
@endsection
