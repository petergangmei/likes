@extends('layouts.app_swipes')
@section('content')
<div class="" style="border:0px solid black; width:100%; height:100%; ; background-color:white;">

  <div class="bblack" id='' style="width:100%; height:90%; position:absolute; ">

    <div style="border:0px solid black; text-align: center; height: 80%;">
    	
    	<div style="margin-top: 50%; font-size: 23px;">No more. (@-@)<br>
    	checkout later...</div>
    </div><br>
    <div class="bbar" >

    </div>  
  </div>


 @foreach($users as $user)
  <div class="bblack" id='{{$user->id}}' style="width:100%; height:100%; position:absolute; background-image: url(/public/storage/profile_image/{{$user->id}}/{{$user->profile_image}});     background-repeat: no-repeat;  background-position: center; background-size: 100% 100%;">
    <div class="bio">
      <a href="/profileid-{{$user->id}}" style="text-decoration: none; color: black;"><b>{{$user->name}}</b></a>, <small>{{$user->location}}</small>
    </div>
    <div style="border:0px solid black; height: 80%;" src=""></div><br>
    <div class="bbar" >
	     <button class="x-btn dislikebtn" id="{{$user->id}}" style="background-color:red; color:white;">
	      <i class="fa fa-close"></i>
	  	</button>
	    <button class="x-btn likebtn" id="{{$user->id}}" style="background-color:green; color:white;">
	      <i class="fa fa-check"></i>
	    </button>
    </div>  
  </div>
  @endforeach
  
</div>
  


@endsection
