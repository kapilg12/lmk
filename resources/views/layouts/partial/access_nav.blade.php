<div class="col-md-4"></div>
<div class="col-md-4"></div>
<div class="col-md-4">
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <button type="button" class="btn btn-primary @if($ASurveys->is_active) disabled @endif" @if(!$ASurveys->is_active) onclick="changeMe('active',{{$ASurveys->id}});"@endif>Active</button>
        <!-- Contextual button for informational alert messages -->
        @if($ASurveys->is_active)
        <button type="button" class="btn btn-info @if($ASurveys->is_approved) disabled @endif" @if(!$ASurveys->is_approved) onclick="changeMe('approve',{{$ASurveys->id}});"@endif>Approve</button>
        <!-- Indicates caution should be taken with this action -->
        @if($ASurveys->is_approved)
        <button type="button" class="btn btn-warning @if($ASurveys->is_completed) disabled @endif" @if(!$ASurveys->is_completed)onclick="changeMe('completed',{{$ASurveys->id}});"@endif>Completed</button>
        <!-- Indicates a successful or positive action -->
        @if($ASurveys->is_completed)
        <button type="button" class="btn btn-success @if($ASurveys->is_certified) disabled @endif" @if(!$ASurveys->is_certified)onclick="changeMe('certified',{{$ASurveys->id}});"@endif>Certified</button>
        @endif
        @endif
        @endif
</div>
