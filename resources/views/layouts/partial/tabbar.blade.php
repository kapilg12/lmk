<ul class="nav nav-tabs">
  @if(Auth::user()->ability(array('superadmin'),array()) || Auth::user()->ability(array('devadmin'),array()))
  <li class="active"><a href="#settings" data-toggle="tab">A: Details of Basic Informations</a></li>
  <li><a href="#activity" data-toggle="tab">B: Area Specification</a></li>
  <li><a href="#timeline" data-toggle="tab">C: Details Of Water</a></li>
  @elseif(Auth::user()->hasRole('torrentadmin'))
    <li class="active"><a href="#activity" data-toggle="tab">B: Area Specification</a></li>
    <li><a href="#timeline" data-toggle="tab">C: Details Of Water</a></li>
  @else
    <li class="active"><a href="#settings" data-toggle="tab">A: Details of Basic Informations</a></li>
    <li><a href="#activity" data-toggle="tab">B: Area Specification</a></li>
  	<li><a href="#timeline" data-toggle="tab">C: Details Of Water</a></li>
  @endif
</ul>
