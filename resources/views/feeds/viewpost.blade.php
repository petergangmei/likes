@extends('layouts.app5')
@section('content')
<div class="card">
<div class="card-body">
	    @csrf
	 <div style="border:0px solid black;">
	 <a href="/profileid-{{$post->user_id}}" style="text-decoration: none; color: black; font-size: 17px;" >
	 	<img src="/public/storage/profile_image/{{$post->user_id}}/{{$userimg->profile_image}}" style="width: 40px; height: 40px; border-radius: 100%; border:1px solid silver; ">
	 	<b style="">{{$post->user_name}}</b>
	 </a> 
	<small style="color: silver; font-size: 10px;">{{Carbon\Carbon::createFromTimestamp(strtotime($post->created_at))->diffForHumans()}}</small>
    @if($post_by->user_id == auth()->user()->id)
    <i class="fa fa-ellipsis-v cursor-pointer color-black" style="font-size: 20px; float: right;" data-toggle="modal" data-target="#Model_auth" ></i> 
    @else
    <i class="fa fa-ellipsis-v cursor-pointer color-black" style="font-size: 20px; float: right;" data-toggle="modal" data-target="#Model_guest" ></i> 
    @endif
    </div>

    @if($post->image == 'null')
    @else
    <img src="/public/storage/posts_image/{{$post->user_id}}/{{$post->image}}" class="w-100 " style="margin: 5px 0px;" id="likeimage">
    @endif
	{{$post->post}}
</div>

	<div class="card-footer " id="">
  	<button class="like btn btn-light cursor-pointer float-left" id="{{$post->id}}" value="{{$post->id}}" style="padding: ;">

  	<img src="public/storage/default_image/icons/heart1.png" class="like-heart"  id="{{$post->id}}" value="{{$post->likes}}"  style="margin:-15px 0px;  ">
  	
  		@if(count($likes)>0)
	@foreach($likes as $like)
	@if($like->post_id == $post->id)
	@if($like->user_id == auth()->user()->id)
  	<img src="public/storage/default_image/icons/heart2.png" class="like-heart"  id="{{$post->id}}"  value="{{$post->likes}}" style="margin: 4px -20px; position: absolute;">

	@endif
	@endif
	@endforeach
	@endif
  	</button>
	 <span id="viewupdatedpost">
	  	<span class="float-left _{{$post->id}}" style="margin: 4px -7px;" id="_{{$post->id}}">{{$post->likes}}</span>
	  	<a href="/viewpost{{$post->id}}"> <i class="fa fa-comment-o cursor-pointer float-left" style="font-size: 21px; margin: 3px 7px; color: black;"></i></a>
	  	<span class="float-left" style="margin: 4px -2px;" id="">{{$post->comments}}</span>
	    @csrf
	</span>

    </div>

<div class="card">

	@if(count($comments)> 0)
	@foreach($comments as $comment)
	<ul class="list-group">
  	<li class="list-group-item">

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