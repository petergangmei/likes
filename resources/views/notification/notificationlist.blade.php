@extends('layouts.app2')
@section('content')


@if(count($datas)> 0)

<ul class="list-group" id="notificationlist">
	@foreach($datas as $data)
  
  <li class="list-group-item">

      @if($data->type == 'report_fphoto')
      <div style="background-color: #FF9837; padding: 10px;">
    <a href="/profileid-{{$data->visitor_id}}">
      @if($data->img == 'null')
        <img src="/public/storage/default_image/avatar.png " class="noti-ico float-left">
      
      @else
        <img src="/public/storage/profile_image/{{$data->id}}/{{$data->img}} " class="noti-ico float-left" style="border: 1px solid white;">
      @endif
    

    <span class="margin-" ><b>{{$data->visitor_name}}</b> </span> </a> 
    <a href="/photoid-{{$data->post_id}}" class="color-black" style="text-decoration: none;"> {{$data->data}}.</a>
    <br>
        <small class="margin-left">{{Carbon\Carbon::createFromTimestamp(strtotime($data->created_at))->diffForHumans()}}</small>
      </div>

      @endif

      @if($data->type == 'report_comment')

  <div style="background-color: redd; padding: 10px;">

    <a href="/profileid-{{$data->visitor_id}}" style="text-decoration: none; color:black;">
      @if($data->img == 'null')
        <img src="/public/storage/default_image/avatar.png " class="noti-ico float-left">
      
      @else
        <img src="/public/storage/profile_image/{{$data->user_id}}/{{$data->img}} " class="noti-ico float-left" style="border: 1px solid white;">
      @endif
    

    <span class="margin-" ><b>{{$data->visitor_name}}</b> </span> </a> 
    <a href="/viewpost{{$data->post_id}}" style="text-decoration: none; color: black;"> {{$data->data}}.</a>
    <br>
        <small class="margin-left">{{Carbon\Carbon::createFromTimestamp(strtotime($data->created_at))->diffForHumans()}}</small>
   </div>

      @else

  	<a href="/profileid-{{$data->visitor_id}}" style="text-decoration: none; color: #0B29E5;">
  		@if($data->img == 'null')
        <img src="/public/storage/default_image/avatar.png " class="noti-ico float-left">
      @else
        <img src="/public/storage/profile_image/{{$data->visitor_id}}/{{$data->img}} " class="noti-ico float-left">
      @endif
		

    <span class="margin-" ><b>{{$data->visitor_name}}</b> </span> </a> 
    <a href="/viewpost{{$data->post_id}}" class="color-black" style="text-decoration: none; color:  black;"> {{$data->data}}.</a>
    <br>
        <small class="margin-left">{{Carbon\Carbon::createFromTimestamp(strtotime($data->created_at))->diffForHumans()}}</small>

      @endif

  </li>
	@endforeach  	

</ul>
<br><br>
@else

<ul class="list-group text-center">
  
  <li class="list-group-item">

No Notification..
  </li>

</ul>
	

@endif

       @csrf



@endsection