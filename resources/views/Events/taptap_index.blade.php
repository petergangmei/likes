@extends('layouts.app_swipes')
@section('content')
@csrf
<div class="contianer" style="border:0px solid black; padding: 20px;">

  <div class="bblack" id='' style="width:90%; height:75%; border:0px solid black; position:absolute; overflow: hidden; background-color: white;">

    <div style="border:0px solid black; text-align: center; height: 80%;">
    	
    	<div class="NoMoreItem" style="display: none; margin-top: 50%; font-size: 23px;">No more. (@-@)<br>
    	checkout later...</div>
    	<div class="mx-auto loader lpick" style="margin-top: 50%;"></div><br>
    	<B class="lpick">Loading...</B>

    </div><br>
    <div class="bbar" >

    </div>  
  </div>


 @foreach($users as $user)
 <div class="showbox" id='{{$user->id}}' style="display: none; box-shadow: 1px -1px 5px 0px; position: absolute; width: 90%; height:80%; padding: 15px; border:1px solid black; border-top-left-radius: 20px; border-bottom-right-radius: 20px;">
  <div class="bblack"  style=" border-top-left-radius: 20px; border-bottom-right-radius: 20px; border:0px solid black; width:90%; height:87%; position:absolute; background-image: url(/public/storage/profile_image/{{$user->id}}/{{$user->profile_image}});   background-repeat: no-repeat;  background-position: center; background-size: 100% 100%;">
    <div class="bio">
      <a href="/profileid-{{$user->id}}" style="text-decoration: none; color: black;"><b>{{$user->name}}</b></a>, <small>{{$user->location}}</small>
    </div>
    <div class="SupperLikeCss SupperLikeHide" id="SupperLikeCss-{{$user->id}}">
    	<h2>Supper Like!</h2>
    </div>
    <!-- <div style="border:0px solid black; height: 80%;" src=""></div> -->
    <div class="bbar" >
	     <button class="x-btn dislikebtn" id="{{$user->id}}" style="background-color:red; color:white;">
	      <i class="fa fa-close"></i>
	      Dislike
	  	</button>
	    <button class="x-btn likebtn" id="{{$user->id}}" style="background-color:green; color:white;">

	      <i class="fa fa-check"></i>
	      Like
	    </button>
	<a href="/profileid-{{$user->id}}" >
		<button type="button" class="btn btn-outline-primary sbtn" style="margin-top: 5px;">Visit Profile</button>
	</a>
		<button type="button" class="btn btn-outline-primary sbtn SupperLike" id="{{$user->id}}" style="margin-top: 5px;">Supper like</button>

    </div> 
  </div>
 </div>
  @endforeach
  
</div>
</div>  


@endsection
