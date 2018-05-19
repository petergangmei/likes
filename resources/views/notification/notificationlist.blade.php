@extends('layouts.app2')
@section('content')


@if(count($datas)> 0)

<ul class="list-group">
	@foreach($datas as $data)
  <li class="list-group-item">
  	
  		@if($data->img == 'null')
        <img src="/public/storage/default_image/avatar.png " class="noti-ico float-left">
  		@else
        <img src="/public/storage/profile_image/{{$data->visitor_id}}/{{$data->img}} " class="noti-ico float-left">
  		@endif
		<a href="/profileid-{{$data->visitor_id}}"><span class="margin-" style="margin-left: 5px;"><b>{{$data->visitor_name}}</b> </span> </a> {{$data->data}}<br>

        <small class="margin-left">{{Carbon\Carbon::createFromTimestamp(strtotime($data->created_at))->diffForHumans()}}</small>
  </li>
	@endforeach  	

</ul>

@else

<ul class="list-group text-center">
  
  <li class="list-group-item">

No Notification..
  </li>

</ul>
	

@endif




@endsection