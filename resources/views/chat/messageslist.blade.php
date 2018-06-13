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
		<a class="disable-linkstyle" href="/messages/{{$message->user2}}/{{$message->uid2}}" style="text-decoration: none;  color: black;">
		 <div class="card" id="">
		 	<div class="card-body">
		 		@if($u->profile_image == "null")
				<img src="/public/storage/default_image/avatar.png " class="" style="width: 50px; height: 50px; border-radius: 100%; border: 1px solid black;">

		        @else
				<img src="/public/storage/profile_image/{{$message->uid2}}/{{$u->profile_image}} " class="" style="width: 50px; height: 50px; border-radius: 100%; border: 1px solid black;">
				
		        @endif
		 		{{$message->user2}}
        		<small class="margin-left">{{Carbon\Carbon::createFromTimestamp(strtotime($message->updated_at))->diffForHumans()}}</small>
		 		
		 		<i class="fa fa-envelope float-right" style="font-size: 20px; margin-top: 15px;"></i>

		 	</div>
		 </div>
		</a>
		</b>	
		@else
	<a class="disable-linkstyle" href="/messages/{{$message->user2}}/{{$message->uid2}}" style="text-decoration: none; color: black;">
		 <div class="card" id="">
		 	<div class="card-body">
		        @if($u->profile_image == "null")
				<img src="/public/storage/default_image/avatar.png " class="" style="width: 50px; height: 50px; border-radius: 100%; border: 1px solid black;">
		        @else
				<img src="/public/storage/profile_image/{{$message->uid2}}/{{$u->profile_image}} " class="" style="width: 50px; height: 50px; border-radius: 100%; border: 1px solid black;">
		        @endif
		        
		 		{{$message->user2}} <i class="fa fa-envelope-open-o float-right" style="font-size: 20px; margin-top: 15px;"></i>
        		<small class="margin-left">{{Carbon\Carbon::createFromTimestamp(strtotime($message->updated_at))->diffForHumans()}}</small>


		 	</div>
		 </div>
		</a>	

 		@endif
 		@endif

 @endforeach
 @endforeach
 </div>
@else
<div id="message">
<div class="text-center">
	<p>There is not conversation record found. Start chatting today!</p>
</div>
</div>


@endif

	@csrf
<input type="hidden" id="uid2" value="{{auth()->user()->id}}">

</div>
@endsection