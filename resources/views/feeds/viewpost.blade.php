@extends('layouts.app5')
@section('content')
<div class="card">
<div class="card-body">
	    @csrf

	<!-- <i class="	fa fa-ellipsis-v cursor-pointer" style="float: right;"></i> -->
    @if($post_by->user_id == auth()->user()->id)
    <i class="fa fa-ellipsis-v cursor-pointer color-black" style="font-size: 20px; float: right;" data-toggle="modal" data-target="#Model_auth" ></i> 
    @else
    <i class="fa fa-ellipsis-v cursor-pointer color-black" style="font-size: 20px; float: right;" data-toggle="modal" data-target="#Model_guest" ></i> 
    @endif
	{{$post->post}}
</div>
<div class="card-footer">
  	<button class="like btn btn-light cursor-pointer float-left" value="{{$post->id}}">
  	<i class="fa fa-heart-o" value="1" style="font-size: 20px;"></i>
  	</button>
  	<span class="float-left" style="margin: 4px -7px;">{{$post->likes}} </span>
  	<a href="#" class="color-black"> <i class="fa fa-comment-o cursor-pointer float-left" style="font-size: 21px; margin: 3px 7px;"></i></a>


  	<span class="float-left" style="margin: 4px -2px;">{{$post->comments}} </span>
</div>
<div class="card">
	@if(count($comments)> 0)
	@foreach($comments as $comment)
	<ul class="list-group">
  	<li class="list-group-item">

<!-- 	@guest
	<i class="fa fa-ellipsis-v cursor-pointer" style="float: right;"></i>
	    @csrf
	@else
	<i class="fa fa-ellipsis-v cursor-pointer cmt" id="{{$comment->id}}" data-toggle="modal" data-target="#Model1" style="float: right;"></i>
	@endguest -->

	@if($comment->user_id == auth()->user()->id)
    <i class="fa fa-ellipsis-v cursor-pointer color-black cmt" id="{{$comment->id}}" style="font-size: 15px; float: right;" data-toggle="modal" data-target="#Model1_auth" ></i> 
    @else
    <i class="fa fa-ellipsis-v cursor-pointer color-black reportcmt" id="{{$comment->id}}" style="font-size: 15px; float: right;" data-toggle="modal" data-target="#Model1_guest" ></i> 
    @endif


  	<a href="/profileid-{{$comment->user_id}}"><small><b>{{$comment->user_name}}</b></a>
	{{$comment->comment}}</small>
	</li>
	</ul>
	@endforeach

	@else
	@endif
	<br>

  	<form class="comment-form" method="post" action="/postcomment">
    @csrf
  		<input type="text" class="form-control float-left" placeholder="Comment" name="comment" style="width: 70%; margin: -5px 10px; height: 30px; border-radius: 10px; ">
  		<input type="hidden" name="postid" value="{{$post->id}}">
  		<input type="hidden" name="userid" value="{{$post->user_id}}">
  		<button type="submit" class="btn btn-primary btn-sm float-left" style=" margin: -5px 0px; ">Post</button>
  	</form>	
<br>
<br>
<br>
</div>


</div>

    <div class="modal fade" id="Model_auth"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width: 100%;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

			<div class="card" style="width: 100%; text-align:center;">
				<div class="card-head" style="background-color: #60C1BE; padding: 8px;"><b style="color: white;">Post</b></div>
			  <ul class="list-group list-group-flush">
			    <a href="/deletepostid-{{$post->id}}" style="text-decoration: none;">
			    <li class="list-group-item cursor-pointer color-black">Share</li></a>
			    <a href="/deletepostid-{{$post->id}}" style="text-decoration: none;">
			    <li class="list-group-item cursor-pointer color-black">Edit</li></a>
			    <a href="/deletepostid-{{$post->id}}" style="text-decoration: none;">
			    <li class="list-group-item cursor-pointe color-black">Delete</li></a>
			  </ul>
			</div>
          </div>
        </div>
      </div>

    <div class="modal fade" id="Model_guest"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width: 100%;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
			<div class="card" style="width: 100%; text-align:center;">
			<div class="card-head" style="background-color: #60C1BE; padding: 8px;"><b style="color: white;">Post</b></div>

			  <ul class="list-group list-group-flush">
			    <a href="/deletepostid-{{$post->id}}" style="text-decoration: none;">
			    <li class="list-group-item cursor-pointer color-black">Share</li></a>
			    <!-- <a href="/deletepostid-{{$post->id}}"> -->
			    <a href="/deletepostid-{{$post->id}}" style="text-decoration: none;">
			    <li class="list-group-item cursor-pointe color-black">Report</li></a>
			  </ul>
			</div>
          </div>
        </div>
      </div>      

<!-- comments models -->
    <div class="modal fade" id="Model1_auth"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width: 100%;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
			<div class="card" style="width: 100%; text-align:center;">
				<div class="card-head" style="background-color: #60C1BE; padding: 5px; color:white;"> <b>Comments</b> </div>
			  <ul class="list-group list-group-flush">
			    <a href="/deletepostid-{{$post->id}}">
			    <a href="/deletepostid-{{$post->id}}" style="text-decoration: none;">
			    <li class="list-group-item cursor-pointer color-black">Edit</li></a>
			    <a href="/deletecommentid-" id="deletelink" style="text-decoration: none;">
			    <li class="list-group-item cursor-pointe color-black">Delete</li></a>
			  </ul>
			</div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="Model1_guest"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width: 100%;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
			<div class="card" style="width: 100%; text-align:center;">
				<div class="card-head" style="background-color: #60C1BE; padding: 5px; color:white;"> <b>Comments</b> </div>
			  <ul class="list-group list-group-flush">
			    <a href="/deletepostid-{{$post->id}}">
			    <a href="/deletepostid-{{$post->id}}" style="text-decoration: none;">
			    <a href="/deletecommentid-{{$post->id}}" id="reportlink" style="text-decoration: none;">
			    <li class="list-group-item cursor-pointe color-black">Report</li></a>
			  </ul>
			</div>
          </div>
        </div>
      </div>

@endsection