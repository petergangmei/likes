@extends('layouts.app_messageindex')
@section('content')

<div class="container">
	@csrf
@if(count($messages)>0)
<div class="card"  id="messagecontent">
	@foreach($messages as $message)
		@if($message->sender_username != $userimg->id )
	<div class="card-body" > 
		@if($userimg->profile_image == 'null')
		<img src="/public/storage/default_image/avatar.png" style="width: 50px; height: 50px; border-radius: 100%; position: absolute; margin: -18px -19px;">
		@else
		<img src="/public/storage/profile_image/{{$userimg->id}}/{{$userimg->profile_image}}" style="width: 50px; height: 50px; border-radius: 100%; position: absolute; margin: -18px -19px;">
		@endif

	 	<div style="border: 1px solid silver; margin-left:30px; margin-top: -10px; padding: 5px; float: left; border-radius: 10px; max-width: 90%;;">
	 		@if($message->deleted != 'true')
	 		{{$message->message}}
	 		@else
	 		<small style="color: red;">Message deleted</small>
	 		@endif
	 	</div>
	</div>
		@else
	<div class="card-body " style="float: right;" > 
		@if($message->deleted != 'true')
	 	<div class="msgid" id="{{$message->id}}" data-toggle="modal" data-target="#delete-{{$message->id}}" style="border: 1px solid silver; background-color: #F6FFF7; padding: 5px; float: right;  border-radius: 10px; max-width: 90%; ;">
	 		@else
		<div class="msgid" id="{{$message->id}}"  style="border: 1px solid silver; background-color: #F6FFF7; padding: 5px; float: right;  border-radius: 10px; max-width: 90%; ;">
	 		@endif

	 		@if($message->deleted != 'true')
	 		{{$message->message}}
	 		@else
	 		<small style="color: red;">Message deleted</small>
	 		@endif

	 	</div>
	</div>
	<div class="modal fade" id="delete-{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered text-center" role="document">
		    <div class="modal-content ">
		        
		        <div class="modal-body mx-auto">
		            Delete message?<br><br>
			 	<a href="/deletemessage/{{$message->id}}" style="color: black;">
		        <button type="button" class="btn btn-danger">Delete</button> 
		        </a>   
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>    
		        </div>

		    </div>
		  </div>
		</div>

		@endif
	@endforeach


<br><br>
</div>

@else
<div class="" id="messagecontent2">
	<div class="text-center"> 
	<small id="greating"><p>Start conversation with <br> <b>{{$userimg->name}}</b></p></small>

	<br>
	<br>
	<br>
	<br>
	<span id="privacymessage_div" style="display: none;"><b>{{$userimg->name}}</b> <span id="privacymessage">have received the allowance number of messages for today.</span></span>
	</div>
</div>

@endif

<textarea class="form-control fixed-bottom" placeholder="Message" id="message" name="message" style="margin: 0px 0px; height:50px; width: 80%; border: 1px solid silver; border-right: 0px solid black !important; border-bottom: 0px solid black !important; border-radius: 0 !important; ">
</textarea>


<input type="hidden" name="user2" id="user2" value="{{$userimg->name}}">
<input type="hidden" name id="uid2" value="{{$uid2}}">

<button type="button" class="btn btn-outline-primary fixed-bottom" id="sendMessageBtn" style="margin: 0px 80%; width: 20%; height:50px; border: 1px solid silver; border-radius: 0 !important; border-left: 0px solid black !important;"><i class="fa fa-send" style="font-size: 23px;"></i>
</button>

<script>


    	$(function(){

	var longpress = 300;
	var start;

	  $( ".msgid" ).mousedown(function(){
	  	start = new Date().getTime();
	  });
	  $('.msgid').mouseleave(function(){
	  	start = 0;
	  });
	  $('.msgid').mouseup(function(){
        var msgid = ($(this).attr("id"));

		if(new Date().getTime() >= (start + longpress)){
			alert(msgid);
			}

	  });


      });

        // $(this).click(function(){

        // var token = $('input[name=_token ').val();
        // var post_id = $(this).val();
        // alert(msgid);


    // });
</script>
@endsection