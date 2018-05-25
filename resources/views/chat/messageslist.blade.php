@extends('layouts.app_messageslist')
@section('content')
<div class="container">
@if(count($messages)>0)
<!-- {{count($messages)}} -->
<div id="message">
@foreach($messages as $message)
@foreach($user2 as $u)
 		@if($u->id == $message->uid2)
 		@if($message->seen == 'unseen')
 		<b>
		<a class="disable-linkstyle" href="/messages/{{$message->user2}}{{$message->uid2}}">
		 <div class="card" id="">
		 	<div class="card-body">
		        <img src="/public/storage/profile_image/{{$message->uid2}}/{{$u->profile_image}} " class="" style="width: 50px; height: 50px; border-radius: 100%; border: 1px solid black;">
		 		{{$message->user2}}
		 		<i class="fa fa-envelope float-right" style="font-size: 20px; margin-top: 15px;"></i>

		 	</div>
		 </div>
		</a>
		</b>	
		@else
	<a class="disable-linkstyle" href="/messages/{{$message->user2}}{{$message->uid2}}">
		 <div class="card" id="message2">
		 	<div class="card-body">
		        <img src="/public/storage/profile_image/{{$message->uid2}}/{{$u->profile_image}} " class="" style="width: 50px; height: 50px; border-radius: 100%; border: 1px solid black;">
		 		{{$message->user2}} <i class="fa fa-envelope-open-o float-right" style="font-size: 20px; margin-top: 15px;"></i>

		 	</div>
		 </div>
		</a>	

 		@endif
 		@endif

 @endforeach
 @endforeach
 </div>
@else
not
@endif

	@csrf

<input type="hidden" id="uid2" value="{{auth()->user()->id}}">

</div>
@endsection