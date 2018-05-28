@extends('layouts.app_messageindex')
@section('content')
<div class="container">
@if(count($messages)>0)
<div class="card"  id="messagecontent">
	@foreach($messages as $message)
		@if($message->sender_username == $username )
	<div class="card-body" > 
	<img src="/public/storage/profile_image/{{$userimg->id}}/{{$userimg->profile_image}}" style="width: 50px; height: 50px; border-radius: 100%; position: absolute; margin: -18px -19px;"> 		
	 	<div style="border: 1px solid silver; margin-left:30px; margin-top: -10px; padding: 5px; float: left; border-radius: 10px; max-width: 90%;;">
	 		{{$message->message}}
	 	</div>
	</div>
		@else
	<div class="card-body text-" style="float: right;" > 
	 	<div style="border: 1px solid silver; padding: 5px; float: right;  border-radius: 10px; max-width: 90%; ;">{{$message->message}}
	 	</div>
	</div>
		@endif
	@endforeach
<br><br>
</div>

@else
<div class="" id="messagecontent2">
	<div class="text-center"> 
	<small><p>Start conversation with <br> <b>{{$username}}</b></p></small>
	</div>
</div>

@endif



	@csrf
<textarea class="form-control fixed-bottom" placeholder="Message" id="message" name="message" style="margin: 0px 0px; height:50px; width: 80%; border: 1px solid silver; border-right: 0px solid black !important; border-bottom: 0px solid black !important; border-radius: 0 !important; ">
</textarea>
<!-- <input type="hidden" name="username" value="{{$username}}"> -->

<input type="hidden" name="user2" id="user2" value="{{$user2}}">
<input type="hidden"  id="uid2" value="{{$uid2}}">

<button type="button" class="btn btn-outline-primary fixed-bottom" id="sendMessageBtn" style="margin: 0px 80%; width: 20%; height:50px; border: 1px solid silver; border-radius: 0 !important; border-left: 0px solid black !important;"><i class="fa fa-send" style="font-size: 23px;"></i>
</button>

@endsection