@extends('layouts.app_messageslist')
@section('content')
<div class="container">
@if(count($messages)>0)
@foreach($messages as $message)
@foreach($user2 as $u)
 <div class="card">
 	<div class="card-body">
 		@if($u->id == $message->uid2)
 	

        <img src="/public/storage/profile_image/{{$message->uid2}}/{{$u->profile_image}} " class="profile-pic">

 		@endif
 		{{$message->user2}}
 	</div>
 </div>
 @endforeach
 @endforeach
@else
not
@endif


</div>
@endsection