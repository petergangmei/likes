@extends('layouts.app_events')
@section('content')
@csrf
<div class="card" style="text-align: center; margin-top: 4px;">
  <div class="card-body event_list">
   <!-- <i class="fa fa-newspaper-o" style="font-size: 20px; float: left;"></i> --> Event Dashboard <i class="indev_mark">(in dev)</i>
  </div>
  <a href="/taptapevent" style="text-decoration: none;color: black;">
  <div class="card-body event_list">
    Tap-Tap Events. <i class="indev_mark">(in dev)</i>
  </div>
  </a>
  
  <div class="card-body  ">
    Wishper  <i class="indev_mark">(in dev)</i>
  </div>

</div>
<small><i>*Note:- (in dev) = under development</i></small>

@endsection
